@extends('layouts.front')

@section('content')

<section class="register section" id="register">
    <div class="container register-container bd-grid">
        <img src="{{asset('frontend/img/login.png')}}" alt="" class="register-form-img">
        
        
        <div class="register-data">
            <h2 class="register-title section-title">Log in</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="register-form">
                    <div class="input-group">
                        <span class="input-group-text" id="addon-wrapping"><i class="far fa-envelope"></i></span>
                        <input type="text" id="name"
                        class="register-form-control form-control @error('name') is-invalid @enderror" 
                        name="name" value="{{ old('name') }}" required autocomplete="name" 
                        autofocus placeholder="Your Name" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="register-form">
                    <div class="input-group">
                        <span class="input-group-text" id="addon-wrapping"><i class="far fa-envelope"></i></span>
                        <input type="text" id="email"
                        class="register-form-control form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" 
                        autofocus placeholder="Your Email" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="register-form">
                    <div class="input-group">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-unlock"></i></span>
                        <input type="password" id="password"
                        class="register-form-control form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password"
                        autofocus placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="register-form">
                    <div class="input-group">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-unlock"></i></span>
                        <input type="password" id="password-confirm"
                        class="register-form-control form-control @error('password') is-invalid @enderror"
                        name="password_confirmation" required autocomplete="new-password"
                        autofocus placeholder="Confirm Password" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                </div>

                <div class="register-form">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            {{ __('register') }}
                        </button>
                    </div>
                </div>
            </form>
            
            </div>
        </div>

    </div>
</section>

@endsection
