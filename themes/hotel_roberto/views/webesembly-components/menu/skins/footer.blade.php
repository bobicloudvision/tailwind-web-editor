@if (!empty($menus))
    <ul class="footer-nav">
    @foreach($menus as $menu)
            <li>
                <a href="{{$menu['data']['url']}}">
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                    {{$menu['label']}}
                </a>
            </li>
    @endforeach

    </ul>
@endif
