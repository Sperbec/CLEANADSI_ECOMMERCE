<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\User;
use App\Models\Opciones_definidas;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\UserSendRecover;
use App\Mail\UserSendNewPassword;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Contracts\Session\Session;
use DateTime;

class LoginController extends Controller
{

    //Cualquier método del controlador actual 
    //requiere que el usuario  este logueado a excepción de los
    //métodos que se le pasen como arreglo.
    public function __construct()
    {
        Auth::logout();
        session_unset();
        $this->middleware('guest')->except(['getLogout']);
    }

    //Retornamos a la vista del login
    public function getLogin()
    {
        return view('login.login');
    }

    //Retornamos a la vista para registrar a un usuario
    public function getRegister()
    {
        $tipos_documentos = Opciones_definidas::where('variable', '00identificacion')->get();
        $generos = Opciones_definidas::where('variable', '00genero')->get();

        $data = [
            'tipos_documentos' => $tipos_documentos,
            'generos' => $generos
        ];
        return view('login.register',  $data);
    }

    public function postlogin(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];

        $messages = [
            'email.required' => 'El correo electrónico es requerido.',
            'email.email' => 'El correo electrónico no cumple con el formato.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Error al hacer login')
                ->with('typealert', 'danger');
        else :
            //Busco el usuario con la información del correo y contraseña
            //El ultimo parámetro nos indica si el usuario va a estar conectado.
            if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], true)) :
                return redirect('/home');
            else :
                return back()->withErrors($validator)->with('message', 'Credenciales incorrectas.')
                    ->with('typealert', 'danger');
            endif;

        endif;
    }


    public function postRegister(Request $request)
    {

        $fechaActual=date('Y-m-d');

        $rules = [
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u',
            'numero_documento' => 'required|min:10|max:15',
            'fecha_nacimiento' => 'before:'.$fechaActual
        ];

        $messages = [
            'nombres.required' => 'Los nombres son requeridos.',
            'nombres.regex' => 'Los nombres no pueden contener números.',
            'apellidos.required' => 'Los apellidos son requeridos.',
            'apellidos.regex' => 'Los apellidos no pueden contener números.',
            'numero_documento.required' => 'El número de documento es requerido',
            'numero_documento.min' => 'La cantidad de digitos para el número de documento no puede ser inferior a 10',
            'numero_documento.max' => 'La cantidad de digitos para el número de documento no puede ser superior a 15',
            'fecha_nacimiento.before' =>'La fecha de nacimiento no puede ser superior a la fecha actual'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Error al registrarse')
                ->with('typealert', 'danger')->withInput();
        endif;

        $persona = new Persona;
        $persona->nombres = e($request->input('nombres'));
        $persona->apellidos = e($request->input('apellidos'));
        $persona->id_opcion_genero = $request->input('genero');
        $persona->id_opcion_tipo_documento = $request->input('tipo_documento');
        $persona->numero_documento = e($request->input('numero_documento'));
        $persona->natalicio = e($request->input('fecha_nacimiento'));
        $persona->habilitado = 1;

        if ($persona->save()) {
            $usuario = new User;
            $usuario->id_persona = ($persona->id_persona);
            $usuario->email = e($request->input('email'));
            $usuario->password = Hash::make($request->input('password'));

            if ($usuario->save()) {
                $usuario->assignRole('Admin');
                return redirect('/login')->with('message', 'Su usuario se registró con éxito. Puede iniciar sesión')
                    ->with('typealert', 'success')->withInput();
            }
        }
    }

    
    //restablecer contraseña
    public function getRecover(){
       return view('login.recover');
    }

    public function postRecover(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];

        $messages = [
            'email.required' => 'El correo electrónico es requerido.',
            'email.email' => 'El correo electrónico no cumple con el formato.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Error al recuperar la contraseña.')
                ->with('typealert', 'danger');
        else :
            $usuario = User::where('email', $request->input('email'))->count();
            if ($usuario == "1") : //Quiere decir que el correo existe
                $usuario = User::where('email', $request->input('email'))->first();
                $code = rand(10000000, 99999999);
                $data = [
                    'email' =>  $usuario->email,
                    'code' => $code
                ];

                $u = User::find($usuario->id_usuario);
                $u->password_code = $code;

                if ($u->save()) :
                    Mail::to($usuario->email)->send(new UserSendRecover($data));
                    return redirect('/reset?email=' . $usuario->email)->with('message', 'Ingrese el código que le hemos enviado a su correo electrónico.')->with('typealert', 'success');
                endif;

            else : //Quiere decir que el correo no existe
                return back()->with('message', 'El correo electrónico no existe.')->with('typealert', 'danger');
            endif;

        endif;
    }

    public function getReset(Request $request)
    {
        $data = ['email' => $request->get('email')];
        return view('login.reset', $data);
    }

    public function postReset(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'cod_recuperacion' => 'required'
        ];

        $messages = [
            'email.required' => 'El correo electrónico es requerido.',
            'email.email' => 'El correo electrónico no cumple con el formato.',
            'cod_recuperacion.required' => 'El código de recuperación es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Error al recuperar su contraseña.')
                ->with('typealert', 'danger');
        else :
            //Buscar el usuario con ese email y comparar el código de recuperación
            $usuario = User::where('email', $request->input('email'))->where('password_code', $request->input('cod_recuperacion'))->count();
            if ($usuario == "1") :
                //Generar contraseña random de 8 digitos
                $usuario = User::where('email', $request->input('email'))->where('password_code', $request->input('cod_recuperacion'))->first();
                $new_password = Str::random(8);
                $usuario->password = Hash::make($new_password);
                $usuario->password_code = null;
                if ($usuario->save()) :
                    $data = ['email' =>  $usuario->email, 'password' => $new_password];
                    Mail::to($usuario->email)->send(new UserSendNewPassword($data));
                    return redirect('/login')->with('message', 'La contraseña fue restablecida con éxito, le hemos enviado un correo electrónico con su nueva contraseña para iniciar sesión.')->with('typealert', 'success');
                endif;
            else :
                return back()->withErrors($validator)->with('message', 'El correo electrónico o el código de recuperación son erroneos.')
                    ->with('typealert', 'danger');
            endif;
        endif;
    }

    //Cerrar sesión del usuario 
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
