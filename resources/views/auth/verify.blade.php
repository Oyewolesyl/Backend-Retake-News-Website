@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="auth-card">
                <div class="auth-header">
                    <h2><i class="fas fa-envelope-open me-3"></i>{{ __('Verify Your Email') }}</h2>
                    <p class="text-muted mb-0">Check your inbox</p>
                </div>
                
                <div class="auth-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <div class="verification-icon mb-4">
                        <i class="fas fa-envelope-open-text text-primary" style="font-size: 4rem;"></i>
                    </div>

                    <h4 class="mb-3">Almost there!</h4>
                    
                    <p class="text-muted mb-4">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        We've sent a verification email to help secure your account.
                    </p>

                    <div class="verification-actions">
                        <p class="mb-3">{{ __('If you did not receive the email') }}:</p>
                        
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fas fa-paper-plane me-2"></i>{{ __('Resend Verification Email') }}
                            </button>
                        </form>
                    </div>

                    <hr class="my-4">
                    
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            <i class="fas fa-arrow-left me-2"></i>Back to Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.auth-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-top: 2rem;
}

.auth-header {
    background: linear-gradient(135deg, #dc3545, #c82333);
    color: white;
    padding: 2rem;
    text-align: center;
}

.auth-header h2 {
    margin-bottom: 0.5rem;
    font-family: 'Playfair Display', serif;
}

.auth-body {
    padding: 2rem;
}

.verification-icon {
    padding: 1rem;
    background: rgba(220, 53, 69, 0.1);
    border-radius: 50%;
    display: inline-block;
}

.btn-outline-primary {
    border-color: #dc3545;
    color: #dc3545;
    border-radius: 8px;
    padding: 12px 20px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background: #dc3545;
    border-color: #dc3545;
    transform: translateY(-2px);
}
</style>
@endsection