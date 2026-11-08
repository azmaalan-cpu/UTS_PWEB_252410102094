
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="login-wrapper">

    <div class="login-card">

        <div class="login-logo">R</div>

        <h1>Selamat Datang!</h1>

        <p class="subtitle">
            Masuk ke RuangKampus untuk mengelola
            informasi data mahasiswa.
        </p>

        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="nim">NIM</label>

                <input
                    type="text"
                    id="nim"
                    name="nim"
                    placeholder="Masukkan NIM"
                    value="{{ old('nim') }}"
                    required
                >

                @error('nim')
                    <small style="color: #b42318;">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <button type="submit" class="btn-primary">
                Login
            </button>

        </form>

        <p class="login-note">
            RuangKampus - Pengelolaan Data Mahasiswa
        </p>

    </div>

</div>

@endsection
