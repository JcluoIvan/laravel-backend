@section('app-menus')
<div id="app-menus" class="app-menus" :class="{expand}" v-cloak>
    <div class="menu-list">
        @foreach ($menus as $menu)
        <a href="{{ $menu['link'] }}" class="menu-list--item " title="{{ $menu['label'] }}">
            <i class="menu-list--item--icon material-icons">{{ $menu['icon'] }}</i>
            <span class="menu-list--item--label"> {{ $menu['label'] }} </span>
        </a>
        @endforeach
    </div>
</div>
@endsection
