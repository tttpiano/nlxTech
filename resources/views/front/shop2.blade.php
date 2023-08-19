@extends('front.layouts.master')
@section('main-container')
    <div class="introduce cuon">
        <h1>Sản Phẩm</h1>
    </div>
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
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5" style="padding: 0 !important;">
                    <div class="sidebar" style="background: #def4ff69; border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset; padding: 20px 0 ;">
                        <div class="sidebar__item">
                            <h4 style="margin-top: 20px; margin-left: 20px"><a href="{{route('shop')}} "style="color: #000">Danh Mục Sản Phẩm</a>
                            </h4>
                            <ul class="header__menu__dropdown" style="margin-left: 20px;
    padding: 0 20px;
    margin-right: 20px;
    border: 1px solid #26a9ea;
    background: white;
    border-radius: 10px;">
                                @foreach ($nestedCategories as $category)
                                    @include('front.layouts.menuShop', ['category' => $category])
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7 sp" style="transform: translateX(20px)">
                    <div class="product__discount" style="padding: 0">
                        @if($party !== null)
                            <h2 id="fillterShop">{{$party}}</h2>
                        @else
                            <h2 id="fillterShop">Không tìm thấy.....</h2>
                        @endif
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">

                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alldata">
                        <div class="row ">
                            @foreach($products as $product)
                                <div class="col-sm-6 col-md-6 col-lg-4" style="margin-top: 20px">
                                    <div class="mb ">
                                        <div class="brand">
                                            <a>
                                                @if($product->brand !== null && $product->img !== null)
                                                    <img
                                                        src="{{asset('storage/img/logo_brand/' . $product->img->file_name)}}"
                                                        class="img-fluid" alt="" width="37%">
                                                @endif
                                            </a>
                                        </div>
                                        <a class="link-img" href="{{route('detail', $product->url_seo)}}">
                                            <div class="img-content">
                                                <img
                                                    src="{{ asset('images/' .$product->images->first()->image->file_name) }}"
                                                    class="img-fluid featured__item__pic set-bg" alt="">
                                            </div>
                                            <span class="ribbons" style="position: absolute;top: -27px;right: 41px;">
                                    <span class="ribbon" style="background-color: #ec2434">Hot</span>
                                 </span>
                                        </a>
                                        @if($product->wattage !== null)
                                            <div class="info">
                        <span class="wattage me-2">
                            {{ $product->wattage->description }}
                        </span>
                                            </div>
                                        @else
                                            <div class="info-null" style="color: rgba(255,255,255,0)">.</div>
                                        @endif


                                        <div class="product-name title"
                                             id="product-name-container{{$product->id}}">
                                <span>
                                    <a class="disable-hover" href="{{route('detail', $product->url_seo)}} ">
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
                                                shortenedText = {!!json_encode(substr($product->name, 0, 60)) !!} + '...';
                                            }
                                            if (window.innerWidth < 1104) {
                                                shortenedText = {!!json_encode(substr($product->name, 0, 50)) !!} + '...';
                                            }
                                            if (window.innerWidth < 767) {
                                                shortenedText = {!!json_encode(substr($product->name, 0, 70)) !!} + '...';
                                            }
                                            productNameLink.innerHTML = shortenedText;
                                        </script>
                                        <div class="prices title">
                                            @if ( $product->price > 0 && $product-> price_status !== "Hidden" )
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

                        </div>
                        <div class="pagination justify-content-center" style="margin-top: 30px">
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    <div class="searchdata" id="Content"></div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('storage/js/jquery-3.3.1.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            function scrollToSidebar2() {
                // Cuộn trang lên tới phần tử có class "sidebar"
                $('html, body').animate({
                    scrollTop: $('.cuon').offset().top
                }, 100); // 1000 là thời gian cuộn (milliseconds)
            }

            scrollToSidebar2();
        });
    </script>
@endsection

