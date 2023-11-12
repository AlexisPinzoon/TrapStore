<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-rGgo1i4CPz95L8roCO1T12EJ4zKo5RlzM2gXikq5kgAqGkyB4Uq6nSkB1dXNPD7T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/static/css/admin.css?v='.time()) }}">
</head>
<body>

        <div class="wrapper">
            <div class="col1">@include('admin.sidebar')</div>
            <div class="col2"></div>
        </div>

</body>
</html>
