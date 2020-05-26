@extends('layouts.site')

@section('content')
    <!-- Blog section -->

    <div class="profile-section">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-dark">
                {{ session('status') }}
            </div>
        @endif

        <section class="blog-section spad-profile profile">
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
                    @if (Auth::user()->role == 'admin')
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <h2 class="profile_title">Список пользователей</h2>
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Аватар</th>
                                <th scope="col">Steam_id</th>
                                <th scope="col">Права доступа</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($profile_admin as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td><a href="https://steamcommunity.com/profiles/{{ $user->steamid }}/">{{ $user->username }}</a></td>
                                <td><img class="profile_avatar" src="{{ $user->avatar }}" alt=""></td>
                                <td>{{ $user->steamid }}</td>
                                <td>@if ($user->role == 'admin') Администратор @else Пользователь @endif</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--Кнопка для пагинации. Параметр "pagination::bootstrap-4" - чтобы разрешить менять стили через css--}}
                        {{ $profile_admin->links() }}
                    </div>
                    @endif
                </div>
                @if (Auth::user()->role == 'admin')
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
            @endif
        </section>
    </div>
    <!-- Blog section end -->
@endsection