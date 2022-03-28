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
                @foreach ($side_menu as $menuKey => $menu)
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
                @endforeach
{{-- <li>
    <a href="javascript:;" class="side-menu side-menu--active">
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
                    <a href="http://rubick.left4code.com/page/side-menu/light/dashboard-overview-1" class="side-menu side-menu--active">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            Overview 1
                                                                            </div>
                    </a>
                                                            </li>
            </ul> --}}
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