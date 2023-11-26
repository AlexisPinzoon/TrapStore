@extends('admin.master')

@section('tittle','Administrar Permiso')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url ('/admin/users')}}"><i class="fas fa-users"></i> Usuarios </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url ('/admin/users/')}}"><i class="fas fa-cogs"></i> Permisos de Usuario:  {{ $u->name }} </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid mtop16">
        <div class="page_user">
            <form action="{{ url('/admin/user/'.$u->id.'/permissions/') }}" method="POST">
                @csrf
                <div class="row">
                    @include('admin.users.permissions.section_dashboard')
                    @include('admin.users.permissions.section_users')
                    @include('admin.users.permissions.section_products')
                </div>

                <div class="row mtop16">
                    @include('admin.users.permissions.section_categories')
                </div>

                <div class="row mtop16">
                    <div class="col-md-12">
                        <div class="panel shadow">
                            <div class="inside">
                                <input type="submit" value="Guardar" class="btn btn-primary">
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
