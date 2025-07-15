@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto flex flex-col gap-3">
    <h2 class="text-2xl font-bold text-amber-700 mb-2">{{ $wisata->nama }}</h2>
    <img src="{{ asset('storage/' . $wisata->gambar) }}" class="w-full h-50 rounded-lg" alt="Gambar Wisata">
    <p class="mb-4 capitalize">{{ $wisata->deskripsi }}</p>
    <p class="font-semibold text-lg text-amber-600 mb-4">Harga: Rp{{ number_format($wisata->harga_tiket) }}</p>

    @auth
    <form action="{{ route('pemesanan.submit') }}" method="POST" class="space-y-4 bg-white p-4 rounded shadow">
        @csrf
        <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">
        <div>
            <label for="tanggal" class="block text-sm font-medium">Tanggal Kunjungan</label>
            <input type="date" name="tanggal" required class="w-full mt-1 border rounded p-2">
        </div>
        <div>
            <label for="jumlah_tiket" class="block text-sm font-medium">Jumlah Tiket</label>
            <input type="number" name="jumlah_tiket" min="1" required class="w-full mt-1 border rounded p-2">
        </div>
        <button class="bg-amber-600 text-white px-4 py-2 rounded">Pesan Sekarang</button>
    </form>
    @else
    <p class="text-red-600">Silakan <a href="{{ route('login') }}" class="underline">login</a> untuk memesan.</p>
    @endauth
</div>
@endsection
