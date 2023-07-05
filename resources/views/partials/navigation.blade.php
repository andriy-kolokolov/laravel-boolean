<ul class="navbar-nav flex-row fs-4 h-100 align-items-center">
    @foreach(config('navigation') as $route => $name)
        <li class="nav-item {{ Request::is($route) ? 'active' : '' }}">
            <a class="nav-link" href="{{ url($route) }}">{{ $name }}</a>
        </li>
    @endforeach
</ul>
