<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{asset('storage/img/logo/logo.jpg')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="icon" href="" type="image/x-icon">
    <!-- Css Styles -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> -->
    <link rel="stylesheet" href="{{asset('storage/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('storage/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('storage/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('storage/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('storage/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('storage/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('storage/css/style.css')}}" type="text/css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'>
    <link rel="stylesheet" href="{{asset('storage/css/slide.css')}}" type="text/css">
    <!-- Css Slide -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>


<body>


@include('front/layouts/header')
<!-- header end -->

<!-- body - container -->
@yield('main-container')

<!-- footer -->
@include('front/layouts/footer')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Footer Section End -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>
<!-- <script src="./script.js"></script> -->
<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<!-- Js Plugins -->
<script src="{{asset('storage/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('storage/js/bootstrap.min.js')}}"></script>
<script src="{{asset('storage/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('storage/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('storage/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('storage/js/mixitup.min.js')}}"></script>
<script src="{{asset('storage/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('storage/js/main.js')}}"></script>
<script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

<script src="{{asset('storage/js/index.js')}}"></script>

</body>

</html>
