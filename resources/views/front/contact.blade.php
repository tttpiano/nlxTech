@extends('front.layouts.master')
@section('main-container')

<div class="container text-center" style="color: black; margin-top: 70px; font-size: 50px; font-weight: 600;">Liên Hệ</div>
    <!-- Breadcrumb Section Begin -->
    
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Điện Thoại</h4>
                        <p>0.123.321.123</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa Chỉ</h4>
                        <p>Tầng 17, Opal Bourevard, An Bình, Dĩ An, Bình Dương</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>nangluongxanhtech@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.242097509037!2d106.75973137475312!3d10.869182089285259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175276bad1f39d1%3A0x36ee913e6f58e296!2sChung%20c%C6%B0%20Opal%20Boulevard!5e0!3m2!1svi!2s!4v1688519059486!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        
    </div>
    
@endsection