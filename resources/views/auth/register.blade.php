@extends('layouts.auth')

@section('content')
<div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="usu_nome" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-8">
                <input id="usu_nome" type="text" class="form-control @error('usu_nome') is-invalid @enderror" name="usu_nome" value="{{ old('usu_nome') }}" required autocomplete="name" autofocus placeholder="Seu nome completo">

                @error('usu_nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="usu_email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-8">
                <input id="usu_email" type="email" class="form-control @error('usu_email') is-invalid @enderror" name="usu_email" value="{{ old('usu_email') }}" required autocomplete="email" placeholder="seu@email.com">

                @error('usu_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="usu_senha" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-8">
                <input id="usu_senha" type="password" class="form-control @error('usu_senha') is-invalid @enderror" name="usu_senha" required autocomplete="new-password" placeholder="Sua senha">

                @error('usu_senha')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="usu_senha-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-8">
                <input id="usu_senha-confirm" type="password" class="form-control" name="usu_senha_confirmation" required autocomplete="new-password" placeholder="Confirme sua senha">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-person-plus me-2"></i>{{ __('Register') }}
                </button>

                <div class="text-center mt-3">
                    <p class="text-muted">
                        {{ __('Already have an account?') }}
                        <a href="{{ route('login') }}" class="btn btn-link p-0">{{ __('Login') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
