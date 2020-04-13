@extends('layouts.app', ['title' => 'login'])

@section('content')
<div class="row w-100 h-100 m-0">
    <div class="col-6 my-auto">
        <form class="offset-md-4" method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Login</h1>
            <div class="form-group row ">

                <div class="col-md-6">
                    <input id="username" type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link py-0" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    <a class="btn btn-info" href="{{ route('register') }}">
                        {{ __('No account yet? ') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-6 p-0 d-xs">
        <div id="plant-image"></div>
    </div>
</div>
@endsection
