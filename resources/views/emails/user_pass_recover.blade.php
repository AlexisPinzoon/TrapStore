@extends('emails.master')

@section('content')
<p>Hola <strong> {{ $name }}</strong> </p>
<p>Con este correo electrónico usted podrá recuperar su contraseña</p>
<p>Para continuar haga click en el siguente botón e ingrese el siguiente código: <h2>{{$code}}</h2></p>
<p><a href="{{ url('/reset'.$email)}}" style="display: inline-block; background-color: #000; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none;">Restablecer Contraseña</a></p>
<p> Como otra opción, puede acceder a recuperar su contraseña copiando y pegando el siguiente link: </p>
<p>{{url('/reset?email='.$email) }} </p>
@stop
