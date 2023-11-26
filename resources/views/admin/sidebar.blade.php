<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src= "{{ url('static\img\1-removebg-preview.png') }}" class="img-fluid">
        </div>

        <div class="user">
            <span class=" subtitle "> Hola! </span>
            <div class=" name ">
                {{ Auth::user()->name}} {{ Auth::user()->lastname }}
                <div class="email">{{ Auth::user()->email }}</div>
                <a href=" {{ url('/logout') }} " data-toogle="tooltip" data-placement="top" title="Salir">
                    <i class=" fa-solid fa-right-from-bracket "></i>
                </a>
            </div>

        </div>
    </div>
    <div class="main">
        <ul>
            @if(kvfj(Auth::user()->permissions, 'dashboard'))
            <li>
                <a href="{{ url('/admin')}}" class="link-dashboard"><i class="fa-solid fa-hand"></i> Panel Administrativo </a>
            </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'products'))
            <li>
                <a href="{{ url('/admin/products')}}" class="link-products link-product_add lk-product_edit"><i class="fa-solid fa-box-open"></i> Productos </a>
            </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'user_list'))
            <li>
                <a href="{{ url('/admin/users/all')}}" class="link-user_list"><i class="fa-solid fa-users"></i> Usuarios </a>
            </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'categories'))
            <li>
                <a href="{{ url('/admin/categories/0')}}" class="link-categories lk-category_add lk-category_edit lk-category_delete"><i class="fa-solid fa-sitemap"></i> Categorias </a>
            </li>
            @endif
        </ul>
    </div>
</div>
