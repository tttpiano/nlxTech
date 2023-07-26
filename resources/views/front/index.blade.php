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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            </svg>
                            Maui, Hawaii
                        </p>
                    </div>
                </div>
                {{--                <div class="swiper-slide swiper-slide--two">--}}
                {{--                    <span>subtropical</span>--}}
                {{--                    <div>--}}
                {{--                        <a href="#">The Island of Eternal Spring</a>--}}
                {{--                        <p>--}}
                {{--                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
                {{--                                 stroke="currentColor" class="w-6 h-6">--}}
                {{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
                {{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>--}}
                {{--                            </svg>--}}
                {{--                            Lanzarote, Spanien--}}
                {{--                        </p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                {{--                <div class="swiper-slide swiper-slide--three">--}}
                {{--                    <span>history</span>--}}
                {{--                    <div>--}}
                {{--                        <a href="#">Awesome Eiffel Tower</a>--}}
                {{--                        <p>--}}
                {{--                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
                {{--                                 stroke="currentColor" class="w-6 h-6">--}}
                {{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
                {{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>--}}
                {{--                            </svg>--}}
                {{--                            Paris, France--}}
                {{--                        </p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                {{--                <div class="swiper-slide swiper-slide--four">--}}
                {{--                    <span>Mayans</span>--}}
                {{--                    <div>--}}
                {{--                        <a href="#">Awesome Eiffel Tower</a>--}}
                {{--                        <p>--}}
                {{--                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
                {{--                                 stroke="currentColor" class="w-6 h-6">--}}
                {{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
                {{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>--}}
                {{--                            </svg>--}}
                {{--                            The Yucatan, Mexico--}}
                {{--                        </p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                {{--                <div class="swiper-slide swiper-slide--five">--}}
                {{--                    <span>native</span>--}}
                {{--                    <div>--}}
                {{--                        <a href="#">The most popular yachting destination</a>--}}
                {{--                        <p>--}}

                {{--                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
                {{--                                 stroke="currentColor" class="w-6 h-6">--}}
                {{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
                {{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>--}}
                {{--                            </svg>--}}
                {{--                            Whitsunday Islands, Australia--}}
                {{--                        </p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- Categories Section End -->
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
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            @if ($product->image)

                                <div class="featured__item__pic set-bg"
                                     data-setbg="{{ asset('images/' . $product->image->file_name) }}">
                                    @else
                                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('storage/img/error.jpg') }}">
                                            @endif

                                            <ul class="featured__item__pic__hover">
                                            </ul>
                                        </div>
                                        <div class="featured__item__text">
                                            <h6><a href="#">{{$product->name}}</a></h6>
                                            @if ($product->price !== null)
                                                <h5>{{ $product->price }}</h5>
                                            @else
                                                <h5>Liên Hệ</h5>
                                            @endif
                                        </div>
                                </div>
                        </div>

                        @endforeach

                        <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                     data-setbg="{{asset('storage/img/quatdieuhoa.jpg')}}">
                                    <ul class="featured__item__pic__hover">

                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">Sản Phẩm 1</a></h6>
                                    <h5>100.000.000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                     data-setbg="{{asset('storage/img/quatdieuhoa.jpg')}}">
                                    <ul class="featured__item__pic__hover">

                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">Sản Phẩm 1</a></h6>
                                    <h5>100.000.000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                     data-setbg="{{asset('storage/img/quatdieuhoa.jpg')}}">
                                    <ul class="featured__item__pic__hover">

                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">Sản Phẩm 1</a></h6>
                                    <h5>100.000.000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                     data-setbg="{{asset('storage/img/quatdieuhoa.jpg')}}">
                                    <ul class="featured__item__pic__hover">

                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">Sản Phẩm 1</a></h6>
                                    <h5>100.000.000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                     data-setbg="{{asset('storage/img/quatdieuhoa.jpg')}}">
                                    <ul class="featured__item__pic__hover">

                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">Sản Phẩm 1</a></h6>
                                    <h5>100.000.000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                     data-setbg="{{asset('storage/img/quatdieuhoa.jpg')}}">
                                    <ul class="featured__item__pic__hover">
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">Sản Phẩm 1</a></h6>
                                    <h5>100.000.000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                     data-setbg="{{asset('storage/img/quatdieuhoa.jpg')}}">
                                    <ul class="featured__item__pic__hover">

                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">Sản Phẩm 1</a></h6>
                                    <h5>100.000.000</h5>
                                </div>
                            </div>
                        </div>
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
