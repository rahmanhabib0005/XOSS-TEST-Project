@extends('frontend.master')
@section('content')
    <!-- service section -->

    <div class="body_bg layout_padding">
        <section class="service_section">
            <div class="container">
                <div class="heading_container">
                    <img src="{{$blog->image ? asset($blog->image) : "https://placehold.co/600x400"}}" alt="" class="w-100" height="350">
                </div>
                <div class="my-3">
                    <h2 class="text-center">{{ $blog->title }}</h2>
                    {!! $blog->content !!}
                </div>
            </div>
        </section>

        <section class="service_section">
            <div class="heading_container mt-3">
                <h4>
                    All comments
                </h4>
            </div>
            <div class="container">
                @if (count($blog->comments) > 0)
                    @foreach ($blog->comments as $item)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h6 class="text-left">No comment found!</h6>
                @endif
            </div>
        </section>

        <!-- contact section -->
        <section class="contact_section">
            <div class="heading_container mt-3">
                <h4>
                    Leave a comment
                </h4>
            </div>
            <div class="container contact_bg layout_padding2-top">

                <div class="row">
                    <div class="col-md-6">
                        <div class="contact_form ">
                            <form action="{{ route('comment.post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $blog->id }}">
                                <input type="text" name="name" placeholder="Name ">
                                <input type="email" name="email" placeholder="Email">
                                <input type="text" name="comment" placeholder="Comment" class="message_input">
                                <button>
                                    Send
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-box">
                            <img src="{{ asset('frontend/assets/images/contact-img.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end contact section -->
    </div>
@endsection


