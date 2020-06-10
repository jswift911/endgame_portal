<!-- Header section -->
<header class="header-section">
    <div class="header-warp">

        @if (isset($menu))
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
                                <p class="steam-login-logout"><a href="steamlogout">Выйти</a></p></div>
                        </div>
                    @else
                        <div class="user-panel">
                            <a href="auth/steam">Login as Steam &nbsp;<i class="fab fa-steam"></i></a>
                        </div>
                    @endif

                <!-- Menu -->
                <ul class="main-menu primary-menu">
                    @include('admin.widgets.header_menu')
                </ul>
            </nav>
        </div>
        @endif
    </div>
</header>
<!-- Header section end -->