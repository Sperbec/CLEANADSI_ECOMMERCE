<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body style="margen: 0px; padding: 0px;background-color: #f3f3f3; font-family: Arial, Helvetica, sans-serif;">

    <div style="width: 60%; max-width:728px; margin:0px auto; display:block;">
      <!--  <img src="https://i.imgur.com/VxCUgdE.png" style="width:100%">-->
      <img class="logo" src="{{url('/static/images/logo.jpg')}}" style="width:30%; display:block;" alt="">
       <div style="background-color: #fff; padding:24px;">
           @yield('content')
       </div>
    </div>
    
</body>
</html>