<div class="col-md-4">
    <div class="panel shadow">
        <div class="header">
            <h2 class="tittle"><i class="fas fa-home"></i> Seccion de Inicio </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                <input type="checkbox" value="true" name="inicio" @if(kvfj($u->permissions, 'inicio')) checked @endif>
                <label for="inicio"> Puede ver el inicio </label>
            </div>

        </div>
    </div>
</div>
