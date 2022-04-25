<?php

namespace App\Http\Livewire;

use App\Models\Departamento;
use App\Models\Pais;
use Livewire\Component;


class SelectComponent extends Component
{

    public $selectedPais = null, $selectedDepartamento = null;
    public $departamentos = null;

    public function render()
    {
        return view('livewire.select-component', [
            'paises' => Pais::All()
        ]);
    }

    public function updatedselectedPais($value){
        $this->departamentos = Departamento::where('id_pais', $value)->get();
        
    }
}
