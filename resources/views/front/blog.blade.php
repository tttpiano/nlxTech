@extends('front.layouts.master')
@section('main-container')

    <div class="container text-center" style="color: black; margin-top: 70px; font-size: 50px; font-weight: 600;">Tin Tức</div>
    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tin Mới</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($latestPost as $l)
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{ asset('images/' . $l->image->file_name) }}" style="width: 70px;height: 70px;object-fit: cover" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$l -> title}}</h6>
                                        <span>{{$l -> formattedCreatedAt}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                @if ($post->image)
                                <div class="blog__item__pic">
                                    <img src="{{ asset('images/' . $post->image->file_name) }}" width="400" height="300" alt="">
                                </div>
                                @else
                                    <div class="blog__item__pic">
                                        <img src="{{ asset('storage/img/error.jpg')}}" alt="">
                                    </div>
                                @endif
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>{{$post->formattedCreatedAt}}</li>
                                    </ul>
                                    <h5><a href="{{route('posts.show', $post->url_seo)}}">
                                            {{$post->title}} </a></h5>
                                    <p>{{$post->description}}</p>
                                    <a href="{{route('posts.show', $post->url_seo)}}" class="blog__btn">READ MORE <span
                                            class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
