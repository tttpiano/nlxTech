<li><a href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=> -1,'brandId' => -1])}}" style="color: #086393">{{ $category->description }}</a>
    @if ($category->children)
        <ul class="header__menu__dropdown" style="margin-left: 20px;">
        @foreach ($category->children as $child)
                <li style="border: none;"><a href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=>$child->id,'brandId' => -1])}}" style="color: #078c2e">{{ $child->description }}</a></li>
                <ul class="header__menu__dropdown" style="margin-left: 20px;">
                    @foreach ($child->children as $child2)
                        <li style="border: none;"><a style="color: #8c2607;" href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=>$child->id, 'brandId' => $child2->id])}}" style="color: #078c2e">
                                <i class="fa-solid fa-angles-right"></i>{{ $child2->description }}</a></li>
                    @endforeach
                </ul>
        @endforeach
        </ul>
    @endif
</li>
