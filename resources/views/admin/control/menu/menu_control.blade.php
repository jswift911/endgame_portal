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
                                <h4>Меню</h4>
                                <div class="control-buttons">
                                    <a class="btn btn-success" href="{{ route('menuAdd') }}">Добавить</a>
                                </div>
                            </div>
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Имя</th>
                                    <th scope="col">Псевдоним</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($menu as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->alias }}</td>
                                        <td class="control-forms">
                                            <form action="" method="post">
                                                @csrf
                                            <a href="{{ route('menuEdit', ['menu'=>$item->id]) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            </form>
                                            <form action="{{ route('menuEdit', ['menu'=>$item->id]) }}" method="post">
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
                            {{ $menu->links() }}
                        </div>
                    @endif
                </div>
                @include('admin.widgets.footer_panel')
            </div>
        </section>
    </div>
    <!-- Blog section end -->
@endsection