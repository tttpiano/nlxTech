<li>
    <a class="fillter{{$category->id}}"
       style="color: #086393;font-weight: 700;  cursor: pointer;"> {{ $category->description }}</a>
    @if ($category->children)
        <ul class="header__menu__dropdown" style="margin-left: 20px;padding-left: 10px">
            @foreach ($category->children as $child)
                <li style="border: none;">
                    <a class="fillter{{$category->id}}" class="fillter{{$category->id}}"
                       style="color: #078c2e;cursor: pointer;">{{ $child->description }}</a>
                    <ul class="header__menu__dropdown" style="margin-left: 20px;padding-left: 10px">
                        @foreach ($child->children as $child2)
                            <li style="border: none;" data-br{{ $category->id }}="{{ $child->description }}"><a class="fillter{{$category->id}}"
                                                         style="color: #8c2607;  cursor: pointer;">
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


        $(".fillter{{$category->id}}").click(function() {
            scrollToSidebar();
            // Lấy giá trị data-br từ phần tử cha
            var dataBrValue = $(this).closest("li").data("br{{$category->id}}");
            // Lấy nội dung văn bản từ phần tử cha
            var parentText = $(this).text().trim();
            // In giá trị data-br và nội dung văn bản ra trong console
            console.log("data-br: " + dataBrValue);
            console.log("Parent text: " + parentText);

            if (typeof dataBrValue !== "undefined") {
                $("#fillterShop").text(dataBrValue +" "+parentText);
            } else {
                $("#fillterShop").text(parentText);
            }

        });
    });





</script>
