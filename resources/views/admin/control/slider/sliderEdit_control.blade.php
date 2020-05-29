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
                        <form action="{{ route('sliderEdit', ['slider'=>$data['id']]) }}" method="post" class="form-add-many" enctype="multipart/form-data">
                            @csrf
                            <input name="id" type="hidden" value="{{ $data['id'] }}">
                            <p>Заголовок: <p>
                                <input name="title" value="{{ $data['title'] }}" type="text" class="form-control" placeholder="Заголовок">
                            <p>Текст: <p>
                                <textarea id="editor" class="form-control" placeholder="Текст" name="text" cols="50" rows="10">{{ $data['text'] }}</textarea>
                            <p>Текущее изображение: <p>
                                <img src="{{ '/'.$data['img'] }}" class="img-circle img-responsive" width="150px" alt="">
                                <input name="old_images" type="hidden" value="{{ $data['img'] }}" id="old_images">
                            <p>Изображение (рекомендуемый размер 1920х919): <p>
                                <input class="filestyle" data-buttonText="Выберите изображение" data-buttonName="btn-primary" data-placeholder="Выберите файл" name="img" type="file" id="img">
                            <div class="control-buttons">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
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
        </section>
    </div>
    <!-- Blog section end -->
@endsection