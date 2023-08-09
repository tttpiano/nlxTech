@extends('front.layouts.master')
@section('main-container')
<main role="main">
    <div class="container-fliud mt-4">
        <div class="card">
            <div class="container-fliud">
                <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post">
                    <div class="wrapper row">


                        <div class="preview col-sm col-md-6 col-lg-4" style="border-right: 1px solid #d2d2d2;">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1" style="text-align: center; ">
                                    <img style="width: 400px;" src="{{ asset('images/' . $product->image->file_name) }}" class="img-fluid" alt="Product Image">
                                </div>
                                <div class="tab-pane" id="pic-2" style="text-align: center; ">
                                    <img style="width: 400px;" src="{{ asset('images/' . $product->image->file_name) }}" class="img-fluid" alt="Product Image">
                                </div>
                                <div class="tab-pane " id="pic-3" style="text-align: center; ">
                                    <img style="width: 400px;" src="{{ asset('images/' . $product->image->file_name) }}" class="img-fluid" alt="Product Image">
                                </div>
                            </div>

                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active">
                                    <a data-target="#pic-1" data-toggle="tab" class="active">
                                        <img src="{{ asset('images/' . $product->image->file_name) }}" alt="Product Image">
                                    </a>
                                </li>
                                <li class="">
                                    <a data-target="#pic-2" data-toggle="tab" class="">
                                        <img src="{{ asset('images/' . $product->image->file_name) }}" alt="Product Image">
                                    </a>
                                </li>
                                <li class="">
                                    <a data-target="#pic-3" data-toggle="tab" class="">
                                        <img src="{{ asset('images/' . $product->image->file_name) }}" alt="Product Image">
                                    </a>
                                </li>
                            </ul>

                        </div>


                        <div class="details col-sm col-md-6 col-lg-5">

                            <h3 class="product-title">{{ $product->name }}</h3>
                            <div class="contacts">
                                <h4 class="price">Giá: <span>Liên hệ</span></h4>

                            </div>


                            <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                <strong>Uy tín</strong>!
                            </p>
                            <div class="share" >
                                <h5 class="price">Chia sẻ: </h5>
                            <div class="elfsight-app-fcc1ac66-e5f7-45c1-80a7-0bc34b8d9700"></div>
                            </div>
                            
                        </div>
                        <div class="details col-md col-lg-3">
                            <div class="row row-cols-1 bg-light mb-5 py-3 px-4 g-0">
                                <div class="col py-2">
                                    <div class="site-info__item d-flex align-items-center">
                                        <div class="site-info__image me-3">
                                            <img data-src="https://maylanhgiadaily.b-cdn.net/brands/hinh-1.png" alt="Sản Phẩm Chính Hãng" class="lazyload entered loaded" data-ll-status="loaded" src="https://maylanhgiadaily.b-cdn.net/brands/hinh-1.png">
                                        </div>
                                        <div class="site-info__content">
                                            <div class="site-info__title h4 fw-bold">Sản Phẩm Chính Hãng</div>
                                            <div class="site-info__desc">Cam kết sản phẩm chính hãng, mới 100% Bồi thường nếu phát hiện máy không chính hãng</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col py-2">
                                    <div class="site-info__item d-flex align-items-center">
                                        <div class="site-info__image me-3">
                                            <img data-src="https://maylanhgiadaily.b-cdn.net/brands/icon-bao-hanh.png" alt="Bảo Hành Lâu Dài" class="lazyload entered loaded" data-ll-status="loaded" src="https://maylanhgiadaily.b-cdn.net/brands/icon-bao-hanh.png">
                                        </div>
                                        <div class="site-info__content">
                                            <div class="site-info__title h4 fw-bold">Bảo Hành Lâu Dài</div>
                                            <div class="site-info__desc">Bảo hành chính hãng, hệ thống bảo hành toàn miền Nam, tận nhà: 01 năm thân máy, 05 năm máy nén </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col py-2">
                                    <div class="site-info__item d-flex align-items-center" style="border: none;">
                                        <div class="site-info__image me-3">
                                            <img data-src="https://maylanhgiadaily.b-cdn.net/price-icon.png" alt="Giá Cả Cạnh Tranh" class="lazyload entered loaded" data-ll-status="loaded" src="https://maylanhgiadaily.b-cdn.net/price-icon.png">
                                        </div>
                                        <div class="site-info__content">
                                            <div class="site-info__title h4 fw-bold">Giá Cả Cạnh Tranh</div>
                                            <div class="site-info__desc">Giảm 5% cho đơn hàng &gt;150 triệu. Miễn phí vận chuyển nội thành TPHCM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>



            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="describe">
                            <h2>
                                <span>
                                    Mô tả
                                </span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-9 col-12 descrips">
                        <div class="product-description">
                            <div class="short-description">

                                {!! substr(strip_tags(html_entity_decode($product->description)), 0, 450) !!}...

                            </div>
                            <div class="full-description" style="display: none;">
                                {!! html_entity_decode($product->description) !!}
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col">


                    </div>
                    <div class="see_more " style="text-align: center; margin-top: 20px;">
                        <span class="read-more-btn btn btn-outline-secondary" data-product-id="{{ $product->id }}">Xem thêm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 h2">
                        <h2 class="splh">Sản phẩm liên quan</h2>
                    </div>
                    @foreach($value as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3" style="margin-top: 20px">
                        <div class="mb ">
                            <div class="brand">
                                <a href="">
                                    @if($product->brand !== null)
                                    <img src="{{asset('storage/img/logo_brand/' . $product->img->file_name)}}" class="img-fluid" alt="{{$product->brand->description}}" width="37%">
                                    @endif
                                </a>
                            </div>
                            <a class="link-img" href="">
                                <div class="img-content">
                                    <img style="height: 300px; width: auto" src="{{ asset('images/' . $product->image->file_name) }}" class="img-fluid featured__item__pic set-bg" alt="">
                                </div>
                                <span class="ribbons" style="position: absolute;top: -27px;right: 41px;">
                                    <span class="ribbon" style="background-color: #ec2434">Hot</span>
                                </span>
                            </a>

                            <div class="product-name title" id="product-name-container{{$product->id}}">
                                <span>
                                    <a class="disable-hover" href="">
                                        {{$product->name}}
                                    </a>
                                </span>
                            </div>
                            <script>
                                // Lưu nội dung ban đầu mà không thay đổi sau này
                                var originalText = document.getElementById('product-name-container{{$product->id}}').querySelector('a').innerHTML;
                                var productNameContainer = document.getElementById('product-name-container{{$product->id}}');
                                var productNameLink = productNameContainer.querySelector('a');

                                var shortenedText = {!! json_encode(substr($product->name, 0, 70)) !!} + '...';
                                
                                if (window.innerWidth < 1400) {
                                    shortenedText = originalText.substring(0, 80) + '...';
                                }
                                if (window.innerWidth < 1104) {
                                    shortenedText = originalText.substring(0, 70) + '...';
                                }
                                if (window.innerWidth < 767) {
                                    shortenedText =  {!! json_encode(substr($product->name, 0, 70)) !!} + '...';
                                }
                                productNameLink.innerHTML = shortenedText;
                            </script>
                            <div class="prices title">
                                <span>
                                    Liên hệ
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End block content -->
</main>




<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const readMoreBtn = document.querySelector(".see_more .read-more-btn");

        readMoreBtn.addEventListener("click", function(e) {
            e.preventDefault();
            const productId = readMoreBtn.getAttribute("data-product-id");

            // Gửi yêu cầu AJAX đến route lấy nội dung mô tả đầy đủ
            fetch(`/get-full-description/${productId}`)
                .then(response => response.json())
                .then(data => {
                    // Thay đổi nội dung mô tả hiện tại bằng nội dung đầy đủ
                    const fullDescription = document.querySelector(".full-description");
                    fullDescription.innerHTML = data.full_description;
                    fullDescription.style.display = "block";
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>


<!-- Đoạn mã HTML trước đó -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const readMoreBtn = document.querySelector(".see_more .read-more-btn");
        const shortDescription = document.querySelector(".short-description");
        const fullDescription = document.querySelector(".full-description");

        readMoreBtn.addEventListener("click", function(e) {
            e.preventDefault();
            if (shortDescription.style.display === "none") {
                // Hiển thị mô tả ngắn, ẩn mô tả đầy đủ
                shortDescription.style.display = "block";
                fullDescription.style.display = "none";
                readMoreBtn.textContent = "Xem thêm";

                // Cuộn lên chỗ mô tả
                const describeSection = document.querySelector(".describe");
                const scrollToPosition = describeSection.getBoundingClientRect().top + window.pageYOffset;
                window.scrollTo({
                    top: scrollToPosition,
                    behavior: "smooth"
                });
            } else {
                // Hiển thị mô tả đầy đủ, ẩn mô tả ngắn
                shortDescription.style.display = "none";
                fullDescription.style.display = "block";
                readMoreBtn.textContent = "Ẩn bớt";

                // Cuộn lên chỗ mô tả
                const describeSection = document.querySelector(".describe");
                const scrollToPosition = describeSection.getBoundingClientRect().top + window.pageYOffset;
                window.scrollTo({
                    top: scrollToPosition,
                    behavior: "smooth"
                });
            }
        });
    });
</script>



@endsection