@extends('layouts.site')

<!-- Header section -->
@section('header')
<header class="header-section">
    <div class="header-warp">
        <div class="header-bar-warp d-flex">
            <!-- site logo -->
            <a href="{{ route('index') }}" class="site-logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
            </a>
            <nav class="top-nav-area w-100">
                @if (session('statusSteam'))
                    <div class="alert alert-success">
                        {{ session('statusSteam') }}
                    </div>
                @endif


                @if (Auth::check())
                    <div class="user-panel steam-login">
                        <a href="{{ route('profile') }}"><img src="{{ Auth::user()->avatar }}" alt=""></a>
                        <div class="steam-info-main">
                            <p class="font-italic steam-login-nickname"><b><a href="{{ route('profile') }}">{{ Auth::user()->username }}</a></b></p>
                            <p class="steam-login-logout"><a href="{{ route('index') . '/' . 'steamlogout'}}">Выйти</a></p></div>
                    </div>
                @else
                    <div class="user-panel">
                        <a href="{{ route('index') . '/' . 'auth/steam'}}">Login as Steam &nbsp;<i class="fab fa-steam"></i></a>
                    </div>
            @endif
                <!-- Menu -->
                <ul class="main-menu primary-menu">
                    @include('admin.widgets.header_menu')
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- Header section end -->

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{ asset("$sliders->img") }}">

        <div class="page-info">
            <h2>{{ $menu_alias->first()->alias }}</h2>
            <div class="site-breadcrumb">
                <a href="{{route('index')}}">Home</a>  /
                <span>{{ $menu_alias->first()->alias }}</span>
            </div>
        </div>

</section>
<!-- Page top end-->
@endsection


@section('content')
    <!-- Games section -->
    <section class="games-single-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-7 game-single-content">
                    <div class="gs-meta">11.11.18  /  in <a href="">Games</a></div>
                    <h2 class="gs-title">Final Appocalipse 2.1</h2>
                    <h4>Gameplay</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquamet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vestibulum posuere porttitor justo id pellentesque. Proin id lacus feugiat, posuere erat sit amet, commodo ipsum. Donec pellentesque vestibulum metus.</p>
                    <h4>Conclusion</h4>
                    <p>Nulla ut maximus mauris. Sed malesuada at sapien sed euismod. Vestibulum pharetra in sem id laoreet. Cras metus ex, placerat nec justo quis, luctus posuere ex. Vivamus volutpat nibh ac sollicitudin imperdiet. Donec scelerisque lorem sodales odio ultricies, nec rhoncus ex lobortis. Vivamus tincidunt sit amet sem id varius. Donec ele-mentum aliquet tortor. Curabitur justo mi, efficitur sed eros aliquet, dictum molestie eros. Nullam scelerisque convallis gravida. Morbi id lorem accumsan, scelerisque enim laoreet, sollicitudin neque. Vivamus volutpat nibh ac sollicitudin imperdiet. Donec scelerisque lorem sodales odio ultricies, nec rhoncus ex lobortis. Vivamus tincidunt sit amet sem id varius. Donec ele-mentum aliquet tortor. Curabitur justo mi, efficitur sed eros aliqueDonec vitae tellus sodales, congue augue at, biben-dum justo. Pellentesque non dolor et magna volutpat pharetra eget vel ligula. Maecenas facilisis vestibulum mattis. Sed sagittis gravida urna. Cras nec mi risus.
                    </p>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-5 sidebar game-page-sideber">
                    <div id="stickySidebar">
                        <div class="widget-item">
                            <div class="rating-widget">
                                <h4 class="widget-title">Ratings</h4>
                                <ul>
                                    <li>Price<span>3.5/5</span></li>
                                    <li>Graphics<span>4.5/5</span></li>
                                    <li>Levels<span>3.5/5</span></li>
                                    <li>Levels<span>4.5/5</span></li>
                                    <li>Dificulty<span>4.5/5</span></li>
                                </ul>
                                <div class="rating">
                                    <h5><i>Rating</i><span>4.5</span> / 5</h5>
                                </div>
                            </div>
                        </div>
                        <div class="widget-item">
                            <div class="testimonials-widget">
                                <h4 class="widget-title">Testimonials</h4>
                                <div class="testim-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolo re magna aliqua. Quis ipsum suspend isse ultrices.</p>
                                    <h6><span>James Smith, </span>Gamer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Games end-->
@endsection



<!-- Footer section -->
@section('footer')
    @include('site.footer')
@endsection
<!-- Footer section end -->

