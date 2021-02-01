@extends('auth.base')
@section('title' , 'تعديل كلمة المرور')
@section('content')
<div class="sign-in-from">
    <h1 class="mb-0">تعديل كلمة المرور</h1>
    @if(session()->has('status'))
        <div class="alert text-white bg-danger" role="alert">
            <div class="iq-alert-text">
                {{session()->get('status')}}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            x
            </button>
        </div>
    @endif
    @error('email')
        <div class="alert text-white bg-danger" role="alert">
            <div class="iq-alert-text">
                {{$message}}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            x
            </button>
        </div>
        @enderror
        <form class="mt-4" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">البريد الالكتورني</label>
                <input id="email" type="email" class="form-control  mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary float-right">
                    تعديل كلمة المرور
                </button>
            </div>
        </form>
</div>

@endsection
