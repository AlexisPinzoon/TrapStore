<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="tittle"><i class="fas fa-home"></i> Sección de administración </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                <input type="checkbox" value="true" name="dashboard" @if(kvfj($u->permissions, 'dashboard')) checked @endif>
                <label for="dashboard"> Puede ver el panel administrativo </label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="dashboard_stats" @if(kvfj($u->permissions, 'dashboard_stats')) checked @endif>
                <label for="dashboard_stats"> Puede ver las estadisticas </label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="dashboard_sell_today" @if(kvfj($u->permissions, 'dashboard_sell_today')) checked @endif>
                <label for="dashboard_sell_today"> Puede ver lo producido de hoy </label>
            </div>
        </div>
    </div>
</div>
