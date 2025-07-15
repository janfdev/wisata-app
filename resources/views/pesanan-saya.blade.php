@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-4 text-amber-700">Pesanan Saya</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($pemesanan as $pesanan)
        <div class="bg-white p-4 shadow rounded mb-4">
            <h3 class="text-lg font-semibold">{{ $pesanan->wisata->nama }}</h3>
            <p class="text-sm text-gray-600">Tanggal: {{ $pesanan->tanggal }}</p>
            <p class="text-sm">Jumlah Tiket: {{ $pesanan->jumlah_tiket }}</p>
            <p class="text-sm">Total Harga: Rp{{ number_format($pesanan->total_harga) }}</p>
            <span class="text-sm font-semibold mt-2 inline-block text-white px-2 py-1 rounded 
                {{ $pesanan->status === 'selesai' ? 'bg-green-600' : 'bg-yellow-500' }}">
                {{ ucfirst($pesanan->status) }}
            </span>
        </div>
    @empty
        <p>Belum ada pemesanan.</p>
    @endforelse
</div>
@endsection
