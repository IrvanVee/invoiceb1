<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler">
            <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div>
    <ul class="border-t border-theme-29 py-5 hidden">
        {{-- @foreach ($side_menu as $menuKey => $menu)
            @if ($menu == 'devider')
                <li class="menu__devider my-6"></li>
            @else
                <li>
                    <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}" class="{{ $first_level_active_index == $menuKey ? 'menu menu--active' : 'menu' }}">
                        <div class="menu__icon">
                            <i data-feather="{{ $menu['icon'] }}"></i>
                        </div>
                        <div class="menu__title">
                            {{ $menu['title'] }}
                            @if (isset($menu['sub_menu']))
                                <i data-feather="chevron-down" class="menu__sub-icon"></i>
                            @endif
                        </div>
                    </a>
                    @if (isset($menu['sub_menu']))
                        <ul class="{{ $first_level_active_index == $menuKey ? 'menu__sub-open' : '' }}">
                            @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                <li>
                                    <a href="{{ isset($subMenu['layout']) ? route('page', ['layout' => $subMenu['layout'], 'theme' => $theme, 'pageName' => $subMenu['page_name']]) : 'javascript:;' }}" class="{{ $second_level_active_index == $subMenuKey ? 'menu menu--active' : 'menu' }}">
                                        <div class="menu__icon">
                                            <i data-feather="activity"></i>
                                        </div>
                                        <div class="menu__title">
                                            {{ $subMenu['title'] }}
                                            @if (isset($subMenu['sub_menu']))
                                                <i data-feather="chevron-down" class="menu__sub-icon"></i>
                                            @endif
                                        </div>
                                    </a>
                                    @if (isset($subMenu['sub_menu']))
                                        <ul class="{{ $second_level_active_index == $subMenuKey ? 'menu__sub-open' : '' }}">
                                            @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                <li>
                                                    <a href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], $lastSubMenu['params']) : 'javascript:;' }}" class="{{ $third_level_active_index == $lastSubMenuKey ? 'menu menu--active' : 'menu' }}">
                                                        <div class="menu__icon">
                                                            <i data-feather="zap"></i>
                                                        </div>
                                                        <div class="menu__title">{{ $lastSubMenu['title'] }}</div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach --}}
        <a href="javascript:;" class="menu {{request()->is('/') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i data-lucide="home"></i>
                    </div>
                    <div class="side-menu__title">
                        Dashboard
                        <div class="side-menu__sub-icon transform rotate-180">
                                <i data-lucide="chevron-down"></i>
                        </div>
                    </div>
                </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="/" class="menu {{request()->is('/') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            Main
                        </div>
                    </a>
                </li>
        </ul>
        <li>
            <a href="javascript:;" class="menu {{Request::is('invoice-form-page') || Request::is('invoice-list-page') || Request::is('quote-form-page') || Request::is('quote-list-page')  ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon">
                    <i data-lucide="home"></i>
                </div>
                <div class="side-menu__title">
                    Penjualan
                    <div class="side-menu__sub-icon transform rotate-180">
                            <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
        <ul class="sub-menu">
            @role('vendor|admin')
            <li>
                <a href="/invoice-form-page" class="menu {{Request()->is('invoice-form-page') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i data-lucide="activity"></i>
                    </div>
                    <div class="side-menu__title">
                        Add Invoice
                    </div>
                </a>
            </li>
            <li>
                <a href="/invoice-list-page" class="menu {{Request()->is('invoice-list-page') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i data-lucide="activity"></i>
                    </div>
                    <div class="side-menu__title">
                        Invoice List
                    </div>
                </a>
            </li>
            @endrole
            @role('marketing|admin')
            <li>
                <a href="/quote-form-page" class="menu {{Request()->is('quote-form-page') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i data-lucide="activity"></i>
                    </div>
                    <div class="side-menu__title">
                        Add Quotation
                    </div>
                </a>
            </li>
            <li>
                <a href="/quote-list-page" class="menu {{Request()->is('quote-list-page') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i data-lucide="activity"></i>
                    </div>
                    <div class="side-menu__title">
                        Quote List
                    </div>
                </a>
            </li>
            @endrole
        </li>
        </ul>
        @role('vendor|admin')
            <li>
                <a href="javascript:;" class="menu {{Request::is('product-form-page') || Request::is('product-list-page') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i data-lucide="home"></i>
                    </div>
                    <div class="side-menu__title">
                        Product
                        <div class="side-menu__sub-icon transform rotate-180">
                                <i data-lucide="chevron-down"></i>
                        </div>
                    </div>
                </a>
            <ul class="sub-menu">
                <li>
                    <a href="/product-form-page" class="menu {{Request()->is('product-form-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            Add Product
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/product-list-page" class="menu {{Request()->is('product-list-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            Product List
                        </div>
                    </a>
                </li>
            </ul>
            @endrole
            @role('marketing|admin')
            <li>
                <a href="javascript:;" class="menu {{Request::is('customers-form-page') || Request::is('customers-list-page') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i data-lucide="home"></i>
                    </div>
                    <div class="side-menu__title">
                        Customers
                        <div class="side-menu__sub-icon transform rotate-180">
                                <i data-lucide="chevron-down"></i>
                        </div>
                    </div>
                </a>
            <ul class="side-menu">
                <li>
                    <a href="/customers-form-page" class="menu {{Request()->is('customers-form-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            Add Customer
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/customers-list-page" class="menu {{Request()->is('customers-list-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            Customers List
                        </div>
                    </a>
                </li>
            </ul>
            @endrole
            <li class="side-nav__devider my-6"></li>
            @role('admin')
            <li>
                <a href="javascript:;" class="menu {{Request::is('users-form-page') || Request::is('users-list-page') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i data-lucide="home"></i>
                    </div>
                    <div class="side-menu__title">
                        Users
                        <div class="side-menu__sub-icon transform rotate-180">
                                <i data-lucide="chevron-down"></i>
                        </div>
                    </div>
                </a>
                <ul class="side-menu">
                    <li>
                        <a href="/users-form-page" class="menu {{Request()->is('users-form-page') ? 'side-menu--active' : ''}}">
                            <div class="side-menu__icon">
                                <i data-lucide="activity"></i>
                            </div>
                            <div class="side-menu__title">
                                Add User
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/users-list-page" class="menu {{Request()->is('users-list-page') ? 'side-menu--active' : ''}}">
                            <div class="side-menu__icon">
                                <i data-lucide="activity"></i>
                            </div>
                            <div class="side-menu__title">
                                User List
                            </div>
                        </a>
                    </li>
                </ul>
                <li>
                    <a href="javascript:;" class="menu {{Request::is('permission-form') || Request::is('permission-list') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            <i data-lucide="home"></i>
                        </div>
                        <div class="side-menu__title">
                            Permission
                            <div class="side-menu__sub-icon transform rotate-180">
                                    <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="side-menu">
                        <li>
                            <a href="/permission-form" class="menu {{Request()->is('permission-form') ? 'side-menu--active' : ''}}">
                                <div class="side-menu__icon">
                                    <i data-lucide="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Add Permission
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/permission-list" class="menu {{Request()->is('permission-list') ? 'side-menu--active' : ''}}">
                                <div class="side-menu__icon">
                                    <i data-lucide="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Permission List
                                </div>
                            </a>
                        </li>
                    </ul>
                    <li>
                        <a href="javascript:;" class="menu {{Request::is('role-form') || Request::is('role-list') ? 'side-menu--active' : ''}}">
                            <div class="side-menu__icon">
                                <i data-lucide="home"></i>
                            </div>
                            <div class="side-menu__title">
                                Role
                                <div class="side-menu__sub-icon transform rotate-180">
                                        <i data-lucide="chevron-down"></i>
                                </div>
                            </div>
                        </a>
                        <ul class="side-menu">
                            <li>
                                <a href="/role-form" class="menu {{Request()->is('role-form') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon">
                                        <i data-lucide="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Add Role
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/role-list" class="menu {{Request()->is('role-list') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon">
                                        <i data-lucide="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Role List
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <li>
                            <a href="javascript:;" class="menu {{Request::is('tax-form-page') || Request::is('tax-list-page') || Request::is('discount-form-page') || Request::is('discount-list-page') ? 'side-menu--active' : ''}}">
                                <div class="side-menu__icon">
                                    <i data-lucide="home"></i>
                                </div>
                                <div class="side-menu__title">
                                    Settings
                                    <div class="side-menu__sub-icon transform rotate-180">
                                            <i data-lucide="chevron-down"></i>
                                    </div>
                                </div>
                            </a>
                            <ul class="side-menu">
                                <li>
                                    <a href="/tax-form-page" class="menu {{Request()->is('tax-form-page') ? 'side-menu--active' : ''}}">
                                        <div class="side-menu__icon">
                                            <i data-lucide="activity"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Input Tax
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/tax-list-page" class="menu {{Request()->is('tax-list-page') ? 'side-menu--active' : ''}}">
                                        <div class="side-menu__icon">
                                            <i data-lucide="activity"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Tax List
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/discount-form-page" class="menu {{Request()->is('discount-form-page') ? 'side-menu--active' : ''}}">
                                        <div class="side-menu__icon">
                                            <i data-lucide="activity"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Input Discount
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/discount-list-page" class="menu {{Request()->is('discount-list-page') ? 'side-menu--active' : ''}}">
                                        <div class="side-menu__icon">
                                            <i data-lucide="activity"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Discount List
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <li>
                                <a href="javascript:;" class="menu {{Request::is('marketing-form-page') || Request::is('marketing-list-page') || Request::is('vendor-form-page') || Request::is('vendor-list-page') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon">
                                        <i data-lucide="home"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Marketing & Vendor
                                        <div class="side-menu__sub-icon transform rotate-180">
                                                <i data-lucide="chevron-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul class="side-menu">
                                    <li>
                                        <a href="/marketing-form-page" class="menu {{Request()->is('marketing-form-page') ? 'side-menu--active' : ''}}">
                                            <div class="side-menu__icon">
                                                <i data-lucide="activity"></i>
                                            </div>
                                            <div class="side-menu__title">
                                                Insert New Marketing
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/marketing-list-page" class="menu {{Request()->is('marketing-list-page') ? 'side-menu--active' : ''}}">
                                            <div class="side-menu__icon">
                                                <i data-lucide="activity"></i>
                                            </div>
                                            <div class="side-menu__title">
                                                Marketing List
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/vendor-form-page" class="menu {{Request()->is('vendor-form-page') ? 'side-menu--active' : ''}}">
                                            <div class="side-menu__icon">
                                                <i data-lucide="activity"></i>
                                            </div>
                                            <div class="side-menu__title">
                                                Insert New Vendor
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/vendor-list-page" class="menu {{Request()->is('vendor-list-page') ? 'side-menu--active' : ''}}">
                                            <div class="side-menu__icon">
                                                <i data-lucide="activity"></i>
                                            </div>
                                            <div class="side-menu__title">
                                                Vendor List
                                            </div>
                                        </a>
                                    </li>
                                </ul>
            @endrole
            </li>
</div>
<!-- END: Mobile Menu -->