@extends('layouts.app')
@section('title', 'Koleksi')
@section('show_sidebar', true)
@section('page_title', 'Koleksi')

@section('content')

<div style="display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:2rem;flex-wrap:wrap;gap:1rem;">
    <div>
        <p style="font-size:0.65rem;letter-spacing:0.15em;text-transform:uppercase;color:#8b7355;margin-bottom:0.375rem;">Inventory</p>
        <h1 class="serif" style="font-size:2rem;font-weight:400;color:#1a1a1a;">Koleksi Fashion</h1>
        <p style="font-size:0.875rem;color:#c4b5a5;margin-top:0.25rem;font-weight:300;">
            Dikelola oleh <span style="color:#8b7355;font-style:italic;">{{ $nama }}</span> · {{ count($koleksi) }} item
        </p>
    </div>
    <button class="btn-primary" style="font-size:0.72rem;display:flex;align-items:center;gap:0.5rem;margin-top:0.5rem;">
        <svg style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Item
    </button>
</div>

@php
    $total    = count($koleksi);
    $tersedia = count(array_filter($koleksi, fn($i) => $i['status'] === 'Tersedia'));
    $habis    = count(array_filter($koleksi, fn($i) => $i['status'] === 'Habis'));
    $totalStok = array_sum(array_column($koleksi, 'stok'));
@endphp

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:1.75rem;">
    @foreach([
        ['label'=>'Total Item',   'nilai'=>$total,    'color'=>'#1a1a1a'],
        ['label'=>'Tersedia',     'nilai'=>$tersedia, 'color'=>'#3d7a3d'],
        ['label'=>'Stok Habis',   'nilai'=>$habis,    'color'=>'#8b3333'],
        ['label'=>'Total Stok',   'nilai'=>$totalStok,'color'=>'#8b7355'],
    ] as $s)
    <div class="card" style="padding:1.125rem 1.25rem;">
        <p class="serif" style="font-size:1.75rem;font-weight:400;color:{{ $s['color'] }};line-height:1;margin-bottom:0.25rem;">{{ $s['nilai'] }}</p>
        <p style="font-size:0.68rem;text-transform:uppercase;letter-spacing:0.08em;color:#c4b5a5;">{{ $s['label'] }}</p>
    </div>
    @endforeach
</div>

<div class="card" style="overflow:hidden;">
    <table class="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Item</th>
                <th>Kategori</th>
                <th>Ukuran</th>
                <th style="text-align:right;">Harga</th>
                <th style="text-align:center;">Stok</th>
                <th style="text-align:center;">Status</th>
                <th style="text-align:center;">Tag</th>
                <th style="text-align:center;">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach($koleksi as $item)
            <tr>

                <td style="font-family:'Courier New',monospace;font-size:0.75rem;color:#c4b5a5;">
                    {{ str_pad($item['id'], 3, '0', STR_PAD_LEFT) }}
                </td>
                <td>
                    <p style="font-weight:500;color:#1a1a1a;font-size:0.875rem;">{{ $item['nama'] }}</p>
                </td>
                <td>
                    <span style="font-size:0.72rem;color:#8b7355;background:#f5f0e8;padding:0.2rem 0.6rem;border-radius:2px;letter-spacing:0.04em;">{{ $item['kategori'] }}</span>
                </td>
                <td style="font-size:0.78rem;color:#8b7355;font-family:'Courier New',monospace;">{{ $item['ukuran'] }}</td>
                <td style="text-align:right;font-size:0.85rem;font-weight:500;color:#1a1a1a;font-family:'Courier New',monospace;">
                    Rp {{ number_format($item['harga'], 0, ',', '.') }}
                </td>
                <td style="text-align:center;">
                    <span style="font-size:0.875rem;font-weight:500;color:{{ $item['stok'] > 0 ? '#1a1a1a' : '#8b3333' }};">
                        {{ $item['stok'] }}
                    </span>
                </td>
                <td style="text-align:center;">
                    @if($item['status'] === 'Tersedia')
                        <span class="badge badge-tersedia">Tersedia</span>
                    @else
                        <span class="badge badge-habis">Habis</span>
                    @endif
                </td>
                <td style="text-align:center;">
                    @if($item['tag'] === 'New')
                        <span class="badge badge-new">New</span>
                    @elseif($item['tag'] === 'Bestseller')
                        <span class="badge badge-bestseller">Bestseller</span>
                    @elseif($item['tag'] === 'Premium')
                        <span class="badge badge-premium">Premium</span>
                    @elseif($item['tag'] === 'Trending')
                        <span class="badge badge-trending">Trending</span>
                    @else
                        <span style="color:#c4b5a5;font-size:0.7rem;">—</span>
                    @endif
                </td>

                <td style="text-align:center;">
                    <div style="display:flex;align-items:center;justify-content:center;gap:0.25rem;">
                        <button style="width:28px;height:28px;background:none;border:1px solid #e8ddd0;border-radius:3px;cursor:pointer;color:#8b7355;display:flex;align-items:center;justify-content:center;transition:all 0.15s;"
                            onmouseover="this.style.borderColor='#8b7355';this.style.background='#f5f0e8'"
                            onmouseout="this.style.borderColor='#e8ddd0';this.style.background='none'">
                            <svg style="width:12px;height:12px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                        <button style="width:28px;height:28px;background:none;border:1px solid #e8ddd0;border-radius:3px;cursor:pointer;color:#8b7355;display:flex;align-items:center;justify-content:center;transition:all 0.15s;"
                            onmouseover="this.style.borderColor='#c4776a';this.style.background='#fdf5f4';this.style.color='#c4776a'"
                            onmouseout="this.style.borderColor='#e8ddd0';this.style.background='none';this.style.color='#8b7355'">
                            <svg style="width:12px;height:12px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>

<div style="display:flex;justify-content:space-between;align-items:center;margin-top:1rem;padding:0 0.25rem;">
    <p style="font-size:0.72rem;color:#c4b5a5;">Menampilkan {{ count($koleksi) }} item</p>
    <p class="serif" style="font-size:0.8rem;color:#c4b5a5;font-style:italic;">Lumière Collection Registry</p>
</div>

@endsection
