<div class="sidebar__menu-group">
    <ul class="sidebar_nav">

        <li>
            <a href="{{ route('home') }}" class="{{ request()->route()->getName() == "home" ? 'active':'' }}">
                <span class="nav-icon uil uil-create-dashboard"></span>
                <span class="menu-text">{{ __('Dashboard') }}</span>
            </a>
        </li>

        <li class="has-child {{ Request::is('users/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is('users/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-users-alt"></span>
                <span class="menu-text">{{ __('User Management') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li class="{{ Request::is('users/accounts') ? 'active':'' }}"><a href="{{ route('users.accounts') }}">{{ __('Users')}}</a></li>
            </ul>
        </li>
    </ul>
</div>
