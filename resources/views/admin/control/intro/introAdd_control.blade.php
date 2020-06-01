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
                        <form action="{{ route('introAdd') }}" method="post" class="form-add-many">
                            @csrf
                            <p>Категория: <p>
                            <select name="category" class="custom-select">
                                <option selected>Выберите категорию</option>
                                @foreach ($intros as $item)
                                    <option name="category" value="{{ $item->category }}">{{ $item->category }}</option>
                                @endforeach
                            </select>
                            <p>Заголовок: <p>
                                <input name="title" type="text" class="form-control" placeholder="Заголовок">
                            <p>Текст: <p>
                                <textarea id="editor" class="form-control" placeholder="Текст" name="text" cols="50" rows="10"></textarea>
                            <div class="control-buttons">
                                <button type="submit" class="btn btn-success" href="{{ route('introAdd') }}">Добавить блок</button>
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