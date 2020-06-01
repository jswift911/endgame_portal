<div class="col-xl-4 col-lg-4 col-md-5">
    @if (Auth::check())
        <div class="profile-panel steam-login">
            <img src="{{ Auth::user()->avatar }}" alt="">
            <div class="steam-info-profile">
                <p class="font-italic steam-login-nickname"><b><a href="{{ route('index') }}">{{ Auth::user()->username }}</a></b></p>
                @if (Auth::user()->role == 'admin')
                    <p class="role_a">Администратор</p>
                @else
                    <p class="role_u">Пользователь</p>
                @endif
                <p class="steam-login-logout"><a href="{{ route('steamlogout') }}">Выйти</a></p>
            </div>
        </div>
    @else
        <div class="user-panel">
            <a href="{{ route('auth.steam') }}">Login as Steam &nbsp;<i class="fab fa-steam"></i></a>
        </div>
    @endif
</div>