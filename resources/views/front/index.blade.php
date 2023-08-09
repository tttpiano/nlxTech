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
            <div class="swiper-slide swiper-slide--one" style="background: linear-gradient(to top, #255063, #203a4300, #2c536400),
    url(https://maylanhgiadaily.b-cdn.net/picture1.jpg)
      no-repeat 50% 50% / cover;">
                <span>domestic</span>
                <div>
                    <a href="#">Enjoy the exotic of sunny Hawaii</a>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        Maui, Hawaii
                    </p>
                </div>
            </div>
            {{-- <div class="swiper-slide swiper-slide--two">--}}
            {{-- <span>subtropical</span>--}}
            {{-- <div>--}}
            {{-- <a href="#">The Island of Eternal Spring</a>--}}
            {{-- <p>--}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
            {{-- stroke="currentColor" class="w-6 h-6">--}}
            {{-- <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{-- d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
            {{-- <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{-- d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>--}}
            {{-- </svg>--}}
            {{-- Lanzarote, Spanien--}}
            {{-- </p>--}}
            {{-- </div>--}}
            {{-- </div>--}}

            {{-- <div class="swiper-slide swiper-slide--three">--}}
            {{-- <span>history</span>--}}
            {{-- <div>--}}
            {{-- <a href="#">Awesome Eiffel Tower</a>--}}
            {{-- <p>--}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
            {{-- stroke="currentColor" class="w-6 h-6">--}}
            {{-- <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{-- d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
            {{-- <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{-- d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>--}}
            {{-- </svg>--}}
            {{-- Paris, France--}}
            {{-- </p>--}}
            {{-- </div>--}}
            {{-- </div>--}}

            {{-- <div class="swiper-slide swiper-slide--four">--}}
            {{-- <span>Mayans</span>--}}
            {{-- <div>--}}
            {{-- <a href="#">Awesome Eiffel Tower</a>--}}
            {{-- <p>--}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
            {{-- stroke="currentColor" class="w-6 h-6">--}}
            {{-- <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{-- d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
            {{-- <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{-- d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>--}}
            {{-- </svg>--}}
            {{-- The Yucatan, Mexico--}}
            {{-- </p>--}}
            {{-- </div>--}}
            {{-- </div>--}}

            {{-- <div class="swiper-slide swiper-slide--five">--}}
            {{-- <span>native</span>--}}
            {{-- <div>--}}
            {{-- <a href="#">The most popular yachting destination</a>--}}
            {{-- <p>--}}

            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
            {{-- stroke="currentColor" class="w-6 h-6">--}}
            {{-- <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{-- d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
            {{-- <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{-- d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>--}}
            {{-- </svg>--}}
            {{-- Whitsunday Islands, Australia--}}
            {{-- </p>--}}
            {{-- </div>--}}
            {{-- </div>--}}
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>
<!-- Categories Section End -->
<div class="logo_brand">
    <div class="container">
        <div class="row row-brand">
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Daikin" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/daikin.png') }}" alt="Daikin" title="Daikin" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Panasonic" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/panasonic-logo-scaled.jpeg') }}" alt="Panasonic" title="Panasonic" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="GREE" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/gree.png') }}" alt="GREE" title="GREE" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Samsung" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/logo-samsung-inkythuatso-01-29-08-50-42.jpeg') }}" alt="Samsung" title="Samsung" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Reetech" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/logo-reetech.jpeg') }}" alt="Reetech" title="Reetech" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="YUKI" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/yuiki.jpeg') }}" alt="YUKI" title="YUKI" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Midea" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/media.jpeg') }}" alt="Midea" title="Midea" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Funiki" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/funiki.jpeg') }}" alt="Funiki" title="Funiki" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
        </div>

        <div class="row row-brand">
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Sumikura" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/sumikura.jpeg') }}" alt="Sumikura" title="Sumikura" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Toshiba" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/toshiba.jpeg') }}" alt="Toshiba" title="Toshiba" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Mitsubishi Electric" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/mitsubishi-electric.jpeg') }}" alt="Mitsubishi Electric" title="Mitsubishi Electric" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Mitsubishi Heavy" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/mitsubishi_heavy.png') }}" alt="Mitsubishi Heavy" title="Mitsubishi Heavy" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="LG" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/partner5-1.jpeg') }}" alt="LG" title="LG" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Hitachi" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/hitachi-1.jpeg') }}" alt="Hitachi" title="Hitachi" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Sharp" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/sharp.jpeg') }}" alt="Sharp" title="Sharp" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
            <div class="col-3 col-md-3 col-lg col-brand">
                <a href="" title="Nagakawa" target="_self" class="advertise-item advertise-140 advertise-item-product_brand advertise">
                    <img thumb="0" src="{{ asset('storage/img/logo_brand/nagakawa.jpeg') }}" alt="Nagakawa" title="Nagakawa" width="150" height="50" data-id="140" data-pos="product_brand" class="img-brand">
                </a>
            </div>
        </div>
    </div>
</div>





<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản Phẩm Nổi Bật</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Tất Cả</li>
                        <li data-filter=".oranges">Máy Lạnh Công Nghiệp</li>
                        <li data-filter=".fresh-meat">Kho Lạnh</li>
                        <li data-filter=".vegetables">Điện Công Nghiệp</li>
                        <li data-filter=".fastfood">Quạt Nhà Xưởng</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($products as $product)

            <!-- <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    @if ($product->image)
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('images/' . $product->image->file_name) }}">
                        @else
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('storage/img/error.jpg') }}">
                            @endif

                            <ul class="featured__item__pic__hover">
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{route('detail', $product->url_seo)}}">{{$product->name}}</a></h6>
                            @if ($product->price !== null)
                            <h5>{{ $product->price }}</h5>
                            @else
                            <h5>Liên Hệ</h5>
                            @endif
                        </div>
                    </div>
                </div>

                

                
            </div> -->

            <div class="col-sm-6 col-md-4 col-lg-3" style="margin-top:20px;">
                <div class="mb ">
                    <div class="brand">
                        <a href="">
                            @if($product->brand !== null && $product->brand->img !== null)
                            <img src="{{asset('storage/img/logo_brand/' . $product->brand->img->file_name)}}" class="img-fluid" alt="{{$product->brand->description}}" width="37%">
                            @endif
                        </a>

                    </div>
                    <a class="link-img" href="{{route('detail', $product->url_seo)}}">
                        <div class="img-content" >
                            @if ($product->image)
                            <img src="{{ asset('images/' . $product->image->file_name) }}" class="img-fluid featured__item__pic set-bg" alt="">
                            @else
                            <img src="{{ asset('storage/img/error.jpg') }}" class="img-fluid product-img" alt="">
                            @endif
                        </div>
                        <span class="ribbons" style="position: absolute;top: -27px;right: 41px;">
                            <span class="ribbon" style="background-color: #ec2434">Hot</span>
                        </span>
                    </a>

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
                        <span>{{ $product->price }}</span>
                        @else
                        <span>Liên hệ</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    </div>
</section>
<!-- Featured Section End -->
<!-- Banner Begin -->
<div class="banner1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('img/banner/dcn.jpeg')}}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img class="{{asset('img/banner/quatcn.jpeg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->
<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm mới nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm đánh giá cao</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm được mua nhiều</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('storage/img/quatdieuhoa.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Sản Phẩm 1</h6>
                                    <span>100.000.000</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection