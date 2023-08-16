<li><a href="#" style="color: #086393">{{ $category->description }}</a>
    @if ($category->children)
        <ul class="header__menu__dropdown" style="margin-left: 20px;">
        @foreach ($category->children as $child)
                <li style="border: none;"><a href="#" style="color: #078c2e">{{ $child->description }}</a></li>
        @endforeach
        </ul>
    @endif
</li>
