<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    public function showLogin(): View
    {
        return view('login');
    }

    public function prosesLogin(Request $request): RedirectResponse
    {
        $username = trim($request->input('username', ''));
        $password = $request->input('password', '');

        if ($username === '' && $password === '') {
            return back()
                ->with('error', 'Username dan password wajib diisi.')
                ->withInput(['username' => $username]);
        }

        if ($username === '') {
            return back()
                ->with('error', 'Username tidak boleh kosong.')
                ->withInput(['username' => $username]);
        }

        if ($password === '') {
            return back()
                ->with('error', 'Password tidak boleh kosong.')
                ->withInput(['username' => $username]);
        }

        if (strlen($password) < 6) {
            return back()
                ->with('error', 'Password minimal 6 karakter.')
                ->withInput(['username' => $username]);
        }

        $request->session()->put('username', $username);
        $request->session()->put('nama', ucfirst($username));
        $request->session()->put('role', 'User');

        return redirect('/dashboard');
    }

    public function showDashboard(Request $request): View|RedirectResponse
    {
        if (!$request->session()->has('username')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $statistik = [
            ['label' => 'Total Koleksi',   'nilai' => 248,  'ikon' => '👗', 'naik' => '+12%'],
            ['label' => 'Kategori',        'nilai' => 8,    'ikon' => '🏷️', 'naik' => '+2%'],
            ['label' => 'Terjual Bulan Ini','nilai' => 134, 'ikon' => '🛍️', 'naik' => '+23%'],
            ['label' => 'Brand Partner',   'nilai' => 15,   'ikon' => '✨', 'naik' => '+5%'],
        ];

        $terlaris = [
            ['nama' => 'Oversized Linen Blazer',   'terjual' => 89, 'persen' => 89],
            ['nama' => 'Floral Midi Dress',         'terjual' => 76, 'persen' => 76],
            ['nama' => 'Pleated Wide-Leg Trousers', 'terjual' => 64, 'persen' => 64],
            ['nama' => 'Knit Cardigan Cream',       'terjual' => 51, 'persen' => 51],
            ['nama' => 'Leather Tote Bag',          'terjual' => 43, 'persen' => 43],
        ];

        return view('dashboard', [
            'username'  => $request->session()->get('username'),
            'nama'      => $request->session()->get('nama'),
            'statistik' => $statistik,
            'terlaris'  => $terlaris,
        ]);
    }

    public function showProfil(Request $request): View|RedirectResponse
    {
        if (!$request->session()->has('username')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $profil = [
            'username'  => $request->session()->get('username'),
            'nama'      => $request->session()->get('nama'),
            'email'     => $request->session()->get('username') . '@velora.id',
            'role'      => $request->session()->get('role'),
            'bergabung' => 'Maret 2023',
            'status'    => 'Aktif',
            'bio'       => 'Passionate tentang dunia fashion dan tren terkini. Berkomitmen menghadirkan koleksi terbaik untuk setiap musim.',
        ];

        $aktivitas = [
            ['aksi' => 'Menambahkan koleksi Summer 2025',     'waktu' => '2 jam lalu'],
            ['aksi' => 'Update stok Floral Midi Dress',        'waktu' => '1 hari lalu'],
            ['aksi' => 'Approve brand partnership Zara Local', 'waktu' => '3 hari lalu'],
            ['aksi' => 'Upload lookbook Autumn Collection',    'waktu' => '1 minggu lalu'],
        ];

        return view('profil', [
            'username'  => $request->session()->get('username'),
            'profil'    => $profil,
            'aktivitas' => $aktivitas,
        ]);
    }

    public function showPengelolaan(Request $request): View|RedirectResponse
    {
        if (!$request->session()->has('username')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $koleksi = [
            ['id' => 1,  'nama' => 'Oversized Linen Blazer',    'kategori' => 'Outerwear',   'ukuran' => 'S/M/L/XL', 'harga' => 850000,  'stok' => 24, 'status' => 'Tersedia', 'tag' => 'New'],
            ['id' => 2,  'nama' => 'Floral Midi Dress',          'kategori' => 'Dress',       'ukuran' => 'XS/S/M/L', 'harga' => 620000,  'stok' => 18, 'status' => 'Tersedia', 'tag' => 'Bestseller'],
            ['id' => 3,  'nama' => 'Pleated Wide-Leg Trousers',  'kategori' => 'Bottoms',     'ukuran' => 'S/M/L',    'harga' => 480000,  'stok' => 0,  'status' => 'Habis',    'tag' => ''],
            ['id' => 4,  'nama' => 'Knit Cardigan Cream',        'kategori' => 'Tops',        'ukuran' => 'S/M/L/XL', 'harga' => 390000,  'stok' => 35, 'status' => 'Tersedia', 'tag' => ''],
            ['id' => 5,  'nama' => 'Leather Tote Bag',           'kategori' => 'Accessories', 'ukuran' => 'One Size',  'harga' => 1250000, 'stok' => 9,  'status' => 'Tersedia', 'tag' => 'Premium'],
            ['id' => 6,  'nama' => 'Wrap Satin Skirt',           'kategori' => 'Bottoms',     'ukuran' => 'XS/S/M',   'harga' => 420000,  'stok' => 0,  'status' => 'Habis',    'tag' => ''],
            ['id' => 7,  'nama' => 'Structured Shoulder Bag',    'kategori' => 'Accessories', 'ukuran' => 'One Size',  'harga' => 980000,  'stok' => 14, 'status' => 'Tersedia', 'tag' => 'New'],
            ['id' => 8,  'nama' => 'Ribbed Crop Tank',           'kategori' => 'Tops',        'ukuran' => 'XS/S/M/L', 'harga' => 220000,  'stok' => 50, 'status' => 'Tersedia', 'tag' => ''],
            ['id' => 9,  'nama' => 'Trench Coat Camel',          'kategori' => 'Outerwear',   'ukuran' => 'S/M/L',    'harga' => 1650000, 'stok' => 7,  'status' => 'Tersedia', 'tag' => 'Premium'],
            ['id' => 10, 'nama' => 'Slip Dress Emerald',         'kategori' => 'Dress',       'ukuran' => 'XS/S/M',   'harga' => 540000,  'stok' => 0,  'status' => 'Habis',    'tag' => ''],
            ['id' => 11, 'nama' => 'Denim Barrel Jeans',         'kategori' => 'Bottoms',     'ukuran' => 'S/M/L/XL', 'harga' => 590000,  'stok' => 22, 'status' => 'Tersedia', 'tag' => 'Trending'],
            ['id' => 12, 'nama' => 'Silk Scarf Monogram',        'kategori' => 'Accessories', 'ukuran' => 'One Size',  'harga' => 310000,  'stok' => 40, 'status' => 'Tersedia', 'tag' => ''],
        ];

        return view('pengelolaan', [
            'username' => $request->session()->get('username'),
            'nama'     => $request->session()->get('nama'),
            'koleksi'  => $koleksi,
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->flush();
        return redirect('/login')->with('sukses', 'Berhasil logout!');
    }
}
