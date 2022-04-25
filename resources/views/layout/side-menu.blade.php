@extends('../layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('../layout/components/mobile-menu')
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/LOGO B1  White.png') }}">
                <span class="hidden xl:block text-white text-lg ml-3">
                    B <span class="font-medium">One</span>
                </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                {{-- @foreach ($side_menu as $menuKey => $menu)
                    @if ($menu == 'devider')
                        <li class="side-nav__devider my-6"></li>
                    @else
                        <li>
                            <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}" class="{{ $first_level_active_index == $menuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <div class="side-menu__icon">
                                    <i data-feather="{{ $menu['icon'] }}"></i>
                                </div>
                                <div class="side-menu__title">
                                    {{ $menu['title'] }}
                                    @if (isset($menu['sub_menu']))
                                        <div class="side-menu__sub-icon">
                                            <i data-feather="chevron-down"></i>
                                        </div>
                                    @endif
                                </div>
                            </a>
                            @if (isset($menu['sub_menu']))
                                <ul class="{{ $first_level_active_index == $menuKey ? 'side-menu__sub-open' : '' }}">
                                    @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) 
                                        <li>
                                            <a href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name'], $subMenu['params']) : 'javascript:;' }}" class="{{ $second_level_active_index == $subMenuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                                <div class="side-menu__icon">
                                                    <i data-feather="activity"></i>
                                                </div>
                                                <div class="side-menu__title">
                                                    {{ $subMenu['title'] }}
                                                    @if (isset($subMenu['sub_menu']))
                                                        <div class="side-menu__sub-icon">
                                                            <i data-feather="chevron-down"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                            @if (isset($subMenu['sub_menu']))
                                                <ul class="{{ $second_level_active_index == $subMenuKey ? 'side-menu__sub-open' : '' }}">
                                                    @foreach ($subMenu['sub_menu'] as $firstSubMenuKey => $firstSubMenu)
                                                        <li>
                                                            <a href="{{ isset($firstSubMenu['route_name']) ? route($firstSubMenu['route_name'], $firstSubMenu['params']) : 'javascript:;' }}" class="{{ $third_level_active_index == $firstSubMenuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                                                <div class="side-menu__icon">
                                                                    <i data-feather="zap"></i>
                                                                </div>
                                                                <div class="side-menu__title">{{ $firstSubMenu['title'] }}</div>
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
            <li>
                <a href="javascript:;" class="side-menu {{request()->is('/') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="side-menu__title">
                        Dashboard
                        <div class="side-menu__sub-icon transform rotate-180">
                                <i class="fa fa-angle-down"></i>
                        </div>
                    </div>
                </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="/" class="side-menu {{request()->is('/') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                            {{-- <i class="fa fa-dashboard"></i> --}}
                        </div>
                        <div class="side-menu__title">
                            Main
                        </div>
                    </a>
                </li>
            </ul>
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="javascript:;" class="side-menu {{Request::is('invoice-form-page') || Request::is('invoice-list-page') || Request::is('quote-form-page') || Request::is('quote-list-page')  ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        {{-- <i class="fa fa-home"></i> --}}
                        <i class="fa fa-edit"></i>
                    </div>
                    <div class="side-menu__title">
                        Penjualan
                        <div class="side-menu__sub-icon transform rotate-180">
                                <i class="fa fa-angle-down"></i>
                        </div>
                    </div>
                </a>
            <ul class="menu">
                @role('vendor|admin')
                <li>
                    <a href="/invoice-form-page" class="side-menu {{Request()->is('invoice-form-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                            {{-- <i data-lucide="activity" class="">&#xf0ae;</i> --}}
                        </div>
                        <div class="side-menu__title">
                            Add Invoice
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/invoice-list-page" class="side-menu {{Request()->is('invoice-list-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                            {{-- <i data-lucide="activity"></i> --}}
                        </div>
                        <div class="side-menu__title">
                            Invoice List
                        </div>
                    </a>
                </li>
                @endrole
                @role('marketing|admin')
                <li>
                    <a href="/quote-form-page" class="side-menu {{Request()->is('quote-form-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            {{-- <i data-lucide="activity"></i> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        </div>
                        <div class="side-menu__title">
                            Add Quotation
                        </div>
                    </a>
                </li>
                @endrole
                @role('admin|marketing|vendor')
                <li>
                    <a href="/quote-list-page" class="side-menu {{Request()->is('quote-list-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            {{-- <i data-lucide="activity"></i> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        </div>
                        <div class="side-menu__title">
                            Quote List
                        </div>
                    </a>
                </li>
                @endrole
            </ul>
            @role('vendor|admin')
            <li>
                <a href="javascript:;" class="side-menu {{Request::is('product-form-page') || Request::is('product-list-page') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i class="fa fa-gift"></i>
                    </div>
                    <div class="side-menu__title">
                        Product
                        <div class="side-menu__sub-icon transform rotate-180">
                            <i class="fa fa-angle-down"></i>
                        </div>
                    </div>
                </a>
            <ul class="menu">
                <li>
                    <a href="/product-form-page" class="side-menu {{Request()->is('product-form-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            {{-- <i data-lucide="activity"></i> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        </div>
                        <div class="side-menu__title">
                            Add Product
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/product-list-page" class="side-menu {{Request()->is('product-list-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            {{-- <i data-lucide="activity"></i> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
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
                <a href="javascript:;" class="side-menu {{Request::is('customers-form-page') || Request::is('customers-list-page') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        <i class="fas fa-user-friends"></i>
                        {{-- <i class="fa fa-user"></i> --}}
                        {{-- <i data-lucide="home"></i> --}}
                    </div>
                    <div class="side-menu__title">
                        Customers
                        <div class="side-menu__sub-icon transform rotate-180">
                                <i class="fa fa-angle-down"></i>
                        </div>
                    </div>
                </a>
            <ul class="menu">
                <li>
                    <a href="/customers-form-page" class="side-menu {{Request()->is('customers-form-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            {{-- <i data-lucide="activity"></i> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        </div>
                        <div class="side-menu__title">
                            Add Customer
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/customers-list-page" class="side-menu {{Request()->is('customers-list-page') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            {{-- <i data-lucide="activity"></i> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
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
                <a href="javascript:;" class="side-menu {{Request::is('users-form-page') || Request::is('users-list-page') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon">
                        {{-- <i data-lucide="home"></i> --}}
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="side-menu__title">
                        Users
                        <div class="side-menu__sub-icon transform rotate-180">
                                <i class="fa fa-angle-down"></i>
                        </div>
                    </div>
                </a>
                <ul class="menu">
                    <li>
                        <a href="/users-form-page" class="side-menu {{Request()->is('users-form-page') ? 'side-menu--active' : ''}}">
                            <div class="side-menu__icon">
                                {{-- <i data-lucide="activity"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                            </div>
                            <div class="side-menu__title">
                                Add User
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/users-list-page" class="side-menu {{Request()->is('users-list-page') ? 'side-menu--active' : ''}}">
                            <div class="side-menu__icon">
                                {{-- <i data-lucide="activity"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                            </div>
                            <div class="side-menu__title">
                                User List
                            </div>
                        </a>
                    </li>
                </ul>
                <li>
                    <a href="javascript:;" class="side-menu {{Request::is('permission-form') || Request::is('permission-list') ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon">
                            {{-- <i data-lucide="home"></i> --}}
                            <i class="fa fa-edit"></i>

                        </div>
                        <div class="side-menu__title">
                            Permission
                            <div class="side-menu__sub-icon transform rotate-180">
                                    <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="menu">
                        <li>
                            <a href="/permission-form" class="side-menu {{Request()->is('permission-form') ? 'side-menu--active' : ''}}">
                                <div class="side-menu__icon">
                                    {{-- <i data-lucide="activity"></i> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                </div>
                                <div class="side-menu__title">
                                    Add Permission
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/permission-list" class="side-menu {{Request()->is('permission-list') ? 'side-menu--active' : ''}}">
                                <div class="side-menu__icon">
                                    {{-- <i data-lucide="activity"></i> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                </div>
                                <div class="side-menu__title">
                                    Permission List
                                </div>
                            </a>
                        </li>
                    </ul>
                    <li>
                        <a href="javascript:;" class="side-menu {{Request::is('role-form') || Request::is('role-list') ? 'side-menu--active' : ''}}">
                            <div class="side-menu__icon">
                                {{-- <i data-lucide="home"></i> --}}
                                <i class="fa fa-bars"></i>
                            </div>
                            <div class="side-menu__title">
                                Role
                                <div class="side-menu__sub-icon transform rotate-180">
                                        <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                        </a>
                        <ul class="menu">
                            <li>
                                <a href="/role-form" class="side-menu {{Request()->is('role-form') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon">
                                        {{-- <i data-lucide="activity"></i> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                    </div>
                                    <div class="side-menu__title">
                                        Add Role
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/role-list" class="side-menu {{Request()->is('role-list') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon">
                                        {{-- <i data-lucide="activity"></i> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                    </div>
                                    <div class="side-menu__title">
                                        Role List
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <li>
                            <a href="javascript:;" class="side-menu {{Request::is('tax-form-page') || Request::is('tax-list-page') || Request::is('discount-form-page') || Request::is('discount-list-page') ? 'side-menu--active' : ''}}">
                                <div class="side-menu__icon">
                                    <i class="fa fa-gear"></i>
                                </div>
                                <div class="side-menu__title">
                                    Settings
                                    <div class="side-menu__sub-icon transform rotate-180">
                                            <i class="fa fa-angle-down"></i>
                                    </div>
                                </div>
                            </a>
                            <ul class="menu">
                                <li>
                                    <a href="/tax-form-page" class="side-menu {{Request()->is('tax-form-page') ? 'side-menu--active' : ''}}">
                                        <div class="side-menu__icon">
                                            {{-- <i data-lucide="activity"></i> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                        </div>
                                        <div class="side-menu__title">
                                            Input Tax
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/tax-list-page" class="side-menu {{Request()->is('tax-list-page') ? 'side-menu--active' : ''}}">
                                        <div class="side-menu__icon">
                                            {{-- <i data-lucide="activity"></i> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                        </div>
                                        <div class="side-menu__title">
                                            Tax List
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/discount-form-page" class="side-menu {{Request()->is('discount-form-page') ? 'side-menu--active' : ''}}">
                                        <div class="side-menu__icon">
                                            {{-- <i data-lucide="activity"></i> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                        </div>
                                        <div class="side-menu__title">
                                            Input Discount
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/discount-list-page" class="side-menu {{Request()->is('discount-list-page') ? 'side-menu--active' : ''}}">
                                        <div class="side-menu__icon">
                                            {{-- <i data-lucide="activity"></i> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                        </div>
                                        <div class="side-menu__title">
                                            Discount List
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <li>
                                <a href="javascript:;" class="side-menu {{Request::is('marketing-form-page') || Request::is('marketing-list-page') || Request::is('vendor-form-page') || Request::is('vendor-list-page') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon">
                                        <i class="fa fa-archive"></i>
                                        {{-- <i data-lucide="home"></i> --}}
                                    </div>
                                    <div class="side-menu__title">
                                        Marketing & Vendor
                                        <div class="side-menu__sub-icon transform rotate-180">
                                                <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul class="menu">
                                    <li>
                                        <a href="/marketing-form-page" class="side-menu {{Request()->is('marketing-form-page') ? 'side-menu--active' : ''}}">
                                            <div class="side-menu__icon">
                                                {{-- <i data-lucide="activity"></i> --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                            </div>
                                            <div class="side-menu__title">
                                                Insert New Marketing
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/marketing-list-page" class="side-menu {{Request()->is('marketing-list-page') ? 'side-menu--active' : ''}}">
                                            <div class="side-menu__icon">
                                                {{-- <i data-lucide="activity"></i> --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                            </div>
                                            <div class="side-menu__title">
                                                Marketing List
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/vendor-form-page" class="side-menu {{Request()->is('vendor-form-page') ? 'side-menu--active' : ''}}">
                                            <div class="side-menu__icon">
                                                {{-- <i data-lucide="activity"></i> --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                            </div>
                                            <div class="side-menu__title">
                                                Insert New Vendor
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/vendor-list-page" class="side-menu {{Request()->is('vendor-list-page') ? 'side-menu--active' : ''}}">
                                            <div class="side-menu__icon">
                                                {{-- <i data-lucide="activity"></i> --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                            </div>
                                            <div class="side-menu__title">
                                                Vendor List
                                            </div>
                                        </a>
                                    </li>
                                </ul>
            @endrole
            </li>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            @include('../layout/components/top-bar')
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection