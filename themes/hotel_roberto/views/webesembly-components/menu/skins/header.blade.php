@if (!empty($menus))
    <ul id="nav">
        @foreach($menus as $menu)
            <li>
                <a href="{{$menu['data']['url']}}">{{$menu['label']}}</a>
            </li>
        @endforeach
    </ul>
@endif

{{--
<ul id="nav">
    <li class="active"><a href="./index.html">Home</a></li>
    <li><a href="./room.html">Rooms</a></li>
    <li><a href="./about.html">About Us</a></li>
    <li><a href="#">Pages</a>
        <ul class="dropdown">
            <li><a href="./index.html">- Home</a></li>
            <li><a href="./room.html">- Rooms</a></li>
            <li><a href="./single-room.html">- Single Rooms</a></li>
            <li><a href="./about.html">- About Us</a></li>
            <li><a href="./blog.html">- Blog</a></li>
            <li><a href="./single-blog.html">- Single Blog</a></li>
            <li><a href="./contact.html">- Contact</a></li>
            <li><a href="#">- Dropdown</a>
                <ul class="dropdown">
                    <li><a href="#">- Dropdown Item</a></li>
                    <li><a href="#">- Dropdown Item</a></li>
                    <li><a href="#">- Dropdown Item</a></li>
                    <li><a href="#">- Dropdown Item</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li><a href="./blog.html">News</a></li>
    <li><a href="./contact.html">Contact</a></li>
</ul>--}}
