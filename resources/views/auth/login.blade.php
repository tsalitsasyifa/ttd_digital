@extends('layouts.layout')

@section('title')
    Login || Sistem Ekspedisi Digital BPKD Kota Pematangsiantar
@endsection

@section('content')
    <div class="hpanel">
        <div class="panel-body">
            <h2 style="text-align: center;">Login</h2>
            <hr>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="control-label">{{ __('E-Mail :') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">{{ __('Password :') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-block loginbtn">
                    {{ __('Masuk') }}
                </button>
            </form>
            <hr>
            <br>
        </div>
    </div>
@endsection
