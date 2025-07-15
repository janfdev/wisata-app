@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 ">
    <h2 class="text-2xl font-bold text-amber-700">{{ $kategori->nama }}</h2>
    @if ($wisatas->count())
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($wisatas as $wisata)
            <a href="{{ route('wisata.detail', $wisata->id) }}" class="bg-white p-4 shadow rounded-xl flex flex-col gap-3 items-center justify-center hover:bg-amber-50">
                <h3 class="font-bold text-xl capitalize">{{ $wisata->nama }}</h3>
                <div class="shadow-md rounded-full">
                    <img src="{{ asset('storage/' . $wisata->gambar) }}" class="w-full h-40 " alt="Gambar Wisata">
                </div>
                <p class="text-sm text-gray-500 capitalize">{{ Str::limit($wisata->deskripsi, 255) }}</p>
                <p class="text-amber-700 font-semibold mt-2">Rp{{ number_format($wisata->harga_tiket) }}</p>
            </a>
        @endforeach
        @else
        <p class="text-gray-500 italic">Wisata belum tersedia.</p>
    </div>
    @endif
</div>
@endsection
