@extends('auth.base')

@section('content')
<div class="sign-in-from">
    <h1 class="mb-0">تعديل كرمة المرور</h1>
    @if($errors->any())
    <div class="alert text-white bg-danger" role="alert">
        @foreach($errors->all() as $error)
            <div class="iq-alert-text">
                {{$error}}
            </div>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        x
        </button>
    </div>
    @endif
    <form class="mt-4" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email" >البريد الاكتروني</label>
            <input id="email" type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input id="password" type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control mb-0" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary pull-right">
                تغير كلمة المرور
            </button>
        </div>
    </form>
</div>
@endsection
