<header class="app-header">
<a class="app-header__logo" href="{{ route('admin.home') }}">Neue Fische</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                    class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item"><i class="fa fa-sign-out fa-lg"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>