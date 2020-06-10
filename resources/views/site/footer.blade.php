<!-- Footer section -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-left-pic">
            <img src="{{ asset('assets/img/footer-left-pic.png') }}" alt="">
        </div>
        <div class="footer-right-pic">
            <img src="{{ asset('assets/img/footer-right-pic.png') }}" alt="">
        </div>
        <a href="#" class="footer-logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
        </a>
        <ul class="main-menu footer-menu">
            @include('admin.widgets.header_menu')
        </ul>
        <div class="footer-social d-flex justify-content-center">
            <a href="#"><i class="fab fa-pinterest"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-dribbble"></i></a>
            <a href="#"><i class="fab fa-behance"></i></a>
        </div>
        <div class="copyright"><a href="">Colorlib</a> 2018 @ All rights reserved</div>
    </div>
</footer>
<!-- Footer section end -->