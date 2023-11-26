@extends('connect.layout')

@section('title', 'Inicia Sesion')

@section('content')
<div class="box box_login shadow">
    <div class="header">
        <a href="{{ url('/')}}">
            <img src="{{ url ('/static/img/1-removebg-preview.png')}}">
        </a>
    </div>
    <div class="inside">
        {!! Form::open(['url' => '/login']) !!}
        <label for="email" class="mtop16">Correo Electrónico: </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
            </div>
            {!! Form::email('email',null, ['class' => 'form-control'])!!}
        </div>
        <label for="password" class="mtop16">Contraseña: </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
            </div>
            {!! Form::password('password', ['class' => 'form-control'])!!}
        </div>
        {!! Form::submit('Iniciar Sesion', ['class' => 'btn btn-success mtop16'])!!}
        {!! Form::close() !!}
        @if(Session::has('message'))
            <div class="container">
                <div class="alert alert-{{ Session::get('typealert')}}" style="display:none;">
                    {{ Session::get('message')}}
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <script>
                        $('.alert').slideDown();
                        setTimeout(function(){ $('.alert').slideUp();}, 50000);
                    </script>
                </div>
            </div>
        @endif
        <div class="footer mtop16">
            <a href="{{ url('/register')}}">¿No tienes una cuenta? Registrate</a>
        </div>
        <div class="footer mtop16">
            <a href="{{ url('/recover')}}">¿Olvidaste tu contraseña? Recuperala</a>
        </div>
    </div>
</div>
@stop
