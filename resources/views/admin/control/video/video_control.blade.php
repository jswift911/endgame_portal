@extends('layouts.site')

@section('content')
    <!-- Blog section -->
    <div class="profile-section">

        @include('admin.widgets.session')

        <section class="blog-section spad-profile profile">
            <div class="container">
                <div class="row">
                    @include('admin.widgets.steam_panel')
                    @if (Auth::user()->role == 'admin')
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <div class="breadcrumb">
                                <h4>Видео</h4>
                            </div>
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Заголовок</th>
                                    <th scope="col">Текст</th>
                                    <th scope="col">Изображение</th>
                                    <th scope="col">Видео</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $videos->id }}</th>
                                        <td>{{ $videos->title }}</td>
                                        <td>{{ $videos->text }}</td>
                                        <td>{{ $videos->img }}</td>
                                        <td>{{ $videos->video_link }}</td>
                                        <td class="control-forms">
                                            <form action="" method="post">
                                                @csrf
                                            <a href="{{ route('videoEdit', ['videos'=>$videos->id]) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                @include('admin.widgets.footer_panel')
            </div>
        </section>
    </div>
    <!-- Blog section end -->
@endsection