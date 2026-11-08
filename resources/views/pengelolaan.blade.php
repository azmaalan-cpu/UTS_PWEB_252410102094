@extends('layouts.app')

@section('title', 'Pengelolaan Mahasiswa')

@section('content')

<div class="page-header">
    <div>
        <span class="eyebrow">RUANGKAMPUS / DATA</span>

        <h1>Pengelolaan Data Mahasiswa</h1>

        <p>
            Informasi daftar mahasiswa yang tersedia
            dalam sistem RuangKampus.
        </p>
    </div>
</div>

<div class="content-card">

    <div class="table-heading">
        <div>
            <h2>Daftar Mahasiswa</h2>
            <p>Total {{ count($mahasiswa) }} data mahasiswa</p>
        </div>

        <span class="data-label">Data Contoh</span>
    </div>

    <div class="table-responsive">

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th>Semester</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($mahasiswa as $index => $item)

                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $item['nim'] }}</td>

                        <td>{{ $item['nama'] }}</td>

                        <td>{{ $item['program_studi'] }}</td>

                        <td>{{ $item['semester'] }}</td>

                        <td>
                            <span class="status-badge
                                {{ $item['status'] === 'Aktif' ? 'active' : 'inactive' }}">
                                {{ $item['status'] }}
                            </span>
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>

    </div>

    <p class="table-note">
        * Dalam tahap pengembangan, data mahasiswa yang ditampilkan
    </p>

</div>

@endsection
