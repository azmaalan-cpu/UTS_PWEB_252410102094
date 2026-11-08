
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('partials.page-heading', [
    'eyebrow' => 'RUANGKAMPUS / DASHBOARD',
    'heading' => 'Halo, ' . $username . '! 👋',
    'description' => 'Selamat datang di pusat pengelolaan data mahasiswa.'
])

<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon purple">👥</div>
        <p>Total Mahasiswa</p>
        <h2>{{ $totalMahasiswa }}</h2>
        <span>Data mahasiswa terdaftar</span>
    </div>

    <div class="stat-card">
        <div class="stat-icon blue">🎓</div>
        <p>Program Studi</p>
        <h2>{{ $totalProdi }}</h2>
        <span>Program studi tersedia</span>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">✓</div>
        <p>Mahasiswa Aktif</p>
        <h2>{{ $totalAktif }}</h2>
        <span>Mahasiswa berstatus aktif</span>
    </div>

</div>

<div class="content-card">

    <span class="eyebrow">INFORMASI</span>

    <h2>Selamat Datang di RuangKampus</h2>

    <p>
        Ruang Kampus merupakan website sederhana
        untuk menampilkan informasi dan pengelolaan
        data mahasiswa secara terstruktur.
    </p>

<a href="{{ route('pengelolaan') }}"
   class="btn-primary inline-button">
   Lihat Data Mahasiswa →
</a>

</div>

@endsection
