@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-block">
            <div class="card">
                <div class="card-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label class="email">{{ __('Email Address') }}</label>
                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                        <span class="help is-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="password">{{ __('Password') }}</label>
                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror"
                               name="password"
                               required autocomplete="current-password" autofocus>
                    </div>
                    @error('password')
                        <span class="help is-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="form-footer is-flex-direction-row is-justify-content-space-between">
                    <button type="submit" class="button is-dark">
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

            </form>
                </div>
            </div>
        </div>
    </div>
@endsection
