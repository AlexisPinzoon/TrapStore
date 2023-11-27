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
                @if(kvfj(Auth::user()->permissions, 'product_add'))
                    <div class="btns">
                        <a href="{{ url ('/admin/product/add')}}" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> Agregar producto </a>
                    </div>
                @endif


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
                            <td>
                                @if ($p->cat)
                                    {{ $p->cat->name }}
                                @else
                                    Sin categoría
                                @endif
                            </td>
                            <td>{{$p->price}}</td>
                            <td>
                                <div class="opts">
                                    @if(kvfj(Auth::user()->permissions, 'product_edit'))
                                    <a href="{{ url('/admin/product/'.$p->id.'/edit')}}"data-toogle="tooltip" data-placement="top" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(kvfj(Auth::user()->permissions, 'product_delete'))
                                    <a href="{{ url ('/admin/product/'.$p->id.'/delete')}}"  data-toogle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    @endif
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
    </div>
@endsection
