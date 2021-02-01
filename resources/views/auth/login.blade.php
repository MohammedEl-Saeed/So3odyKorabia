@extends('auth.base')
@section('title' , 'تسجيل الدخول')
@section('content')
<div class="sign-in-from">
    <h1 class="mb-0">تسجيل الدخول</h1>
    @if(session()->has('error'))
        <div class="alert text-white bg-danger" role="alert">
            <div class="iq-alert-text">
                {{session()->get('error')}}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            x
            </button>
        </div>
    @endif
    <form class="mt-4" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">البريد الالكتروني</label>
            <input type="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="البريد الالكتروني" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">كلمة المرور</label>
            @if (Route::has('password.request'))
                <a class="float-right" href="{{ route('password.request') }}">
                    نسيت كلمة المرور
                </a>
            @endif
            <input type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="كلمة المرور" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="d-inline-block w-100">
            <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                <input type="checkbox" {{ old('remember') ? 'checked' : '' }} name="remember"  class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">تذكرني</label>
            </div>
            <button type="submit" class="btn btn-primary float-right">تسجيل الدخول</button>
        </div>
        {{-- <div class="sign-info">
            <span class="dark-color d-inline-block line-height-2">Don't have an account?
                <a href="#">Sign up</a></span>

        </div> --}}
    </form>
</div>
@endsection
