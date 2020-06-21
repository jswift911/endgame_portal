@extends('layouts.site')


@section('content')
    <!-- Blog section -->

    <div class="profile-section">

        @include('admin.widgets.session')

        <section class="blog-section spad-profile profile">
            <div class="container">
                <div class="row">
                @include('admin.widgets.steam_panel')
                    {{--Админ--}}
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
                    {{--Пользователь--}}
                    @if (Auth::user()->role == 'user')
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <h2 class="profile_title">Информация об аккаунте</h2>
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">Имя</th>
                                    <th scope="col">Steam_id</th>
                                    <th scope="col">Права доступа</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="https://steamcommunity.com/profiles/{{ Auth::user()->steamid }}/">{{ Auth::user()->username }}</a></td>
                                        <td>{{ Auth::user()->steamid }}</td>
                                        <td>@if (Auth::user()->role == 'admin') Администратор @else Пользователь @endif</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="user_padding"></div>
                        </div>
                    @endif
                </div>
                @include('admin.widgets.footer_panel')
            </div>
            @if (Auth::user()->role == 'user') @include('site.footer', ['menu' => \App\Menu::get(['id', 'name', 'alias', 'submenu'])]) @endif
        </section>
    </div>
    <!-- Blog section end -->
@endsection

