<li class="dropdown-submenu dropdown anx">
    <a tabindex="-1" href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=> -1,'brandId' => -1])}}" class="abc">{{ $category->description }}</a>
    @if ($category->children)
        <ul class="dropdown-menu menu__party7">
            @foreach ($category->children as $child)
                <li class="dropdown2">
                    <a href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=>$child->id,'brandId' => -1])}}"  class="abc">{{ $child->description }}</a>
                    <ul class="dropdown-menu2 spk" style="width: 80%;">
                        @foreach ($child->children as $child2)
                            <li><a href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=>$child->id, 'brandId' => $child2->id])}}" class="abc">{{ $child2->description }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @endif
</li>


