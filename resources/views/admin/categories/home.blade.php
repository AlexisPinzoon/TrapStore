@extends('admin.master')

@section('tittle','Categorias')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url ('/admin/categories')}}"><i class="fa-solid fa-sitemap"></i> Categorias </a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 mtop16">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="tittle"><i class="fa-solid fa-plus"></i> Agregar Categoria </h2>
                </div>

                <div class="inside">
                    {!! Form::open(['url'=> '/admin/category/add']) !!}
                    <label for="name" class="mtop16">Nombre:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-align-justify"></i>
                            </span>
                        </div>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                    <label for="section" class="mtop16">Sección:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-align-justify"></i>
                            </span>
                        </div>
                        {!! Form::select('section', getSectionArray(), 0,['class' => 'custom-select']) !!}
                    </div>

                    <label for="icon" class="mtop16">Icono:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-align-justify"></i>
                            </span>
                        </div>
                        {!! Form::text('icon', null, ['class' => 'form-control']) !!}
                        </div>

                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}


                    {!! Form::close() !!}

                </div>

            </div>

        </div>
        <div class="col-md-9 mtop16">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="tittle"><i class="fa-solid fa-sitemap"></i> Categorias  </h2>
                </div>

                <div class="inside">
                    <nav class="nav nav-pills nav-fill">
                        @foreach (getSectionArray() as $s => $k )
                        <a class="nav-link" href="{{ url('admin/categories/'.$s)}}"><i class=" fas fa-list "></i>{{ $k }}</a>
                        @endforeach
                    </nav>
                    <table class="table">
                        <thead>
                            <tr>
                                <td width="32px"></td>
                                <td> Nombre </td>
                                <td width="140"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cats as $cat)
                            <tr>
                                <td> {!! htmlspecialchars_decode($cat->icono) !!} </td>
                                <td>{{ $cat->name }}</td>
                                <td>
                                    <div class="opts">
                                        <a href="{{ url('/admin/category'.$cat->id.'/edit')}}"data-toogle="tooltip" data-placement="top" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/category'.$cat->id.'/delete')}}"data-toogle="tooltip" data-placement="top" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>

        </div>
    </div>

</div>
@endsection
