<!-- Header section -->
<header class="header-section">
    <div class="header-warp">

        @if (isset($menu))
        <div class="header-bar-warp d-flex">
            <!-- site logo -->
            <a href="home.html" class="site-logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
            </a>
            <nav class="top-nav-area w-100">
                <div class="user-panel">
                    <a href="">Login as Steam &nbsp;<i class="fab fa-steam"></i></a>
                </div>
                <!-- Menu -->
                <ul class="main-menu primary-menu">
                    @foreach ($menu as $item)
                        <li><a href="{{ $item->alias }}">{{ $item->name }}</a>
                            @if (isset($item->submenu))
                                <ul class="sub-menu">
                                    {{--Пробел заменяем на тире--}}
                                    <li><a href="{{ str_replace(" ", "-", $item->submenu) }}">{{ $item->submenu }}</a></li>
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
{{--                <ul class="main-menu primary-menu">--}}
{{--                    @foreach ($menu as $item)--}}
{{--                    <li><a href="{{ $item['alias'] }}">{{ $item['title'] }}</a>--}}
{{--                        @if (isset($item['submenu']))--}}
{{--                            <ul class="sub-menu">--}}
{{--                                --}}{{--Пробел заменяем на тире--}}
{{--                                <li><a href="{{ str_replace(" ", "-", $item['submenu']) }}">{{ $item['submenu'] }}</a></li>--}}
{{--                            </ul>--}}
{{--                        @endif--}}
{{--                    </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
            </nav>
        </div>
        @endif
    </div>
</header>
<!-- Header section end -->