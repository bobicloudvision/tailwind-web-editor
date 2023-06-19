@if (!empty($menus))
    @foreach($menus as $menu)
        <a href="{{$menu['data']['url']}}">{{$menu['label']}}</a>
    @endforeach
@endif
