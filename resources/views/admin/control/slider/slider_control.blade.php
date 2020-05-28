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
                            <div class="breadcrumb">
                                <h4>Слайдер</h4>
                                <div class="control-buttons">
                                    <a class="btn btn-success" href="{{ route('sliderAdd') }}">Добавить слайд</a>
                                </div>
                            </div>
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Заголовок</th>
                                    <th scope="col">Текст</th>
                                    <th scope="col">Изображение</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sliders as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->text }}</td>
                                        <td>{{ $item->img }}</td>
                                        <td class="control-forms">
                                            <form action="" method="post">
                                                @csrf
                                            <a href="{{ route('sliderEdit', ['sliders'=>$item->id]) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            </form>
                                            <form action="{{ route('sliderEdit', ['sliders'=>$item->id]) }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                            <button href="submit">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--Кнопка для пагинации--}}
                            {{ $sliders->links() }}
                        </div>
                    @endif
                </div>
                @if (Auth::user()->role == 'admin')
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <h2 class="profile_title_control">Управление сайтом</h2>
                        <div class="control-buttons">
                            <a class="btn btn-dark" href="{{ route('menu-control') }}">Меню</a>
                            <a class="btn btn-dark" href="{{ route('slider-control') }}">Слайдер</a>
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