<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('login');
    }

    // Memproses login menggunakan NIM
    public function processLogin(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|string',
        ]);

        // Mencari mahasiswa berdasarkan NIM
        $mahasiswa = collect($this->dataMahasiswa())
            ->firstWhere('nim', trim($data['nim']));

        // Jika NIM tidak ditemukan
        if (!$mahasiswa) {
            return back()
                ->withInput()
                ->withErrors([
                    'nim' => 'NIM tidak ditemukan. Silakan periksa kembali.'
                ]);
        }

        // Menyimpan identitas mahasiswa ke session
        session([
            'mahasiswa_login' => $mahasiswa
        ]);

        return redirect()->route('dashboard');
    }

    // Mengambil data pengguna yang sedang login
    private function penggunaLogin()
    {
        return session('mahasiswa_login');
    }

    // Menampilkan dashboard
    public function dashboard()
    {
        $pengguna = $this->penggunaLogin();

        if (!$pengguna) {
            return redirect()->route('login');
        }

        $username = $pengguna['nama'];

        $mahasiswa = $this->dataMahasiswa();

        $totalMahasiswa = count($mahasiswa);

        $totalProdi = count(array_unique(
            array_column($mahasiswa, 'program_studi')
        ));

        $totalAktif = count(array_filter(
            $mahasiswa,
            fn($item) => $item['status'] === 'Aktif'
        ));

        return view('dashboard', compact(
            'username',
            'pengguna',
            'totalMahasiswa',
            'totalProdi',
            'totalAktif'
        ));
    }

    // Menampilkan halaman profil
    public function profile()
    {
        $pengguna = $this->penggunaLogin();

        if (!$pengguna) {
            return redirect()->route('login');
        }

        $username = $pengguna['nama'];

        return view('profile', compact(
            'username',
            'pengguna'
        ));
    }

    // Menampilkan pengelolaan mahasiswa
    public function pengelolaan()
    {
        $pengguna = $this->penggunaLogin();

        if (!$pengguna) {
            return redirect()->route('login');
        }

        $username = $pengguna['nama'];

        $mahasiswa = $this->dataMahasiswa();

        return view('pengelolaan', compact(
            'username',
            'pengguna',
            'mahasiswa'
        ));
    }

    // Data mahasiswa
    private function dataMahasiswa()
    {
        return [
            [
                'nim' => '262410101001',
                'nama' => 'Wildan Prasetyo',
                'program_studi' => 'Teknologi Informasi',
                'semester' => 3,
                'status' => 'Aktif',
                'foto' => '262410101001.png'
            ],
            [
                'nim' => '252410101002',
                'nama' => 'Abdan Zidny Saputra',
                'program_studi' => 'Sistem Informasi',
                'semester' => 3,
                'status' => 'Aktif',
                'foto' => 'default.jpg'
            ],
            [
                'nim' => '242410101003',
                'nama' => 'Budi Santoso',
                'program_studi' => 'Teknologi Informasi',
                'semester' => 5,
                'status' => 'Aktif',
                'foto' => 'default.jpg'
            ],
            [
                'nim' => '222410101004',
                'nama' => 'Dewi Lestari',
                'program_studi' => 'Informatika',
                'semester' => 3,
                'status' => 'Cuti',
                'foto' => 'default.jpg'
            ],
            [
                'nim' => '232410101005',
                'nama' => 'Rizky Maulana',
                'program_studi' => 'Sistem Informasi',
                'semester' => 5,
                'status' => 'Aktif',
                'foto' => 'default.jpg'
            ],
        ];
    }
}
