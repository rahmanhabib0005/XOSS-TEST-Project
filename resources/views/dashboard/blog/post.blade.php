@extends('dashboard.master')
@section('content')
    <div class="main-title">
        <h2>Blogs</h2>
    </div>


    <style>
        .switch {
            display: inline-block;
            height: 22px;
            position: relative;
            width: 48px;
        }

        .switch input {
            display: none;
        }

        .slider {
            background-color: #ccc;
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transition: .4s;
        }

        .slider:before {
            background-color: #fff;
            bottom: 4px;
            content: "";
            height: 15px;
            left: 4px;
            position: absolute;
            transition: .4s;
            width: 15px;
        }

        input:checked+.slider {
            background-color: #143ed6;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .spinner {
            position: absolute;
            z-index: 1;
            margin-left: 22px;
            margin-top: 2px;
        }

        .card:first-child {
            background-color:transparent;
        }
    </style>
    <div class="col-lg-12 grid-margin stretch-card my-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Members</h4>
                <span style="0.75rem">
                    <a href="{{ route('user.post.create') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i>
                    </a>
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Title</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <img width="40px" height="30px" src="{{$item->image ? asset($item->image) : "https://placehold.co/400"}}" alt="">
                                    </td>
                                    <td>
                                        <span
                                            class="label label-pill {{ $item->published_at == 1 ? 'label-success' : 'label-danger' }}">{{ $item->published_at == 1 ? 'Published' : 'Draft' }}</span>
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('user.post.edit', $item->id) }}"
                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                    class="fa fa-pencil"></i>
                                            </a>


                                            <form method="POST" action="{{ route('user.post.destroy', $item->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-danger shadow btn-xs sharp show_confirm"
                                                    data-toggle="tooltip" title='Delete'><i
                                                        class="fa fa-trash"></i></button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
