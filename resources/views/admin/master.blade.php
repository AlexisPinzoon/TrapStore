<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle') - TrapStore </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/static/css/admin.css?v='.time()) }}">
    <link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b0d8aefb17.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="{{url('/static/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{url('/static/js/admin.js') }}"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap">


    <script>
        $(document).ready(function(){
            $('[data-toogle="tooltip"]').tooltip()
        });
    </script>
</head>
<body>

        <div class="wrapper">
            <div class="col1">@include('admin.sidebar')</div>
            <div class="col2">
                <nav class="navbar navbar-expand-lg shadow">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{url('/admin')}}" class="nav-link">
                                 <i class=" fas fa-home  "></i> Inicio </a>
                            </li>
                        </ul>

                    </div>
                </nav>

                <div class="page">

                    <div class="container-fluid">
                        <nav aria-label= "breadcrumb shadow">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/admin')}}"><i class=" fas fa-home "></i> Inicio </a>
                                </li>
                                @section('breadcrumb')
                                @show
                            </ol>
                        </nav>
                    </div>
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
                    @section('content')
                    @show
                </div>
            </div>
        </div>

</body>
</html>
