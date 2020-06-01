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
                        <form action="{{ route('menuEdit', ['menu'=>$data['id']]) }}" method="post" class="form-add">
                            @csrf
                            <p>Пункт меню: <p>
                                <input name="id" type="hidden" value="{{ $data['id'] }}">
                            <input name="name" value="{{ $data['name'] }}" type="text" class="form-control">
                            <input name="alias" type="hidden">
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