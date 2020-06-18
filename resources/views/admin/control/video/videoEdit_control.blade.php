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
                        <form action="{{ route('videoEdit', ['video'=>$data['id']]) }}" method="post" class="form-add-many" enctype="multipart/form-data">
                            @csrf
                            <input name="id" type="hidden" value="{{ $data['id'] }}">
                            <p>Заголовок: <p>
                                <input name="title" value="{{ $data['title'] }}" type="text" class="form-control" placeholder="Заголовок">
                            <p>Текст: <p>
                                <textarea id="editor" class="form-control" placeholder="Текст" name="text" cols="50" rows="10">{{ $data['text'] }}</textarea>
                            <p>Текущее видео: <p>
                            <?php
                                // Получить id ютуб-видео
                                $url = $data['video_link'];
                                parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
                                $result_url = 'https://www.youtube.com/embed/' . $my_array_of_vars['v'];
                                // Output: C4kxS1ksqtw
                            ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="{{ $result_url }}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <p>Ссылка на видео: <p>
                                <input name="video_link" value="{{ $data['video_link'] }}" type="text" class="form-control" placeholder="Ссылка на видео">
                            <p>Текущее промо-изображение: <p>
                                <img src="{{ '/'.$data['img'] }}" class="img-circle img-responsive" width="150px" alt="">
                                <input name="old_images" type="hidden" value="{{ $data['img'] }}" id="old_images">
                            <p>Промо-изображение (рекомендуемый размер 1920х757): <p>
                                <input class="filestyle" data-buttonText="Выберите изображение" data-buttonName="btn-primary" data-placeholder="{{ $data['img'] }}" name="img" type="file" id="img">
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