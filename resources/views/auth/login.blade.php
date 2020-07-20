@extends('master')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center login-box">
            <div class="col-lg-5 text-left">
                <h1 class="login-title pb-4">Prihlásenie</h1>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label m-0">Emailová adresa</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label m-0">Heslo</label>
                        <input id="password" type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Zapamätať prihlásenie') }}
                                </label>
                            </div>
                    </div>

                    <div class="col-lg-6 p-0">
                        <button type="submit" class="btn btn-custom mt-2 mb-2">Prihlásiť</button>
                    </div>


                    @if (Route::has('password.request'))
                        <a class="text-dark pt-2" href="{{ route('password.request') }}">
                            {{ __('Zabudnuté heslo?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection




