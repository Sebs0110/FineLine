@extends('layouts.auth')

@section('content')
<div class="card-header">{{ __('Reset Password') }}</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert" style="background-color: #1a5a3a; border-color: #2d8659; color: #7dd3c0;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-8">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="seu@email.com">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-envelope me-2"></i>{{ __('Send Password Reset Link') }}
                </button>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="btn btn-link">{{ __('Back to Login') }}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
