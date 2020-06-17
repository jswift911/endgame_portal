<!-- Hero section -->
@if (isset($sliders))
<section class="hero-section overflow-hidden">
    <div class="hero-slider owl-carousel">
        @foreach ($sliders as $slide)
        <div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="{{ asset("$slide->img") }}">
            <div class="container">
                <h2>{{ $slide->title }}</h2>
                <p>{{ $slide->text }}</p>
                <a href="#" class="site-btn">Read More  <img src="{{ asset('assets/img/icons/double-arrow.png') }}" alt="#"/></a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
<!-- Hero section end-->


<!-- Intro section -->
@if (isset($intros))
<section class="intro-section">
    <div class="container">
        <div class="row">
            @foreach ($intros as $intro_item)
            <div class="col-md-4">
                <div class="intro-text-box text-box text-white">
                    <div class="top-meta">{{ $intro_item->created_at->format('d.m.Y') }}  /  in <a href="{{ route('category', ['category'=>$intro_item->category]) }}">{{ $intro_item->category }}</a></div>
                    <h3>{{ $intro_item->title }}</h3>
                    <p>{{ mb_strimwidth($intro_item->text, 0, 170, '....') }}</p>
                    <a href="{{ route('category', ['category'=>$intro_item->category]) }}" class="read-more">Read More  <img src="{{ asset('assets/img/icons/double-arrow.png') }}" alt="#"/></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- Intro section end -->


<!-- Blog section -->
@if (isset($blogs))
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="section-title text-white">
                    <h2>Latest News</h2>
                </div>
                <ul class="blog-filter">
                    @foreach($filters as $filter_item)
                        <li><a href="#">{{ $filter_item->name }}</a></li>
                    @endforeach
                </ul>
                <!-- Blog item -->
                @foreach($blogs as $blog_item)
                <div class="blog-item">
                    @if (isset($blog_item->img))
                    <div class="blog-thumb">
                        <img src="{{ asset("$blog_item->img") }}" alt="">
                    </div>
                    @endif
                    <div class="blog-text text-box text-white">
                        <div class="top-meta">{{ $blog_item->created_at->format('d.m.Y') }}  /  in <a href="{{ route('game', ['game' => $blog_item->id]) }}">Games</a></div>
                        <h3>{{ $blog_item->title }}</h3>
                        <p>{{ mb_strimwidth($blog_item->text, 0, 300, '.....') }}</p>
                        <a href="{{ route('game', ['game' => $blog_item->id]) }}" class="read-more">Read More  <img src="{{ asset('assets/img/icons/double-arrow.png') }}" alt="#"/></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
<!-- Blog section end -->


<!-- Intro section -->
@if (isset($videos))
<section class="intro-video-section set-bg d-flex align-items-end " data-setbg="{{ asset("$videos->img") }}">
    <a href="{{ $videos->video_link }}" class="video-play-btn video-popup"><img src="{{ asset('assets/img/icons/solid-right-arrow.png') }}" alt="#"></a>
    <div class="container">
        <div class="video-text">
            <h2>{{ $videos->title }}</h2>
            <p>{{ $videos->text }}</p>
        </div>
    </div>
</section>
@endif
<!-- Intro section end -->


<!-- Featured section -->
@if (isset($features))

<section class="featured-section">
    @foreach ($features as $featured_item)
    <div class="featured-bg set-bg" data-setbg="{{ asset("$featured_item->img") }}"></div>
    <div class="featured-box">
        <div class="text-box">
            <div class="top-meta">{{ $featured_item->created_at->format('d.m.Y') }}  /  in <a href="{{ route('features') }}">Features</a></div>
            <h3>{{ $featured_item->title }}</h3>
            <p>{{ mb_strimwidth($featured_item->text, 0, 550, '...') }}</p>
            <a href="{{ route('features') }}" class="read-more">Read More  <img src="{{ asset('assets/img/icons/double-arrow.png') }}" alt="#"/></a>
        </div>
    </div>
    @endforeach
</section>

@endif
<!-- Featured section end-->



<!-- Newsletter section -->
<section class="newsletter-section">
    <div class="container">
        <h2>Subscribe to our newsletter</h2>
        <form class="newsletter-form">
            <input type="text" placeholder="ENTER YOUR E-MAIL">
            <button class="site-btn">subscribe  <img src="{{ asset('assets/img/icons/double-arrow.png') }}" alt="#"/></button>
        </form>
    </div>
</section>
<!-- Newsletter section end -->