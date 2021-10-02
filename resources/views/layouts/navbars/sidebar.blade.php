<div class="sidebar" data-color="orange" data-background-color="white"
     data-image="{{ asset('material') }}/img/sidebar-3.jpg">
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            {{ __('Gestor de loja') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class='nav-item{{ $activePage == "categoria" ? " active" : "" }}'>
                <a class="nav-link" href='http://127.0.0.1:8000/categoria'>
                    <i class='material-icons'>category</i>
                    <p> Categoria </p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('table') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <span class="sidebar-mini"><i class="material-icons">groups</i></span>
                    <span class="sidebar-normal"> {{ __('User Management') }} </span>
                </a>
            </li>
        </ul>
    </div>
</div>
