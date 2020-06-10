@foreach ($menu as $item)
    <li><a href="{{ $item->alias }}">{{ $item->name }}</a>
        @if (isset($item->submenu))
            <ul class="sub-menu">
                {{--Пробел заменяем на тире--}}
                <li><a href="{{ str_replace(" ", "-", $item->submenu) }}">{{ $item->submenu }}</a></li>
            </ul>
        @endif
    </li>
@endforeach
