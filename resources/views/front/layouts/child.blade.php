<li class="dropdown-submenu dropdown anx">
    <a tabindex="-1" class="abc">{{ $category->description }}</a>
    @if ($category->children)
        <ul class="dropdown-menu menu__party7">
            @foreach ($category->children as $child)
                <li class="dropdown2">
                    <a href="#" class="abc">{{ $child->description }}</a>
                    <ul class="dropdown-menu2 spk" style="width: 80%;">
                        @foreach ($child->children as $child2)
                            <li><a href="#" class="abc">{{ $child2->description }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @endif
</li>


