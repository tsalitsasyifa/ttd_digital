@extends('layouts.layout')

@section('title')
    Login || Sistem Pelacakan Dokumen dengan Tanda Tangan Digital
@endsection

@section('content')
    <div class="hpanel">
        <div class="panel-body">
            <h2 style="text-align: center;">Login</h2>
            <hr>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="username" class="control-label">{{ __('Username :') }}</label>
                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
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
