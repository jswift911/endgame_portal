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
            <h2>Contacts</h2>
            <div class="site-breadcrumb">
                <a href="{{route('index')}}">Home</a>  /
                <span>Contacts</span>
            </div>
        </div>

</section>
<!-- Page top end-->
@endsection


@section('content')
    <!-- Contact page -->
    <section class="contact-page">
        <div class="container">
            <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522" style="border:0" allowfullscreen></iframe></div>
            <div class="row">
                <div class="col-lg-7 order-2 order-lg-1">
                    <form class="contact-form">
                        <input type="text" placeholder="Your name">
                        <input type="text" placeholder="Your e-mail">
                        <input type="text" placeholder="Subject">
                        <textarea placeholder="Message"></textarea>
                        <button class="site-btn">Send message<img src="{{ asset('assets/img/icons/double-arrow.png') }}" alt="#"/></button>
                    </form>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
                    <h3>Howdy! Say hello</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.....</p>
                    <div class="cont-info">
                        <div class="ci-icon"><img src="{{ asset('assets/img/icons/location.png') }}" alt=""></div>
                        <div class="ci-text">Main Str, no 23, New York</div>
                    </div>
                    <div class="cont-info">
                        <div class="ci-icon"><img src="{{ asset('assets/img/icons/phone.png') }}" alt=""></div>
                        <div class="ci-text">+546 990221 123</div>
                    </div>
                    <div class="cont-info">
                        <div class="ci-icon"><img src="{{ asset('assets/img/icons/mail.png') }}" alt=""></div>
                        <div class="ci-text">hosting@contact.com</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact page end-->
@endsection



<!-- Footer section -->
@section('footer')
    @include('site.footer')
@endsection
<!-- Footer section end -->

