@extends('admin.master')

@section('tittle','Editar')

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
                    <h2 class="tittle"><i class="fas fa-edit"></i> Editar Categoria </h2>
                </div>

                <div class="inside">
                    {!! Form::open(['url'=> '/admin/category/'.$cat->id.'/edit']) !!}
                    <label for="name" class="mtop16">Nombre:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-align-justify"></i>
                            </span>
                        </div>
                        {!! Form::text('name', $cat->name, ['class' => 'form-control']) !!}
                        </div>

                    <label for="section" class="mtop16">Sección:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-align-justify"></i>
                            </span>
                        </div>
                        {!! Form::select('section', getSectionArray(), $cat->section,['class' => 'custom-select']) !!}
                    </div>

                    <label for="icon" class="mtop16">Icono:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-align-justify"></i>
                            </span>
                        </div>
                        {!! Form::text('icon', $cat->icono, ['class' => 'form-control']) !!}
                        </div>

                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}


                    {!! Form::close() !!}

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
