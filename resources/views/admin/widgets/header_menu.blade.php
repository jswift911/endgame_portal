@foreach ($menu as $item)
    <li><a href="{{ route('index') . '/page/' .$item->alias }}">{{ $item->name }}</a>
        @if (isset($item->submenu))
            <ul class="sub-menu">
                {{--Пробел заменяем на тире--}}
                <li><a href="{{ route('single') }}">{{ $item->submenu }}</a></li>
            </ul>
        @endif
    </li>
@endforeach
