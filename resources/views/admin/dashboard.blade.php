@extends('admin.master')

@section('tittle','Panel Administrativo')

@section('content')
<div class="container-fluid mtop16">
    @if(kvfj(Auth::user()->permissions, 'dashboard_stats'))
    <div class="panel shadow">
        <div class="header">
            <h2 class="tittle"><i class="fas fa-chart-bar"></i> Estadísticas </h2>
        </div>
        <div class="row mtop16">
                <div class="col-md-3">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="tittle"><i class="fas fa-users"></i> Usuarios Registrados </h2>
                        </div>
                        <div class="inside">
                            <div class="big_count">{{$users}} </div>
                        </div>
                    </div>
                </div>

            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="tittle"><i class="fas fa-boxes"></i> Productos Guardados </h2>
                    </div>
                    <div class="inside">
                        <div class="big_count">{{$products}}</div>
                    </div>
                </div>
            </div>
            @if(kvfj(Auth::user()->permissions, 'dashboard_sell_today'))
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="tittle"><i class="fas fa-shop"></i> Ordenes Hoy </h2>
                    </div>
                    <div class="inside">
                        <div class="big_count">0
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="tittle"><i class="fas fa-credit-card"></i> Vendido Hoy </h2>
                    </div>
                    <div class="inside">
                        <div class="big_count">0
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection
