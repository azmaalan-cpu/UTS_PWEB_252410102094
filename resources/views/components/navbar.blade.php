
@php
    $pengguna = session('mahasiswa_login');
    $username = $pengguna['nama'] ?? 'Pengguna';
@endphp

<header class="navbar">

    <a href="{{ $pengguna ? route('dashboard') : route('login') }}"
       class="brand">
        <span class="brand-icon">R</span>
        <span>RuangKampus</span>
    </a>

    @if ($pengguna)

        <nav class="nav-menu">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('profile') }}">Profil</a>
            <a href="{{ route('pengelolaan') }}">Data Mahasiswa</a>
        </nav>

        <details class="profile-dropdown">

            <summary class="profile-trigger">

   <img
    src="{{ asset('images/mahasiswa/' . ($pengguna['foto'] ?? 'default.jpg')) }}"
    alt="Foto {{ $username }}"
    class="navbar-avatar"
>

>


                <span>{{ $username }}</span>

                <span class="dropdown-arrow">⌄</span>

            </summary>

            <div class="dropdown-menu">

                <div class="dropdown-user">

          <img
            src="{{ asset('images/mahasiswa/' . ($pengguna['foto'] ?? 'default.jpg')) }}"
            alt="Foto {{ $username }}"
            class="dropdown-avatar"

        >

>
                    <div>
                        <strong>{{ $pengguna['nama'] }}</strong>
                        <small>{{ $pengguna['nim'] }}</small>
                    </div>

                </div>

                <div class="dropdown-divider"></div>

                <a href="{{ route('profile') }}"
                   class="dropdown-item">
                    <span>👤</span>
                    Profil Saya
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="dropdown-item logout-item">
                        <span>↪</span>
                        Keluar
                    </button>
                </form>

            </div>

        </details>

    @endif

</header>
