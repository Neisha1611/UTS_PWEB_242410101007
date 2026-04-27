@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

<div style="margin-bottom:2.5rem;">
    <p style="font-size:0.62rem;letter-spacing:0.18em;text-transform:uppercase;color:var(--mink);margin-bottom:0.375rem;">Ringkasan Hari Ini</p>
    <h1 class="serif" style="font-size:2.2rem;font-weight:300;color:#1a1a1a;line-height:1.2;">
        Selamat Datang, <em style="color:var(--mink);font-style:italic;">{{ $nama }}</em> 👋
    </h1>
    <p style="font-size:0.875rem;color:#b0a090;margin-top:0.375rem;font-weight:300;">Berikut ringkasan koleksi dan performa toko hari ini.</p>
</div>

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1.25rem;margin-bottom:2.5rem;">

    @php
    $ikonWarna = ['#3d2b1f','#2d5a8b','#3d7a3d','#7a3d6b'];
    @endphp

    @foreach($statistik as $i => $s)
    <div class="stat-card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;">
            <div style="
                width:48px;height:48px;border-radius:12px;
                background:{{ ['#f5ede5','#e8f0f8','#edf7ed','#f7edf5'][$i] }};
                display:flex;align-items:center;justify-content:center;font-size:1.4rem;
            ">{{ $s['ikon'] }}</div>
            <span class="badge-naik">{{ $s['naik'] }}</span>
        </div>

        <p class="serif" style="font-size:2.4rem;font-weight:400;color:#1a1a1a;line-height:1;margin-bottom:0.3rem;">
            {{ number_format($s['nilai']) }}
        </p>

        <p style="font-size:0.72rem;color:var(--mink);letter-spacing:0.06em;text-transform:uppercase;font-weight:500;">
            {{ $s['label'] }}
        </p>

        <div style="margin-top:1.25rem;height:2px;background:linear-gradient(90deg,{{ $ikonWarna[$i] }},transparent);opacity:0.15;border-radius:1px;"></div>
    </div>
    @endforeach

</div>

<div style="display:grid;grid-template-columns:1.5fr 1fr;gap:1.5rem;">
    <div class="card" style="padding:1.75rem;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.75rem;">
            <div>
                <p style="font-size:0.6rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--mink);margin-bottom:3px;">Performa</p>
                <h3 class="serif" style="font-size:1.2rem;font-weight:400;color:#1a1a1a;">Item Terlaris</h3>
            </div>
            <a href="/pengelolaan" style="font-size:0.7rem;letter-spacing:0.06em;text-transform:uppercase;color:var(--mink);text-decoration:none;border-bottom:1px solid var(--sand);padding-bottom:1px;">
                Lihat Semua →
            </a>
        </div>

        <div style="display:flex;flex-direction:column;gap:1.25rem;">
            @foreach($terlaris as $i => $item)
            <div>
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.6rem;">
                    <div style="display:flex;align-items:center;gap:0.75rem;">
                        <span style="
                            font-size:0.68rem;font-family:'Courier New',monospace;
                            color:#fff;background:var(--espresso);
                            width:22px;height:22px;border-radius:50%;
                            display:flex;align-items:center;justify-content:center;
                            flex-shrink:0;font-weight:600;
                        ">{{ $i+1 }}</span>
                        <p style="font-size:0.85rem;color:#1a1a1a;font-weight:400;">{{ $item['nama'] }}</p>
                    </div>
                    <span style="font-size:0.78rem;color:var(--mink);font-weight:500;white-space:nowrap;margin-left:1rem;">
                        {{ $item['terjual'] }} terjual
                    </span>
                </div>
                <div class="progress-track" style="margin-left:2.15rem;">
                    <div class="progress-fill" style="width:{{ $item['persen'] }}%;"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div style="display:flex;flex-direction:column;gap:1.25rem;">
        <div class="card" style="padding:1.5rem;">
            <p style="font-size:0.6rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--mink);margin-bottom:1rem;">Akun Aktif</p>
            <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.25rem;">
                <div class="avatar-circle" style="width:46px;height:46px;font-size:1.1rem;flex-shrink:0;">
                    {{ strtoupper(substr($nama, 0, 1)) }}
                </div>
                <div>
                    <p class="serif" style="font-size:1.05rem;font-weight:400;color:#1a1a1a;">{{ $nama }}</p>
                    <p style="font-size:0.72rem;color:var(--mink);">{{ session('role', 'Staf') }}</p>
                </div>
            </div>
            <div style="display:flex;gap:0.75rem;">
                <a href="/profil"      class="btn-outline"  style="flex:1;text-align:center;font-size:0.72rem;">Profil</a>
                <a href="/pengelolaan" class="btn-primary"   style="flex:1;text-align:center;font-size:0.72rem;">Pengelolaan</a>
            </div>
        </div>

        <div style="background:#3d2b1f;border-radius:10px;padding:1.5rem;position:relative;overflow:hidden;">
            <div style="position:absolute;top:-25px;right:-25px;width:110px;height:110px;border:1px solid rgba(201,168,76,0.25);border-radius:50%;"></div>
            <div style="position:absolute;bottom:-40px;right:20px;width:80px;height:80px;border:1px solid rgba(201,168,76,0.15);border-radius:50%;"></div>
            <p style="font-size:0.6rem;letter-spacing:0.15em;text-transform:uppercase;color:rgba(255,255,255,0.4);margin-bottom:0.375rem;">Musim Saat Ini</p>
            <p class="serif" style="font-size:1.35rem;font-weight:300;color:#fff;margin-bottom:0.375rem;">Summer 2025</p>
            <p style="font-size:0.78rem;color:rgba(255,255,255,0.5);font-weight:300;line-height:1.5;">Koleksi terbaru tersedia — 24 item baru siap dipasarkan.</p>
            <div style="margin-top:1.1rem;width:35px;height:2px;background:#c9a84c;border-radius:1px;"></div>
        </div>

        <div class="card" style="padding:1.25rem 1.5rem;background:#faf9f7;">
            <p style="font-size:0.6rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--mink);margin-bottom:0.75rem;">Info</p>
            <div style="display:flex;flex-direction:column;gap:0.625rem;">
                <div style="display:flex;gap:0.6rem;align-items:flex-start;font-size:0.8rem;color:#555;">
                    <span style="color:#c9a84c;flex-shrink:0;">●</span>
                    <span>3 item stok hampir habis</span>
                </div>
                <div style="display:flex;gap:0.6rem;align-items:flex-start;font-size:0.8rem;color:#555;">
                    <span style="color:#3d7a3d;flex-shrink:0;">●</span>
                    <span>Laporan bulanan tersedia</span>
                </div>
                <div style="display:flex;gap:0.6rem;align-items:flex-start;font-size:0.8rem;color:#555;">
                    <span style="color:#2d5a8b;flex-shrink:0;">●</span>
                    <span>2 brand partner baru menunggu konfirmasi</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
