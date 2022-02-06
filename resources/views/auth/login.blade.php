@extends('layouts.front')

@section('title')
    E-store
@endsection

@section('content')
<section class="register section" id="register">
    <div class="container login-container bd-grid">
        <img src="{{asset('frontend/img/login.png')}}" alt="" class="login-form-img">
        
        
        <div class="login-data">
            <h2 class="login-title section-title">Log in</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-form">
                    <div class="input-group">
                        <span class="input-group-text" id="addon-wrapping"><i class="far fa-envelope"></i></span>
                        <input type="text" id="email"
                        class="login-form-control form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" 
                        autofocus placeholder="Your Email" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="login-form">
                    <div class="input-group">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-unlock"></i></span>
                        <input type="password" id="password"
                        class="login-form-control form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password"
                        autofocus placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="login-form">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" 
                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="login-form">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="forget-password btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        @endif
                    </div>
                </div>
            </form>
            
            </div>
        </div>

    </div>
</section>
@endsection