@extends('layouts.auth')

@section('content')
<div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-3">
            <label for="usu_email" class="col-md-4 col-form-label text-md-end">{{ __('Endereço de E-mail') }}</label>

            <div class="col-md-8">
                <input id="usu_email" type="email" class="form-control @error('usu_email') is-invalid @enderror" name="usu_email" value="{{ old('usu_email') }}" required autocomplete="email" autofocus placeholder="seu@email.com">

                @error('usu_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>

            <div class="col-md-8">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Sua senha">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-8 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Lembrar de mim') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Entrar') }}
                </button>

                @if (Route::has('password.request'))
                    <div class="text-center mt-3">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    </div>
                @endif

                @if (Route::has('register'))
                    <hr style="border-color: #2c4e69;">
                    <div class="text-center mt-3">
                        <p class="text-muted mb-0">Não tem uma conta?</p>
                        <a class="btn btn-link p-0" href="{{ route('register') }}">
                            {{ __('Cadastre-se agora') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection
