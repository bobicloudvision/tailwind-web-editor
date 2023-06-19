@if (!empty($menus))
    @foreach($menus as $menu)
        <a href="{{$menu['data']['url']}}" class="small" >{{$menu['label']}}</a>
        @if(!$loop->last)
            <span class="mx-1">&middot;</span>
        @endif
    @endforeach
@endif
