@extends('admin.master')

@section('tittle','Usuarios')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url ('/admin/users')}}"><i class="fas fa-users"></i> Usuarios </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid mtop16">
        <div class="panel shadow">
            <div class="header">
                <h2 class="tittle"><i class="fa-solid fa-users"></i> Usuarios </h2>
            </div>
            <div class="inside">
                <div class ="row">
                    <div class ="col-md-2 offset-md-10">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" ara-expanded="false" style="width: 100%;">
                                <i class="fas fa-filter"></i> Filtrar
                            </button>
                            <div class="dropdown-menu" aria.labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/admin/users/all') }}"> Todos </a>
                                <a class="dropdown-item" href="{{ url('/admin/users/0') }}"> Registrados </a>
                                <a class="dropdown-item" href="{{ url('/admin/users/100') }}"> Suspendidos </a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Email</td>
                            <td>Rol</td>
                            <td>Estado</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ getRoleUserArray(null,$user->role) }}</td>
                            <td>{{ getUserStatusArray(null,$user->status) }}</td>
                        </tr>
                        <td>
                            <div class="opts">
                                <a href="{{ url('/admin/user/'.$user->id.'/edit')}}"data-toogle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>

                        @endforeach
                        <tr>
                            <td colspan="7">{!!$users->render()!!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
