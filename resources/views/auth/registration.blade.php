@extends('auth.authMaster')
@section('authencication')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="logo">
            <span class="material-icons-outlined mt-3 fs-1 text-primary fw-bold">mood</span><br>
            <h3 class="text-primary">XOSS Blogs</h3>
        </div>
        <div class="tounded bg-white shadow p-5">
            <h3 class="text-dark fw-bolder fs04 mb-2">Sign Up </h3>
            <div class="fw-normal text-muted mb-4">
                Back to?
                <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none cursor-pointer">Login</a>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" name="name" placeholder="enter your name" />
                <label for="floatingName">Name</label>
                @error('name')
                    <span class="text-danger" id="errname">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email"
                    placeholder="name@example.com" />
                <label for="floatingInput">Email address</label>
                @error('email')
                    <span class="text-danger" id="erremail2">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" />
                <label for="floatingPassword">Password</label>
                @error('password')
                    <span class="text-danger" id="errpassword2">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingCPassword" name="password_confirmation"
                    placeholder="Password" />
                <label for="floatingCPassword">Confirm Password</label>
                @error('password_confirmation')
                    <span class="text-danger" id="errcpassword">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary submit_btn w-100 my-4">
                Continue
            </button>
        </div>
    </form>
@endsection
