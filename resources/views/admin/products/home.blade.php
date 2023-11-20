@extends('admin.master')

@section('tittle','Productos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url ('/admin/products')}}"><i class="fa-solid fa-box-open"></i> Productos</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid mtop16">
        <div class="panel shadow">
            <div class="header">
                <h2 class="tittle"><i class="fa-solid fa-box-open"></i> Productos </h2>
            </div>

            <div class="inside">
                <div class="btns">
                    <a href="{{ url ('/admin/product/add')}}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> Agregar producto </a>
                </div>
            </div>

        </div>
    </div>
@endsection
