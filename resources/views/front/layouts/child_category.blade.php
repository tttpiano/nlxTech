<li class="dropdown-submenu">
    <a href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=> -1,'brandId' => -1])}}" class="dropdown-item abc"
       tabindex="-1">{{ $category->description }}</a>
    @if ($category->children)
        <ul class="dropdown-menu menu__party2">
            @foreach ($category->children as $child)
                <li class="dropdown-submenu">
                    <a href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=>$child->id,'brandId' => -1])}}" class="dropdown-item abc"
                       tabindex="-1">{{ $child->description }}</a>
                    <ul class="dropdown-menu menu__party2">
                        @foreach ($child->children as $child2)
                            <li class="dropdown-submenu">
                                <a href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=>$child->id, 'brandId' => $child2->id])}}" class="dropdown-item abc"
                                   tabindex="-1">{{ $child2->description }}</a>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @endif
</li>
