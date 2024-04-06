@extends('frontend.master')
@section('slider')
    <!-- slider section -->
    <section class=" slider_section position-relative">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="detail-box">
                                    <div>
                                        <h1>
                                            Welcome To <br>
                                            <span>
                                                Blog Writing Services
                                            </span>
                                        </h1>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable
                                            content of a page
                                            when looking
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="detail-box">
                                    <div>
                                        <h1>
                                            Welcome To <br>
                                            <span>
                                                Content Writing Services
                                            </span>
                                        </h1>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable
                                            content of a page
                                            when looking
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom_carousel-control">
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!-- end slider section -->
@endsection

@section('content')
    <div class="body_bg layout_padding">

        <!-- service section -->

        <section class="service_section ">
            <div class="container">
                <div class="heading_container">
                    <h2>
                        Latest Blogs
                    </h2>
                </div>
            </div>
            <div class="container">
                <div class="row">

                    @forelse ($posts as $item)
                        <div class="col-md-6">
                            <div class="box align-items-end align-items-md-start text-right text-md-left">
                                <div class="img-box" style="width: 350px; height:200px">
                                    <img height="200" src="{{ $item->image ? asset($item->image) : "https://placehold.co/600x400"}}" alt="">
                                </div>
                                <h4>
                                    {{ $item->title }}
                                </h4>
                                <a href="{{ route('blog_details', $item->id) }}">
                                    Read More
                                </a>
                            </div>
                        </div>
                    @empty
                        <h4 class="text-center mx-auto">No Records Found</h4>
                    @endforelse

                </div>
            </div>
        </section>

        <!-- end service section -->





        <!-- client section -->

        <section class="client_section layout_padding-top">
            <div class="d-flex justify-content-center">
                <div class="heading_container">
                    <h2>
                        Testimonial
                    </h2>
                </div>
            </div>
            <div class="container layout_padding2">
                <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
                        <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item ">
                            <div class="client_container">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/assets/images/client.jpg') }}" alt="">
                                    </div>
                                    <div class="client_name">
                                        <div>
                                            <h3>
                                                Johndue
                                            </h3>
                                            <p>
                                                Farm & CO
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="client_detail">
                                    <div class="client_text">
                                        <blockquote>
                                            <p>
                                                ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                                ullamco laboris nisi ut
                                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                                voluptate velit
                                            </p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <div class="client_container">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/assets/images/client.jpg') }}" alt="">
                                    </div>
                                    <div class="client_name">
                                        <div>
                                            <h3>
                                                Johndue
                                            </h3>
                                            <p>
                                                Farm & CO
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="client_detail">
                                    <div class="client_text">
                                        <blockquote>
                                            <p>
                                                ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                                ullamco laboris nisi ut
                                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                                voluptate velit
                                            </p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="client_container">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/assets/images/client.jpg') }}" alt="">
                                    </div>
                                    <div class="client_name">
                                        <div>
                                            <h3>
                                                Johndue
                                            </h3>
                                            <p>
                                                Farm & CO
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="client_detail">
                                    <div class="client_text">
                                        <blockquote>
                                            <p>
                                                ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                                ullamco laboris nisi ut
                                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                                voluptate velit
                                            </p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!-- end client section -->

    </div>
@endsection
