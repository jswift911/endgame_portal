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
                                <h4>Блог</h4>
                                <div class="control-buttons">
                                    <a class="btn btn-success" href="{{ route('blogAdd') }}">Добавить</a>
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
                                @foreach ($blogs as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->text }}</td>
                                        <td>{{ $item->img }}</td>
                                        <td class="control-forms">
                                            <form action="" method="post">
                                                @csrf
                                            <a href="{{ route('blogEdit', ['blogs'=>$item->id]) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            </form>
                                            <form action="{{ route('blogEdit', ['blogs'=>$item->id]) }}" method="post">
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
                            {{ $blogs->links() }}
                        </div>
                    @endif
                </div>
                @include('admin.widgets.footer_panel')
            </div>
        </section>
    </div>
    <!-- Blog section end -->
@endsection