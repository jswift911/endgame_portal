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
                        <form action="{{ route('menuAdd') }}" method="post" class="form-add">
                            @csrf
                            <p>Добавить пункт меню: <p>
                            <input name="name" type="text" class="form-control">
                            <input name="alias" type="hidden">
                            <div class="control-buttons">
                                <button type="submit" class="btn btn-success" href="{{ route('menuAdd') }}">Добавить</button>
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