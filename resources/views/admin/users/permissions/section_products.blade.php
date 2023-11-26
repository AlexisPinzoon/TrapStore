<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="tittle"><i class="fa-solid fa-box-open"></i> Sección de Productos </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                <input type="checkbox" value="true" name="products" @if(kvfj($u->permissions, 'products')) checked @endif>
                <label for="products"> Puede ver el listado de productos </label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="product_add" @if(kvfj($u->permissions, 'product_add')) checked @endif>
                <label for="product_add"> Puede agregar productos </label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="product_edit" @if(kvfj($u->permissions, 'product_edit')) checked @endif>
                <label for="product_edit"> Puede editar productos </label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="product_delete" @if(kvfj($u->permissions, 'product_delete')) checked @endif>
                <label for="product_delete"> Puede eliminar productos </label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="product_gallery_add" @if(kvfj($u->permissions, 'product_gallery_add')) checked @endif>
                <label for="product_gallery_add"> Puede agregar imágenes </label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="product_gallery_delete" @if(kvfj($u->permissions, 'product_gallery_delete')) checked @endif>
                <label for="product_gallery_delete"> Puede eliminar imágenes </label>
            </div>

        </div>
    </div>
</div>
