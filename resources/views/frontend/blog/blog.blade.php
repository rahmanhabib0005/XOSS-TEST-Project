@extends('frontend.master')
@section('content')
    <!-- service section -->

    <div class="body_bg layout_padding">
        <section class="service_section ">
            <div class="container">
                <div class="heading_container">
                    <h2>
                        Blogs
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
                <div class="d-flex justify-content-center mt-3">
                    {{ $posts->links() }}
                </div>
            </div>
    </div>
    </section>
    </div>
    <!-- end service section -->
@endsection

