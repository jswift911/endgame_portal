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
                        <form action="{{ route('blogEdit', ['blog'=>$data['id']]) }}" method="post" class="form-add-many" enctype="multipart/form-data">
                            @csrf
                            <input name="id" type="hidden" value="{{ $data['id'] }}">
                            <p>Заголовок: <p>
                                <input name="title" value="{{ $data['title'] }}" type="text" class="form-control" placeholder="Заголовок">
                            <p>Текст: <p>
                                <textarea id="editor" class="form-control" placeholder="Текст" name="text" cols="50" rows="10">{{ $data['text'] }}</textarea>
                            <p>Текущее изображение: <p>
                                <img src="{{ '/'.$data['img'] }}" class="img-circle img-responsive" width="150px" alt="">
                                <input name="old_images" type="hidden" value="{{ $data['img'] }}" id="old_images">
                            <p>Изображение (рекомендуемый размер 400х383): <p>
                                <input class="filestyle" data-buttonText="Выберите изображение" data-buttonName="btn-primary" data-placeholder="Выберите файл" name="img" type="file" id="img">
                            <div class="control-buttons">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
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