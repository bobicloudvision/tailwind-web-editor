<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">

    @if (!empty($menus))
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
        @foreach($menus as $menu)
        <li class="nav-item">
            <a href="{{$menu['data']['url']}}" class="nav-link">{{$menu['label']}}</a>
        </li>
        @endforeach
    </ul>
@endif
</div>
