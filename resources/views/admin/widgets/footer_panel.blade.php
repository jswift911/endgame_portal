@if (Auth::user()->role == 'admin')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <h2 class="profile_title_control">Управление сайтом</h2>
            <div class="control-buttons control-buttons-padding">
                <a class="btn btn-dark" href="{{ route('menu-control') }}">Меню</a>
                <a class="btn btn-dark" href="{{ route('slider-control') }}">Слайдер</a>
                <a class="btn btn-dark" href="{{ route('intro-control') }}">Интро</a>
                <a class="btn btn-dark" href="{{ route('blog-control') }}">Блог</a>
                <a class="btn btn-dark" href="{{ route('video-control') }}">Видео</a>
                <a class="btn btn-dark" href="{{ route('feature-control') }}">Features</a>
            </div>
        </div>
    </div>
@endif