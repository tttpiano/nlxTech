<li>
    <a href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=> -1,'brandId' => -1])}}"
       style="color: #086393;font-weight: 700;  cursor: pointer;"> {{ $category->description }}</a>
    @if ($category->children)
        <ul class="header__menu__dropdown" style="margin-left: 20px;padding-left: 10px">
            @foreach ($category->children as $child)
                <li style="border: none;">
                    <a href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=>$child->id,'brandId' => -1])}}"  data-filter2="{{$child->description}}"
                       style="color: #078c2e;cursor: pointer;">{{ $child->description }}</a>
                    <ul class="header__menu__dropdown" style="margin-left: 20px;padding-left: 10px">
                        @foreach ($child->children as $child2)

                            <li style="border: none;" ><a
                                    style="color: #8c2607;  cursor: pointer;" href="{{route("filter_sp",['categoryId' => $category->id,'categoryChildId'=>$child->id, 'brandId' => $child2->id])}}">
                                    <i class="fa-solid fa-angles-right"></i> {{ $child2->description }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @endif
</li>
<script src="{{asset('storage/js/jquery-3.3.1.min.js')}}"></script>
<script>
    $(document).ready(function () {
        function scrollToSidebar() {
            // Cuộn trang lên tới phần tử có class "sidebar"
            $('html, body').animate({
                scrollTop: $('.cuon').offset().top
            }, 100); // 1000 là thời gian cuộn (milliseconds)
        }
        {{--$(".fillter{{$category->id}}").click(function () {--}}
        {{--    scrollToSidebar();--}}

        {{--    const filterValue = this.getAttribute('data-filter');--}}

        {{--    // Sử dụng giá trị filterValue để thực hiện các thao tác mong muốn với dữ liệu--}}
        {{--    console.log('Selected filter:', filterValue);--}}
        {{--    // Lấy giá trị data-br từ phần tử cha--}}
        {{--    var dataBrValue = $(this).closest("li").data("br{{$category->id}}");--}}
        {{--    // Lấy nội dung văn bản từ phần tử cha--}}
        {{--    var parentText = $(this).text().trim();--}}
        {{--    // In giá trị data-br và nội dung văn bản ra trong console--}}
        {{--    console.log("data-br: " + dataBrValue);--}}
        {{--    console.log("Parent text: " + parentText);--}}

        {{--    if (typeof dataBrValue !== "undefined") {--}}
        {{--        $("#fillterShop").text(dataBrValue + " " + parentText);--}}
        {{--    } else {--}}
        {{--        $("#fillterShop").text(parentText);--}}
        {{--    }--}}

        {{--});--}}
    });


</script>
