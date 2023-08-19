<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="{{asset('storage/img/logonlx.png')}}" style="max-width: 80%;"
                                                    alt=""></a>
                    </div>
                    <ul>
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            Đ/C: Tầng 17, Opal Bourevard, An Bình, Dĩ An, Bình Dương
                        </li>
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            Đ/C: Số 4, Nguyễn Đình Chiểu, Phường Đa Kao, Quận 1, TP.HCM
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            Hỗ trợ: 023.132.123
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            Email: nangluongxanhtech@gmail.com
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 offset-lg-1s">
                <div class="footer__widget">
                    <h5>Danh Mục Chính</h5>
                    <ul>
                        @foreach ($nestedCategories as $category)
                            <li><a href="#">{{$category->description}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6  policy">
                <div class="footer__widget">
                    <h5>Chính Sách Bán Hàng</h5>
                    <ul>
                        <li><a href="#">Chính Sách Vận Chuyển</a></li>
                        <li><a href="#">Chính Sách Bán Hàng</a></li>
                        <li><a href="#">Chính Sách Bảo Hành</a></li>
                        <li><a href="#">Chính Sách Đổi Trả</a></li>
                        <li><a href="#">Chính Sách Bảo Mật Thông Tin</a></li>
                    </ul>
                    <!-- <ul>

                    <li><a href="#">Chính Sách Bán Hàng</a></li>
                    <li><a href="#">Chính Sách Vận Chuyển</a></li>
                    <li><a href="#">Chính Sách Bảo Hành</a></li>

                </ul> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-1s">
                <div class="footer__widget">
                    <h5>Kết Nối Với NangLuongXanh</h5>
                    <span>
                            <a href=""><img src="{{asset('storage/img/youtube.jpg')}}" alt=""></a>
                            <a href=""><img src="{{asset('storage/img/facebook.png')}}" alt=""></a>
                            <a href=""><img src="{{asset('storage/img/zalo.png')}}" alt=""></a>
                            <a href=""><img src="{{asset('storage/img/tiktok.png')}}" alt=""></a>
                            <a href=""><img src="{{asset('storage/img/instagram.jpg')}}" alt=""></a>

                        </span><br>
                    <br>
                    <h6>Website Khác</h6>
                    <ul>
                        <li>
                            Bác Sỹ Máy Lạnh <br>
                            <a href="https://bacsimaylanh.com.vn/"><img style="width: 200px; height:45px;"
                                                                        src="{{asset('storage/img/Bacsimaylanh.png')}}"
                                                                        alt=""></a>

                        </li>

                        <li>
                            An Toàn Lao Động <br>
                            <a href="https://antoanvn.com.vn/"><img class="atld"
                                                                    style="width: 16%; margin-left: 8px;"
                                                                    src="{{asset('storage/img/antoanvn.png')}}" alt=""></a>
                        </li>
                        <li>
                            Máy Lạnh Giá Đại Lý <br>
                            <a href="https://www.maylanhgiadaily.com.vn/"><img
                                    style="width: 200px; height:45px;object-fit: fill;"
                                    src="{{asset('storage/img/maylanhgiadaily.jpg')}}" alt=""></a>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script>
                            <a href="#"
                               target="_blank">NangLuongXanhTech</a>

                        </p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</footer>

<a class="zalo-icon" href="https://zalo.me/0905211689">
    <img src="{{asset('storage/img/zalo.png')}}" alt="Zalo" width="40px" height="40px">
</a>
<a href="tel:0905211689" class="pps-btn-img">
    <div class="phone2-icon">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
                <i style="color:#fff;font-size:20px;" class="fas fa-mobile-alt"></i>
            </div>
        </div>
    </div>
</a>

<div class="footer-mobile">

    <ul class="menu--footer">
        <li style="width: 100%;">

            <div class="humberger__open2"
                 style="color: #249bc8 !important; top: -20px !important;left: 10px;font-size: 16px;width: 100% !important;line-height: 22px;">
                <i class="fa fa-bars"></i>
                <br>
                <span style="color: #000;">Danh mục</span>
            </div>

        </li>
        <li style="width: 100%;">
            <a class="d-flex justify-content-center flex-column" style="transform: translateX(5px) !important;"
               href="https://zalo.me/0905211689">
                <img class="lazyload entered loaded"
                     data-src="https://tivatech.b-cdn.net/icons/widget_icon_zalo.svg" alt="zalo" style="height: 25px"
                     data-ll-status="loaded" src="https://tivatech.b-cdn.net/icons/widget_icon_zalo.svg">
                <span class="text-capitalize">zalo</span>
            </a>
        </li>

        <li style="width: 100%;">
            <a class="" style="color:red" href="tel:0905.211.689">
                <i class="fa-solid fa-phone"></i><br>
                <span>0905.211.689</span>
            </a>
        </li>
    </ul>
</div>

</div>

