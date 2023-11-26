<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="tittle"><i class="fa-solid fa-sitemap"></i> Sección de Categorias </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                <input type="checkbox" value="true" name="categories" @if(kvfj($u->permissions, 'categories')) checked @endif>
                <label for="categorias"> Puede ver las categorias </label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="category_add" @if(kvfj($u->permissions, 'category_add')) checked @endif>
                <label for="category_add"> Puede agregar categorias </label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="category_edit" @if(kvfj($u->permissions, 'category_edit')) checked @endif>
                <label for="category_edit"> Puede editar las categorias </label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="category_delete" @if(kvfj($u->permissions, 'category_delete')) checked @endif>
                <label for="category_delete"> Puede eliminar las categorias </label>
            </div>


        </div>
    </div>
</div>
