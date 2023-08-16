<li class="dropdown-submenu">
    <a class="dropdown-item abc" tabindex="-1">{{ $category->description }}</a>
    @if ($category->children)
        <ul class="dropdown-menu menu__party2">
            @foreach ($category->children as $child)
                @include('front.layouts.child_category', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
