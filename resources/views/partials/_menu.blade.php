<div class="sidebar__menu-group">
    <ul class="sidebar_nav">

        <li>
            <a href="{{ route('home') }}" class="{{ request()->route()->getName() == "home" ? 'active':'' }}">
                <span class="nav-icon uil uil-create-dashboard"></span>
                <span class="menu-text">{{ __('Dashboard') }}</span>
            </a>
        </li>

        <li class="has-child {{ Request::is('products/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is('products/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-box"></span>
                <span class="menu-text">{{ __('Products') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li class="{{ Request::is('products/list') ? 'active':'' }}">
                    <a href="{{ route('products.list') }}">{{ __('Product List')}}</a>
                </li>
                <li class="{{ Request::is('products/category') ? 'active':'' }}">
                    <a href="{{ route('category.list') }}">{{ __('Category List')}}</a>
                </li>
                <li class="{{ Request::is('products/sub-category') ? 'active':'' }}">
                    <a href="{{ route('sub-category.list') }}">{{ __('Sub Category List')}}</a>
                </li>
            </ul>
        </li>

        <li class="has-child {{ Request::is('users/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is('users/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-users-alt"></span>
                <span class="menu-text">{{ __('User Management') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li class="{{ Request::is('users/organizations') ? 'active':'' }}"><a href="{{ route('users.organizations') }}">{{ __('Organization List')}}</a></li>
                <li class="{{ Request::is('users/accounts') ? 'active':'' }}"><a href="{{ route('users.accounts') }}">{{ __('Account List')}}</a></li>
            </ul>
        </li>
    </ul>
</div>
