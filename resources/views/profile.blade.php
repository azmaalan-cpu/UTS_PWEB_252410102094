
@extends('layouts.app')

@section('title', 'Profil')

@section('content')

@include('partials.page-heading', [
    'heading' => 'Profil Pengguna',
    'description' => 'Informasi akun yang sedang digunakan.'
])

<div class="profile-card">

<div class="profile-avatar">
    <img
        src="{{ asset('images/mahasiswa/' . ($pengguna['foto'] ?? 'default.png')) }}"
        alt="Foto {{ $username }}"
    >
</div>

    <div class="profile-details">

        <div class="detail-item">
            <span>Nama</span>
            <strong>{{ $pengguna['nama'] }}</strong>
        </div>

        <div class="detail-item">
            <span>NIM</span>
            <strong>{{ $pengguna['nim'] }}</strong>
        </div>

        <div class="detail-item">
            <span>Program Studi</span>
            <strong>{{ $pengguna['program_studi'] }}</strong>
        </div>

        <div class="detail-item">
            <span>Semester</span>
            <strong>{{ $pengguna['semester'] }}</strong>
        </div>

    </div>

    <a href="{{ route('dashboard') }}"
       class="btn-secondary">
        ← Kembali ke Dashboard
    </a>

</div>

@endsection
