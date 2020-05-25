@extends('layouts.site')

@section('content')
    <!-- Blog section -->
    <div class="profile-section">
        <section class="spad-profile profile">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-5">
                        @if (Auth::check())
                            <div class="profile-panel steam-login">
                                <img src="{{ Auth::user()->avatar }}" alt="">
                                <div class="steam-info-profile">
                                    <p class="font-italic steam-login-nickname"><b><a href="{{ route('index') }}">{{ Auth::user()->username }}</a></b></p>
                                    @if (Auth::user()->role == 'admin')
                                        <p class="role_a">Администратор</p>
                                    @else
                                        <p class="role_u">Пользователь</p>
                                    @endif
                                    <p class="steam-login-logout"><a href="{{ route('steamlogout') }}">Выйти</a></p>
                                </div>
                            </div>
                        @else
                            <div class="user-panel">
                                <a href="{{ route('auth.steam') }}">Login as Steam &nbsp;<i class="fab fa-steam"></i></a>
                            </div>
                        @endif
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <form action="{{ route('menuAdd') }}" method="post" class="form-add">
                            @csrf
                            <p>Добавить пункт меню: <p>
                            <input name="name" type="text" class="form-control">
                            <input name="alias" type="hidden">
                            <div class="control-buttons">
                                <button type="submit" class="btn btn-success" href="{{ route('menuAdd') }}">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <h2 class="profile_title_control">Управление сайтом</h2>
                        <div class="control-buttons">
                            <a class="btn btn-dark" href="{{ route('menu-control') }}">Меню</a>
                            <a class="btn btn-dark" href="#">Слайдер</a>
                            <a class="btn btn-dark" href="#">Интро</a>
                            <a class="btn btn-dark" href="#">Блог</a>
                            <a class="btn btn-dark" href="#">Видео</a>
                            <a class="btn btn-dark" href="#">Features</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Blog section end -->
@endsection