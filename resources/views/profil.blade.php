@extends('layouts.app')
@section('title', 'Profil Saya')

@section('content')

<div style="margin-bottom:2rem;">
    <p style="font-size:0.62rem;letter-spacing:0.18em;text-transform:uppercase;color:var(--mink);margin-bottom:0.375rem;">Akun</p>
    <h1 class="serif" style="font-size:2.2rem;font-weight:300;color:#1a1a1a;">Profil Saya</h1>
    <p style="font-size:0.875rem;color:#b0a090;margin-top:0.25rem;font-weight:300;">Informasi dan aktivitas akun Anda.</p>
</div>

<div style="display:grid;grid-template-columns:280px 1fr;gap:1.5rem;align-items:start;">

    <div>
        <div class="card" style="overflow:hidden;padding:0;">
            <div style="height:80px;background:linear-gradient(135deg,#3d2b1f,#6b4a2a);position:relative;overflow:hidden;">
                <div style="position:absolute;top:-30px;right:-30px;width:120px;height:120px;border:1px solid rgba(201,168,76,0.25);border-radius:50%;"></div>
                <div style="position:absolute;bottom:-20px;left:-10px;width:70px;height:70px;border:1px solid rgba(201,168,76,0.15);border-radius:50%;"></div>
            </div>

            <div style="padding:0 1.5rem 1.5rem;">
                <div style="margin-top:-1.5rem;margin-bottom:1rem;">
                    <div class="avatar-circle" style="width:58px;height:58px;font-size:1.4rem;border:3px solid #fff;box-shadow:0 2px 12px rgba(0,0,0,0.12);">
                        {{ strtoupper(substr($profil['nama'], 0, 1)) }}
                    </div>
                </div>

                <p class="serif" style="font-size:1.3rem;font-weight:400;color:#1a1a1a;line-height:1.2;">{{ $profil['nama'] }}</p>
                <p style="font-size:0.78rem;color:var(--mink);margin:0.2rem 0 0.875rem;">{{ $profil['email'] }}</p>

                <div style="display:flex;gap:0.5rem;flex-wrap:wrap;">
                    <span class="badge-role">{{ $profil['role'] }}</span>
                    <span style="font-size:0.68rem;padding:0.2rem 0.6rem;background:#edf7ed;color:#2d6a2d;border:1px solid #b8d4b8;border-radius:20px;">{{ $profil['status'] }}</span>
                </div>

                <div style="margin-top:1.25rem;padding-top:1.25rem;border-top:1px solid #f5f0e8;">
                    <p style="font-size:0.8rem;color:#8b7355;line-height:1.75;font-weight:300;font-style:italic;">{{ $profil['bio'] }}</p>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top:1.25rem;padding:1.25rem 1.5rem;">
            <p style="font-size:0.6rem;letter-spacing:0.12em;text-transform:uppercase;color:var(--mink);margin-bottom:1rem;font-weight:600;">Aktivitas Terakhir</p>
            <div style="display:flex;flex-direction:column;gap:0.8rem;">
                @foreach($aktivitas as $a)
                <div style="display:flex;gap:0.75rem;align-items:flex-start;">
                    <div style="width:7px;height:7px;background:#c9a84c;border-radius:50%;flex-shrink:0;margin-top:5px;"></div>
                    <div>
                        <p style="font-size:0.8rem;color:#1a1a1a;line-height:1.4;">{{ $a['aksi'] }}</p>
                        <p style="font-size:0.7rem;color:#c4b5a5;margin-top:2px;">{{ $a['waktu'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div style="display:flex;flex-direction:column;gap:1.25rem;">
        <div class="card" style="padding:1.75rem;">
            <p style="font-size:0.6rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--mink);margin-bottom:1.5rem;font-weight:600;">Informasi Akun</p>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                @php
                $fields = [
                    ['label' => 'Nama Lengkap', 'nilai' => $profil['nama'],     'ikon' => '👤'],
                    ['label' => 'Email',         'nilai' => $profil['email'],    'ikon' => '✉️'],
                    ['label' => 'Peran',         'nilai' => $profil['role'],     'ikon' => '🏷️'],
                    ['label' => 'Tanggal Bergabung','nilai' => $profil['bergabung'],'ikon'=>'📅'],
                    ['label' => 'Status Akun',   'nilai' => $profil['status'],   'ikon' => '✅'],
                ];
                @endphp

                @foreach($fields as $f)
                <div style="padding:1rem 1.1rem;background:#faf9f7;border:1px solid #f0ebe4;border-radius:6px;transition:border-color 0.15s;">
                    <div style="display:flex;align-items:center;gap:0.4rem;margin-bottom:0.4rem;">
                        <span style="font-size:0.85rem;">{{ $f['ikon'] }}</span>
                        <p style="font-size:0.62rem;letter-spacing:0.1em;text-transform:uppercase;color:#c4b5a5;font-weight:500;">{{ $f['label'] }}</p>
                    </div>
                    <p style="font-size:0.9rem;font-weight:500;color:#1a1a1a;">{{ $f['nilai'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="card" style="padding:1.5rem;">
            <p style="font-size:0.6rem;letter-spacing:0.12em;text-transform:uppercase;color:var(--mink);margin-bottom:1rem;font-weight:600;">Navigasi Cepat</p>
            <div style="display:flex;flex-wrap:wrap;gap:0.75rem;">
                <a href="/dashboard"   class="btn-outline" style="font-size:0.78rem;">← Kembali ke Dashboard</a>
                <a href="/pengelolaan" class="btn-outline" style="font-size:0.78rem;">Pengelolaan Koleksi →</a>
            </div>
        </div>

    </div>
</div>

@endsection
