@extends('layouts.site')

@section('content')
    <!-- Blog section -->
    <div class="profile-section">

        @include('admin.widgets.session')

        <section class="spad-profile profile">
            <div class="container">
                <div class="row">
                    @include('admin.widgets.steam_panel')
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        {{--Обязательно enctype = "multipart/form-data" если грузим файл, иначе hasFile будет false--}}
                        <form action="{{ route('sliderAdd') }}" method="post" class="form-add-many" enctype = "multipart/form-data">
                            @csrf
                            <p>Заголовок: <p>
                            <input name="title" type="text" class="form-control" placeholder="Заголовок">
                            <p>Текст: <p>
                            <textarea id="editor" class="form-control" placeholder="Текст" name="text" cols="50" rows="10"></textarea>
                            <p>Изображение (рекомендуемый размер 1920х919): <p>
                            <input class="filestyle" data-buttonText="Выберите изображение" data-buttonName="btn-primary" data-placeholder="Пусто" name="img" type="file" id="img">
                            <div class="control-buttons">
                                <button type="submit" class="btn btn-success" href="{{ route('sliderAdd') }}">Добавить слайд</button>
                            </div>
                        </form>
                    </div>
                </div>
                @include('admin.widgets.footer_panel')
            </div>
        </section>
    </div>
    <!-- Blog section end -->
@endsection