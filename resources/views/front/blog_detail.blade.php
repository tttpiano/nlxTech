@extends('front.layouts.master')
@section('main-container')
    <div>
        <div  class="container text-center">
            <h4 style="margin-top: 70px; font-size: 50px; font-weight: 600;">Bài Viết</h4>
        </div>
    </div>

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>

                        <div class="blog__sidebar__item">
                            <h4>Tin Liên Quan</h4>
                            <div class="blog__sidebar__recent">
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/blog/sidebar/sr-1.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>09 Kinds Of Vegetables<br /> Protect The Liver</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/blog/sidebar/sr-2.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>Tips You To Balance<br /> Nutrition Meal Day</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/blog/sidebar/sr-3.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>4 Principles Help You Lose <br />Weight With Vegetables</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-8 col-md-7 order-md-1 order-1">

                    <div class="blog__details__text">
                        <img src="" alt="">

                        </p>
                        <h3> {{ $post -> title }} </h3>
                        <p>
                            {!! $post -> content !!}
                        </p>
                    </div>

                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__text">
                                        <h6>By System {{$post->author}} on {{$post->formattedCreatedAt}}</h6>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="col-lg-6">--}}
{{--                                <div class="blog__details__widget">--}}
{{--                                    <ul>--}}
{{--                                        <li><span>Categories:</span> Food</li>--}}
{{--                                        <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="blog__details__social">--}}
{{--                                        <a href="#"><i class="fa fa-facebook"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-twitter"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-google-plus"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-linkedin"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-envelope"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->


@endsection
