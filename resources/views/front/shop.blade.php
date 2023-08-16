@extends('front.layouts.master')
@section('main-container')
    <div class="introduce cuon">
        <h1>Sản Phẩm</h1>
    </div>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5" style="padding: 0 !important;">
                    <div class="sidebar" style="background: #def4ff69; border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset; padding: 20px 0 ;">
                        <div class="sidebar__item">
                            <h4 style="margin-top: 20px; margin-left: 20px">Danh Mục Sản Phẩm</h4>

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
                <div class="col-lg-9 col-md-7" style="transform: translateX(20px)">
                    <div class="product__discount" style="padding: 0">
                        <h2 id="fillterShop"></h2>
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
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3" style="margin-top: 20px">
                            <div class="mb ">
                                <div class="brand">
                                    <a href="">
{{--                                        @if($product->brand !== null && $product->img !== null)--}}
{{--                                            <img src="{{asset('storage/img/logo_brand/' . $product->img->file_name)}}"--}}
{{--                                                 class="img-fluid" alt="{{$product->brand->description}}" width="37%">--}}
{{--                                        @endif--}}
                                    </a>
                                </div>
                                <a class="link-img" >
                                    <div class="img-content">
                                        <img src="{{ asset('images/' .$product->images->first()->image->file_name) }}"
                                             class="img-fluid featured__item__pic set-bg" alt="">
                                    </div>
                                    <span class="ribbons" style="position: absolute;top: -27px;right: 41px;">
                                    <span class="ribbon" style="background-color: #ec2434">Hot</span>
                                </span>
                                </a>

                                <div class="product-name title" id="product-name-container{{$product->id}}">
                                <span>
                                    <a class="disable-hover" >
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
                                        shortenedText = originalText.substring(0, 80) + '...';
                                    }
                                    if (window.innerWidth < 1104) {
                                        shortenedText = originalText.substring(0, 70) + '...';
                                    }
                                    if (window.innerWidth < 767) {
                                        shortenedText = {!!json_encode(substr($product->name, 0, 70)) !!} + '...';
                                    }
                                    productNameLink.innerHTML = shortenedText;
                                </script>
                                <div class="prices title">
                                <span>
                                    Liên hệ
                                </span>
                                </div>
                            </div>
                        </div> @endforeach
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
