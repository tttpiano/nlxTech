@extends('front.layouts.master')
@section('main-container')
    <!-- master -->
    <section class="hero1" style="margin-bottom: 50px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-9">
                    <div class="slider1">
                        <div class="list">
                            @foreach ($slides as $slide)
                                <div class="item">
                                    <img src="{{ asset($slide->image_path) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="buttons">
                            <button id="prev"><i class="fa-solid fa-chevron-left"></i></button>
                            <button id="next"><i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                        <ul class="dots">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Categories Section Begin -->
    <section>
        <div class="swiper">

            <div class="swiper-wrapper">
                @foreach($productInSlide as $pro1)
                    <div class="swiper-slide swiper-slide--one" style="background: linear-gradient(to top, #255063, #203a4300, #2c536400),
                                url({{asset('images/' . $pro1->image->file_name)}})
                          no-repeat 50% 50% / cover; background-size: contain;">
                        <span>Hot</span>
                        <div>
                            <a href="{{route('detail', $pro1->url_seo)}}">{{  \Illuminate\Support\Str::limit(  $pro1->name, 30) }}</a>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                NLXTech
                            </p>
                        </div>

                    </div>
                @endforeach
                @foreach($productInSlide1 as $pro2)
                    <div class="swiper-slide swiper-slide--two" style="background: linear-gradient(to top, #255063, #203a4300, #2c536400),
                                url({{asset('images/' . $pro2->image->file_name)}})
                          no-repeat 50% 50% / cover; background-size: contain;">
                        <span>Hot</span>
                        <div>
                            <a href="{{route('detail', $pro2->url_seo)}}">{{  \Illuminate\Support\Str::limit(  $pro2->name, 30) }}</a>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                NLXTech
                            </p>
                        </div>
                    </div>
                @endforeach
                @foreach($productInSlide2 as $pro2)
                    <div class="swiper-slide swiper-slide--three" style="background: linear-gradient(to top, #255063, #203a4300, #2c536400),
                                url({{asset('images/' . $pro2->image->file_name)}})
                          no-repeat 50% 50% / cover; background-size: contain;">
                        <span>Hot</span>
                        <div>
                            <a href="{{route('detail', $pro2->url_seo)}}">{{  \Illuminate\Support\Str::limit(  $pro2->name, 30) }}</a>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                NLXTech
                            </p>
                        </div>
                    </div>
                @endforeach
                @foreach($productInSlide3 as $pro2)
                    <div class="swiper-slide swiper-slide--four" style="background: linear-gradient(to top, #255063, #203a4300, #2c536400),
                                url({{asset('images/' . $pro2->image->file_name)}})
                          no-repeat 50% 50% / cover; background-size: contain;">
                        <span>Hot</span>
                        <div>
                            <a href="{{route('detail', $pro2->url_seo)}}">{{  \Illuminate\Support\Str::limit(  $pro2->name, 30) }}</a>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                NLXTech
                            </p>
                        </div>
                    </div>
                @endforeach
                @foreach($productInSlide4 as $pro2)
                    <div class="swiper-slide swiper-slide--five" style="background: linear-gradient(to top, #255063, #203a4300, #2c536400),
                                url({{asset('images/' . $pro2->image->file_name)}})
                          no-repeat 50% 50% / cover; background-size: contain;">
                        <span>Hot</span>
                        <div>
                            <a href="{{route('detail', $pro2->url_seo)}}">
                                {{  \Illuminate\Support\Str::limit(  $pro2->name, 30) }}</a>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                NLXTech
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- LOGO Section End -->
    <div class="logo_brand">
        <div class="container">
            <div class="row row-brand">
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="{{route("filter_sp",['categoryId' => -1,'categoryChildId'=> -1,'brandId' => 19])}}" title="Daikin" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/daikin.png') }}" alt="Daikin"
                             title="Daikin" width="150" height="50" data-id="140" data-pos="product_brand"
                             class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="" title="Panasonic" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/panasonic-logo-scaled.jpeg') }}"
                             alt="Panasonic" title="Panasonic" width="150" height="50" data-id="140"
                             data-pos="product_brand" class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="{{route("filter_sp",['categoryId' => -1,'categoryChildId'=> -1,'brandId' => 25])}}" title="GREE" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/gree.png') }}" alt="GREE" title="GREE"
                             width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="" title="Samsung" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0"
                             src="{{ asset('storage/img/logo_brand/logo-samsung-inkythuatso-01-29-08-50-42.jpeg') }}"
                             alt="Samsung" title="Samsung" width="150" height="50" data-id="140"
                             data-pos="product_brand" class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="{{route("filter_sp",['categoryId' => -1,'categoryChildId'=> -1,'brandId' => 20])}}" title="Reetech" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/logo-reetech.jpeg') }}" alt="Reetech"
                             title="Reetech" width="150" height="50" data-id="140" data-pos="product_brand"
                             class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="" title="YUKI" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/yuiki.jpeg') }}" alt="YUKI" title="YUKI"
                             width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="" title="Midea" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/media.jpeg') }}" alt="Midea" title="Midea"
                             width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="" title="Funiki" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/funiki.jpeg') }}" alt="Funiki"
                             title="Funiki" width="150" height="50" data-id="140" data-pos="product_brand"
                             class="img-brand">
                    </a>
                </div>
            </div>

            <div class="row row-brand">
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="{{route("filter_sp",['categoryId' => -1,'categoryChildId'=> -1,'brandId' => 24])}}" title="Sumikura" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/sumikura.jpeg') }}" alt="Sumikura"
                             title="Sumikura" width="150" height="50" data-id="140" data-pos="product_brand"
                             class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="" title="Toshiba" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/toshiba.jpeg') }}" alt="Toshiba"
                             title="Toshiba" width="150" height="50" data-id="140" data-pos="product_brand"
                             class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="" title="Mitsubishi Electric" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/mitsubishi-electric.jpeg') }}"
                             alt="Mitsubishi Electric" title="Mitsubishi Electric" width="150" height="50" data-id="140"
                             data-pos="product_brand" class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="{{route("filter_sp",['categoryId' => -1,'categoryChildId'=> -1,'brandId' => 23])}}" title="Mitsubishi Heavy" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/mitsubishi_heavy.png') }}"
                             alt="Mitsubishi Heavy" title="Mitsubishi Heavy" width="150" height="50" data-id="140"
                             data-pos="product_brand" class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="{{route("filter_sp",['categoryId' => -1,'categoryChildId'=> -1,'brandId' => 21])}}" title="LG" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/partner5-1.jpeg') }}" alt="LG" title="LG"
                             width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="" title="Hitachi" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/hitachi-1.jpeg') }}" alt="Hitachi"
                             title="Hitachi" width="150" height="50" data-id="140" data-pos="product_brand"
                             class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="" title="Sharp" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/sharp.jpeg') }}" alt="Sharp" title="Sharp"
                             width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                    </a>
                </div>
                <div class="col-3 col-md-3 col-lg col-brand">
                    <a href="{{route("filter_sp",['categoryId' => -1,'categoryChildId'=> -1,'brandId' => 22])}}" title="Nagakawa" target="_self"
                       class="advertise-item advertise-140 advertise-item-product_brand advertise">
                        <img thumb="0" src="{{ asset('storage/img/logo_brand/nagakawa.jpeg') }}" alt="Nagakawa"
                             title="Nagakawa" width="150" height="50" data-id="140" data-pos="product_brand"
                             class="img-brand">
                    </a>
                </div>
            </div>
        </div>
    </div>





    <!-- Featured Section Begin -->
    @foreach ($getNestedProduct as $nestedCategorie)
        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2><span class="tax"
                                    style="background: #2bbeff;padding: 15px 100px;border-radius: 20px;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">{{$nestedCategorie -> description}}</span>
                            </h2>
                        </div>
                    </div>
                    <div class="featured__controls">
                        <ul id="filter_brand{{$nestedCategorie -> id}}">
                            <li class="active" data-filter="">Sản Phẩm</li>
                            @foreach ($nestedCategorie -> children as $category_child)
                                @foreach($category_child -> children as $brand)
                                    <li data-filter="{{$brand->id}}">{{$brand-> description}}</li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="product-container{{$nestedCategorie -> id}}"
                     class="row featured__filter alldata{{$nestedCategorie -> id}} ">
                    @foreach ($nestedCategorie -> children as $category_child)
                        @foreach($category_child-> product as $product)
                            <div class="col-sm-6 col-md-4 col-lg-3 " style="margin-top:20px;">
                                <div class="mb ">
                                    <div class="brand">
                                        <a href="">
                                            @if($product->brand !== null && $product->img !== null)
                                                <img
                                                    src="{{asset('storage/img/logo_brand/' . $product->img->file_name)}}"
                                                    class="img-fluid" alt="{{$product->brand->description}}"
                                                    width="37%">
                                            @endif
                                        </a>

                                    </div>
                                    <a class="link-img" href="{{route('detail', $product->url_seo)}}">
                                        <div class="img-content">
                                            @if ($product->image)
                                                <img src="{{ asset('images/' . $product->image->file_name) }}"
                                                     class="img-fluid featured__item__pic set-bg" alt="">
                                            @else
                                                <img src="{{ asset('storage/img/error.jpg') }}"
                                                     class="img-fluid product-img" alt="">
                                            @endif
                                        </div>
                                        <span class="ribbons" style="position: absolute;top: -27px;right: 41px;">
                            <span class="ribbon" style="background-color: #ec2434">Hot</span></span>
                                    </a>
                                    @if($product->wattage !== null)
                                        <div class="info">
                        <span class="wattage me-2">
                            {{ $product->wattage->description }} | NGỰA
                        </span>
                                        </div>
                                    @else
                                        <div class="info-null"></div>
                                    @endif
                                    <div class="product-name title" id="product-name-container{{$product->id}}">
                        <span>
                            <a class="disable-hover" href="{{route('detail', $product->url_seo)}}">
                                {{$product->name}}
                            </a>
                        </span>
                                    </div>
                                    <script>
                                        // Lưu nội dung ban đầu mà không thay đổi sau này
                                        var originalText = document.getElementById('product-name-container{{$product->id}}').querySelector('a').innerHTML;
                                        var productNameContainer = document.getElementById('product-name-container{{$product->id}}');
                                        var productNameLink = productNameContainer.querySelector('a');

                                        var shortenedText = {!!json_encode(substr($product->name, 0, 70)) !!} + '...';

                                        if (window.innerWidth < 1400) {
                                            shortenedText = originalText.substring(0, 70) + '...';
                                        }
                                        if (window.innerWidth < 1104) {
                                            shortenedText = originalText.substring(0, 60) + '...';
                                        }
                                        if (window.innerWidth < 767) {
                                            shortenedText = {!!json_encode(substr($product->name, 0, 50)) !!} + '...';
                                        }
                                        productNameLink.innerHTML = shortenedText;
                                    </script>
                                    <div class="prices title">
                                        @if ($product->price !== null)
                                            <span>{{number_format($product->price)}} <i
                                                    class="fa-solid fa-dong-sign"></i>
                                            </span>

                                        @else
                                            <span>Liên Hệ</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endforeach

                </div>
                <div class=" row featured__filter searchdata{{$nestedCategorie -> id}}"
                     id="Content{{$nestedCategorie -> id}}">
                </div>
                <script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
                <script>
                    $(document).ready(function () {
                        var maxDivs = 8; // Số lượng div tối đa cần xuất ra
                        var currentDivs = 0; // Đếm số lượng div đã xuất ra
                        // Lặp qua mỗi div và kiểm tra số lượng đã xuất ra
                        $('#product-container{{$nestedCategorie -> id}} .col-sm-6.col-md-4.col-lg-3').each(function () {
                            if (currentDivs >= maxDivs) {
                                $(this).hide(); // Ẩn div nếu đã đạt đủ số lượng
                            }
                            currentDivs++;
                        });
                        var usedFilters = [];
                        $("#filter_brand{{$nestedCategorie -> id}} li").each(function () {
                            var currentFilter = $(this).data("filter");
                            if (usedFilters.includes(currentFilter)) {
                                $(this).hide();
                            } else {
                                usedFilters.push(currentFilter);
                            }
                        });
                        // Lấy nội dung của phần tử li dựa trên id "filter_brand"
                        $("#filter_brand{{$nestedCategorie -> id}} li").click(function () {
                            // Lấy nội dung của phần tử li được nhấp vào
                            var brandDescription = $(this).data("filter");
                            var brandDescription1 = $(this).text();
                            // Hiển thị nội dung
                            console.log(brandDescription);
                            console.log(brandDescription1);
                            if (brandDescription) {
                                $('.alldata{{$nestedCategorie -> id}}').hide();
                                $('.searchdata{{$nestedCategorie -> id}}').show();
                            } else {
                                $('.alldata{{$nestedCategorie -> id}}').show();
                                $('.searchdata{{$nestedCategorie -> id}}').hide();
                            }
                            $.ajax({
                                type: 'get',
                                url: '{{route("filter_index")}}',
                                data: {
                                    'brand': brandDescription,
                                    'brand2': brandDescription1,
                                },
                                success: function (data) {
                                    console.log(data);
                                    $('#Content{{$nestedCategorie -> id}}').html(data);
                                }
                            });

                        });
                    });

                </script>

            </div>

            </div>
        </section>
    @endforeach
    <!-- Featured Section End -->
    <!-- Banner Begin -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2><span
                                style="background: #ffffff;padding: 15px 100px;border-radius: 20px;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
                                Tin Tức
                            </span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img style="width: 420px;height: 250px"
                                     src="{{ asset('images/' . $post->image->file_name) }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i>{{$post->created_at}}</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5>
                                    <a href="{{route('posts.show', $post->url_seo)}}">{{  \Illuminate\Support\Str::limit(  $post->title, 50) }}</a>
                                </h5>
                                <p>{{  \Illuminate\Support\Str::limit(  $post->description, 50) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Footer Section End -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>
    <!-- <script src="./script.js"></script> -->
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<script>

    var swiper = new Swiper(".swiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 2,
            slideShadows: true
        },
        spaceBetween: 60,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        autoplay: {
            delay: 2000, // Change the delay to your desired value (in milliseconds)
            disableOnInteraction: false // Enable/disable autoplay on user interaction
        }
    });
    // let typed = new Typed('.auto-input', {
    //     strings: ['Tìm kiếm tại đây...', 'Sản phẩm mới nhất của chúng tôi!', 'UI Designer!', 'Pianist!'],
    //     typeSpeed: 50,
    //     backSpeed: 100,
    //     backDelay: 2000,
    //     loop: true,
    // })

    var isHidden = true; // Biến để xác định trạng thái của header

    var header = document.querySelector('.header__menu1');

    window.addEventListener('scroll', function () {
        var currentScrollPos = document.documentElement.scrollTop;

        if (currentScrollPos >= 200 && isHidden) {
            isHidden = false;
            header.classList.add('hidden');
        } else if (currentScrollPos < 200 && !isHidden) {
            isHidden = true;
            header.classList.remove('hidden');
        }
    });


    var isHidden1 = true; // Biến để xác định trạng thái của header
    var header1 = document.querySelector('.header__menu2');
    window.addEventListener('scroll', function () {
        var currentScrollPos1 = document.documentElement.scrollTop;

        if (currentScrollPos1 >= 200 && isHidden1) {
            isHidden1 = false;
            header1.classList.add('hidden');
        } else if (currentScrollPos1 < 200 && !isHidden1) {
            isHidden1 = true;
            header1.classList.remove('hidden');
        }
    });






    $('.dropdown').mouseover(function () {
        $(this).find('.dropdown-menu').show();
    }).mouseout(function () {
        $(this).find('.dropdown-menu').hide();
    });
    let slider = document.querySelector('.slider1 .list');
    let items = document.querySelectorAll('.slider1 .list .item');
    let next = document.getElementById('next');
    let prev = document.getElementById('prev');
    let dots = document.querySelectorAll('.slider1 .dots li');



    dots.forEach((li, key) => {
        li.addEventListener('click', () => {
            active = key;
            reloadSlider();
        })
    })
    window.onresize = function (event) {
        reloadSlider();
    };
    $(document).ready(function () {
        $('.hero__categories1').hover(function () {
            $('ul.category1').slideToggle(400);
        });
    });



    document.querySelector('.back-to-top').addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    let lengthItems = items.length - 1;
    let active = 0;
    next.onclick = function () {
        active = active + 1 <= lengthItems ? active + 1 : 0;
        reloadSlider();
    }
    prev.onclick = function () {
        active = active - 1 >= 0 ? active - 1 : lengthItems;
        reloadSlider();
    }
    let refreshInterval = setInterval(() => { next.click() }, 3000);
    function reloadSlider() {
        slider.style.left = -items[active].offsetLeft + 'px';
        //
        let last_active_dot = document.querySelector('.slider1 .dots li.active');
        last_active_dot.classList.remove('active');
        dots[active].classList.add('active');

        clearInterval(refreshInterval);
        refreshInterval = setInterval(() => { next.click() }, 3000);


    }

</script>
@endsection

