@extends('admin.master')

@section('tittle','Usuarios')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url ('/admin/users')}}"><i class="fas fa-users"></i> Usuarios</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid mtop16">
        <div class="panel shadow">
            <div class="header">
                <h2 class="tittle"><i class="fa-solid fa-users"></i> Usuarios </h2>
            </div>
            <div class="inside">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Email</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <td>
                            <div class="opts">
                                <a href="{{ url('/admin/user'.$user->id.'/edit')}}"data-toogle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ url('/admin/user'.$user->id.'/delete')}}"data-toogle="tooltip" data-placement="top" title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
