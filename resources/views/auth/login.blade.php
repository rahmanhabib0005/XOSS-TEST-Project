@extends('auth.authMaster')
@section('authencication')
<form action="{{route('login')}}" method="POST">
     @csrf
     <div class="logo">
       <span class="material-icons-outlined mt-3 fs-1 text-primary fw-bold">mood</span><br>
       <h3 class="text-primary">XOSS Blogs</h3>
     </div>
     <div class="tounded bg-white shadow p-5">
       <h3 class="text-dark fw-bolder fs04 mb-2">Sign In </h3>
       <div id="text" class="fw-normal text-muted mb-4">
         New Here?
         <a href="{{route('register')}}"  class="text-primary fw-bold text-decoration-none cursor-pointer">Create an Account</a>
       </div>
     
     <div class="form-floating mb-3">
       <input
         type="email"
         class="form-control"
         name="email"
         id="floatingInput"
         placeholder="name@example.com"
       />
       <label for="floatingInput">Email address</label>
       @error('email')
           <span class="text-danger" id="erremail">{{$message}}</span>
       @enderror
     </div>
     <div class="form-floating">
       <input
         type="password"
         class="form-control"
         id="floatingPassword"
         name="password"
         placeholder="Password"
       />
       <label for="floatingPassword">Password</label>
       @error('password')
           <span class="text-danger" id="errpassword">{{$message}}</span>
       @enderror
     </div>
     <button
       type="submit"
       class="btn btn-primary submit_btn w-100 my-4">
       Continue
     </button>
     </div>
   </form>
@endsection