@extends('admin.master')

@section('tittle','Editar Usuario')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url ('/admin/users')}}"><i class="fas fa-users"></i> Usuarios </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid mtop16">
        <div class="page_user">
            <div class="row">

                <div class="col-md-4">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="tittle"><i class="fas fa-user"></i> Información Usuario </h2>
                        </div>

                        <div class="inside">
                            <div class="mini_profile">
                                @if(is_null($u->avatar))
                                <img src="{{url('/static/img/default-avatar.png') }}" class="avatar">
                                @else
                                <img src="{{url ('/uploads/user/'.$u->id.'/'.$user->avatar)}}" class="avatar">
                                @endif
                                <div class="info">
                                    <span class="title"><i class="far fa-address-card"></i> Nombre: </span>
                                    <span class="text">{{ $u->name }} {{ $u->lastname }} </span>
                                    <span class="title"><i class="fas fa-user-tie"></i> Estado del usuario: </span>
                                    <span class="text">{{ getUserStatusArray(null,$u->status) }} </span>
                                    <span class="title"><i class="far fa-envelope"></i> Correo Electrónico: </span>
                                    <span class="text">{{ $u->email }} </span>
                                    <span class="title"><i class="far fa-calendar-alt"></i> Fecha de registro: </span>
                                    <span class="text">{{ $u->created_at }} </span>
                                    <span class="title"><i class="fas fa-user-shield"></i> Rol del usuario: </span>
                                    <span class="text">{{ getRoleUserArray(null,$u->role) }} </span>
                                </div>
                                @if(kvfj(Auth::user()->permissions, 'user_banned'))
                                    @if ($u->status == "100")
                                    <a href="{{url ('/admin/user/'.$u->id.'/banned')}}" class="btn btn-Success">Quitar Suspensión </a>
                                    @else
                                    <a href="{{url ('/admin/user/'.$u->id.'/banned')}}" class="btn btn-danger">Suspender Usuario </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="tittle"><i class="fas fa-user-edit"></i>Editar Información Usuario </h2>
                        </div>
                        <div class="inside">
                            @if(kvfj(Auth::user()->permissions, 'user_edit'))
                            {!! Form::open(['url' => 'admin/user/'.$u->id.'/edit']) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="section" class="mtop16"> Tipo de usuario: </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-align-justify"></i>
                                                </span>
                                            </div>
                                            {!! Form::select('user_type', getRoleUserArray('list',null), $u->role,['class' => 'custom-select']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mtop16">
                                    <div class="col-md-12">
                                        {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
