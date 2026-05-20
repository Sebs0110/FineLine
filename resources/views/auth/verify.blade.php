@extends('layouts.auth')

@section('content')
<div class="card-header">{{ __('Verify Your Email Address') }}</div>

<div class="card-body">
    @if (session('resent'))
        <div class="alert alert-success" role="alert" style="background-color: #1a5a3a; border-color: #2d8659; color: #7dd3c0;">
            <i class="bi bi-check-circle me-2"></i>{{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <p style="color: #b8c5d6;">
        {{ __('Before proceeding, please check your email for a verification link.') }}
    </p>
    <p style="color: #b8c5d6;">
        {{ __('If you did not receive the email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
        </form>
    </p>
</div>
@endsection
