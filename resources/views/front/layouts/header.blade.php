<div class="header__menu1">

    <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories1 ">
                    <div class="hero__categories__all1 menuindex"
                         style="background: #38A7FF;box-shadow: 2px 3px 9px #1313137a;">
                        <i class="fa fa-bars"></i>
                        <span>Danh Mục</span>
                        <ul class="dropdown-menu menu__party " role="menu" aria-labelledby="dropdownMenu">
                            @foreach ($nestedCategories as $category)
                                @include('front.layouts.child_category', ['category' => $category])
                            @endforeach
                        </ul>

                    </div>

                </div>
            </div>
            <div class="col-lg-9">

                <nav class="header__menu" style="background: #38A7FF;">
                    <ul>
                        <li class="active"><a href="/">Trang Chủ</a></li>
                        <li><a href="{{route('introduce')}}">Giới Thiệu</a></li>
                        <li><a href="{{route('shop')}}">Sản Phẩm</a>
                        </li>
                        <li><a href="{{ route('blog')}}">Tin Tức</a></li>
                        <li><a href="{{ route('contact')}}">Liên Hệ</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="header__menu2">
    <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
            <div class="col-md-3">
                <div class="humberger__menu__overlay"></div>
                <div class="humberger__menu__wrapper">
                    <div class="humberger__menu__logo">
                        <a href="/"><img src="{{asset("storage/img/logonlx.png")}}" alt=""></a>
                    </div>
                    <div id="mobile-menu-wrap"></div>
                </div>
                <div class="humberger__open" style="color: #249bc8 !important; top: 17px !important;">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
            <div class="col-md-6" style="text-align: center;">
                <a href="#"><img class="img-fluid" style="object-fit: contain; width: 180px;"
                                 src="{{asset("storage/img/logonlx.png")}}"
                                 alt=""></a>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</div>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<a href="#" class="back-to-top">
    <i class="fa fa-angle-up"></i>
</a>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="\"><img src="{{asset("storage/img/logonlx.png")}}" alt=""></a>
    </div>
    <nav class="humberger__menu__nav mobile-menu menu">
        <ul style=" border: #249bc8 solid 0.5px; padding: 20px;margin-right: 10px;border-radius: 20px; padding-right: 0">
            <li class="active"><a href="/">Trang Chủ</a></li>
            <li><a href="{{route('introduce')}}">Giới Thiệu</a></li>
            <li><a href="{{route('shop')}}">Sản Phẩm</a>
            </li>
            <li><a href="{{ route('blog')}}">Tin Tức</a></li>
            <li><a href="{{ route('contact')}}">Liên Hệ</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>

</div>


<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i>nangluongxanhtech@gmail.com</li>
                            <li><i class="fa fa-phone"></i>0905.211.689</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <ul class="icon__header">
                                <li><i class="fab fa-facebook-f"></i></li>
                                <!-- <li><i class="fab fa-twitter"></i></li> -->
                                <li><i class="fab fa-instagram"></i></li>
                                <li><i class="fab fa-linkedin-in"></i></li>
                                <li><i class="fab fa-youtube"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ url('') }}"><img src="{{asset("storage/img/logonlx.png")}}" alt=""
                                                 style="margin-top: 7px; max-width: 85%;"></a>
                </div>
            </div>

            <div class="col-lg-6" style="padding-top: 20px;">
                <div class="box" style="position: relative;">
                    <form action="{{ route('products.search')}}" method="get" class="container-4">
                        <input value="{{ request('search') }}" name="keyword" class="input__search" type="search" id="search1" placeholder="Tìm kiếm tại đây..."/>
                        <button type="submit" class="icon"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="searchdata" id="Content" style="display:none;border: 1px solid #ccc;border-radius: 5px;padding: 15px;position: absolute; z-index: 9999;background: #fff;width: 100%;">

                    </div>
                </div>
            </div>

            <div style="display: flex; transform: translate(0%, 38%);
                margin-bottom: 50px;" class="col-lg-3 phone1">
                <div class="hero__search__phone">
                    <div class="hero__search__phone__icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="hero__search__phone__text">
                        <h6>0905.211.689</h6>
                        <p>Hỗ Trợ 24/7</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="humberger__open">
        <i class="fa fa-bars"></i>
    </div>
    </div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->
<div class="header__menu">

    <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all"
                         style="background: #38A7FF;box-shadow: 2px 3px 9px #1313137a;">
                        <i class="fa fa-bars"></i>
                        <span>Danh Mục </span>
                    </div>

                </div>
            </div>
            <div class="col-lg-9">
                <nav class="header__menu" style="background: #38A7FF;">
                    <ul>
                        <li class="active"><a href="{{ url('') }}">Trang Chủ</a></li>
                        <li><a href="{{route('introduce')}}">Giới Thiệu</a></li>
                        <li><a href="{{route('shop')}}">Sản Phẩm </a></li>
                        <li><a href="{{ route('blog')}}">Tin Tức</a></li>
                        <li><a href="{{ route('contact')}}">Liên Hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="hero" style="position: absolute; z-index: 99">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <ul class="category" style="background: #fff;transform: translateY(-128px);width: 100%;">
                        @foreach ($nestedCategories as $category)
                            @include('front.layouts.child', ['category' => $category])
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">

            </div>
        </div>
    </div>
</section>
<div class="humberger__menu__overlay2"></div>
<div class="humberger__menu__wrapper2">
    <div class="humberger__menu__logo2">
        <a href="\"><img src="{{asset("storage/img/logonlx.png")}}" alt=""></a>
    </div>
    <h3 style="text-align: center;padding: 10px 0;
    transform: translateY(28px); box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset !important;"> Doanh Mục </h3>
    <nav class="humberger__menu__nav2 mobile-menu2 menu2" style="margin-top: 50px">
        <ul class="header__menu__dropdown"
            style="border: #249bc8 solid 0.5px;border-radius: 20px;padding: 30px 0 30px 10px;">
            @foreach ($nestedCategories as $category)
                @include('front.layouts.childMobile', ['category' => $category])
            @endforeach
        </ul>
    </nav>
    <div id="mobile-menu-wrap2"></div>
</div>
<script src="{{asset('storage/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>

<script>
    $(".menuindex").hover(
        function () {
            $('>.dropdown-menu', this).stop(true, true).fadeIn("fast");
            $(this).addClass('open');
        },
        function () {
            $('>.dropdown-menu', this).stop(true, true).fadeOut("fast");
            $(this).removeClass('open');
        }
    );
</script>
<script>
    function debounce(func, delayTime) {
        let timer;

        return function() {
            clearTimeout(timer);
            timer = setTimeout(func, delayTime);
        };
    }

    $(document).ready(function() {
        const delayTime = 500;
        const delayedSearch = debounce(function() {
            const inputValue = $('#search1').val();
            if (inputValue) {
                $('.searchdata').css('display', 'block');
            } else {
                $('.searchdata').css('display', 'none');
            }

            console.log(inputValue);
            $.ajax({
                type: 'get',
                url: '{{route("searchlq")}}',
                data: {
                    'search': inputValue
                },
                success: function (data) {
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        }, delayTime);
        $('#search1').on('input', function() {
            delayedSearch();
        });

    });





</script>
<script>
        $(document).ready(function() {
            // Lấy query string từ URL
            var url = window.location.href;
            var queryString = url.split('=')[1];
            
            // Gán query string vào input
            if (queryString) {
                var decodedValue = decodeURIComponent(queryString);
                $('#search1').val(decodedValue);
            }
        });
    </script>

