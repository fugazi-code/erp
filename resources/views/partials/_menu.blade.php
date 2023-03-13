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
                <li class="{{ Request::is('products/brand') ? 'active':'' }}">
                    <a href="{{ route('brand.list') }}">{{ __('Brand List')}}</a>
                </li>
            </ul>
        </li>

        <li class="has-child {{ Request::is('sales/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is('sales/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-calculator"></span>
                <span class="menu-text">{{ __('Sales') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li class="{{ Request::is('sales/pos') ? 'active':'' }}">
                    <a href="{{ route('kuys.layout') }}">{{ __('POS')}}</a>
                </li>
                <li class="{{ Request::is('sales/list') ? 'active':'' }}">
                    <a href="{{ route('sales.list') }}">{{ __('Sale List')}}</a>
                </li>
            </ul>
        </li>

        <li class="has-child {{ Request::is('people/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is('people/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-user-arrows"></span>
                <span class="menu-text">{{ __('People') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li class="{{ Request::is('people/customer') ? 'active':'' }}">
                    <a href="{{ route('people.customer') }}">{{ __('Customer List')}}</a>
                </li>
                <li class="{{ Request::is('people/supplier') ? 'active':'' }}">
                    <a href="{{ route('people.supplier') }}">{{ __('Supplier List')}}</a>
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
