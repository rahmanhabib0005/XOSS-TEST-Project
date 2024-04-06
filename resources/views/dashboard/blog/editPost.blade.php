@extends('dashboard.master')
@section('content')
    <div class="main-title">
        <h2>Add Blog</h2>
    </div>


    <div class="container ">
        <form action="{{ route('user.post.update',$post->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="" value="{{$post->title}}"
                    placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" name="content" id="summernote" rows="3">{!! $post->content !!}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Choose file</label>
                    <input
                        type="file"
                        class="form-control"
                        name="image"
                        id="image"
                        value="{{$post->image}}"
                        placeholder=""
                        aria-describedby=""
                    />
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="published_at" type="checkbox" {{$post->published_at == 1 ?'checked' : ''}} value="1" role="switch"
                            id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Publication Status</label>
                    </div>
                </div>


                <div class="col-md-4">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Submit
                    </button>
                </div>

            </div>
        </form>

    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endpush
