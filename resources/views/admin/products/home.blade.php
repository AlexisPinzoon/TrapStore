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

            <table class="table table-striped mtop16">
                    <thead>
                        <tr>
                            <td> ID </td>
                            <td></td>
                            <td> Nombre </td>
                            <td> Categoria </td>
                            <td> Precio </td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                        <tr @if($p->status == "0") class = "table-danger" @endif>
                            <td>{{$p->id}}</td>
                            <td width="64">
                                <a href=" {{ url('/uploads/'.$p->file_path.'/'.$p->image) }}" data-fancybox="gallery">
                                    <img src="{{ url ('/uploads/'.$p->file_path.'/t_'.$p->image)}}" width="64">
                                </a>
                            </td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->cat->name}}</td>
                            <td>{{$p->price}}</td>
                            <td>
                                <div class="opts">
                                <a href="{{ url('/admin/product/'.$p->id.'/edit')}}"data-toogle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" data-path="admin/product" data-object="{{ $p->id }}" data-toogle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan = "6">{!! $products -> render() !!}</td>
                        </tr>
                    </tbody>
            </table>

        </div>
    </div>
@endsection
