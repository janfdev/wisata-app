@extends('layouts.app')

@section('content')
<section class="lg:grid lg:min-h-screen lg:place-content-center">
    {{-- Hero Section --}}
  <div class="mx-auto w-screen max-w-screen-xl px-4 sm:px-6 sm:py-24 lg:px-8 lg:py-32">
    <div class="mx-auto max-w-prose text-center">
      <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl">
        Jelajahi Keindahan Alam &amp;
        <strong class="text-amber-600"> Destinasi Wisata </strong>
        Terbaik
      </h1>

     <p class="mt-4 text-base text-pretty text-gray-700 sm:text-lg/relaxed">
        Temukan berbagai tempat wisata menarik di seluruh Indonesia, mulai dari pantai eksotis, pegunungan indah, hingga budaya lokal yang memikat. Semua informasi lengkap dalam satu platform.
     </p>


      <div class="mt-4 flex justify-center gap-4 sm:mt-6">
        <a
            class="inline-block rounded border border-amber-600 bg-amber-600 px-5 py-3 font-medium text-white shadow-sm transition-colors hover:bg-amber-700"
            href="#wisata"
            >
            Eksplor Sekarang
        </a>

        <a
            class="inline-block rounded border border-gray-200 px-5 py-3 font-medium text-gray-700 shadow-sm transition-colors hover:bg-gray-50 hover:text-gray-900"
            href="#about"
            >
            Tentang Kami
        </a>

      </div>
    </div>
  </div>

    {{-- Kategori Wisata --}}
    <section id="kategori-wisata">
         <div class="flex items-center justify-center">
        <span class="rounded-full bg-amber-100 px-4 py-1 whitespace-nowrap text-lg font-bold text-amber-700">
        Kategori Wisata
        </span>
        </div>


        @if ($kategori->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 py-12">
                @foreach ($kategori as $item)
                    <a href="{{ route('kategori.detail', $item->id) }}" 
                        class="group p-6 rounded-2xl flex flex-col items-center justify-center hover:border-2 hover:border-amber-600 hover:shadow-xl transition duration-300 ease-in-out">
                            
                            @if ($item->gambar)
                            <div class="rounded-full w-24 h-24 flex items-center justify-center bg-amber-100 shadow-inner mb-4 overflow-hidden">
                                <img src="{{ asset('storage/' . $item->gambar) }}" 
                                    alt="{{ $item->nama }}" 
                                    class="w-16 h-16 object-cover transition-transform duration-300 group-hover:scale-105">
                            </div>
                            @endif

                            <h3 class="font-bold text-xl text-amber-700 text-center group-hover:text-amber-800 transition">{{ $item->nama }}</h3>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 italic">Belum ada kategori wisata tersedia.</p>
        @endif
    </section>

   {{-- Wisata --}}
   <section id="wisata" class="flex flex-col gap-8 py-24">
    <div class="flex items-center justify-center">
        <span class="rounded-full bg-amber-100 px-4 py-1 whitespace-nowrap text-lg font-bold text-amber-700">
        Wisata
        </span>
    </div>

    @if ($wisata->count())
    <div class="grid grid-cols-4 gap-[22px]">
        @foreach ($wisata as $item )      
        <div class="flex flex-col rounded-[18px] shadow-lg overflow-hidden hover:border-2 hover:border-amber-600 ">
                <a href="{{ route("wisata.detail", $item->id ) }}" class="w-full h-[180px] flex shrink-0 overflow-hidden relative">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover" >
                    <p class="backdrop-blur bg-black/30 text-white rounded-[4px] p-[4px_8px] absolute top-3 right-[14px] z-10">{{ number_format($item->harga_tiket) }}</p>
                </a>    
                <div class="p-[20px_14px_20px] h-full flex flex-col justify-between gap-[14px]">
                    <div class="flex flex-col gap-1">
                        <a href="{{ route("wisata.detail", $item->id ) }}" class="font-semibold line-clamp-2 hover:line-clamp-none">{{ $item->nama }}</a>
                        <div class="flex items-center justify-between">
                            <p class=" font-semibold text-xs text-belibang-grey rounded-[4px] p-[4px_6px] w-fit">#Wisata</p>
                            <a href="{{ route("wisata.detail", $item->id )  }}" class="text-sm bg-amber-400 text-white border-none rounded-md py-1 px-4">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
        @else
        <p class="text-gray-500 italic">Wisata tidak tersedia.</p>
    </div>
    @endif
</section>

</section>
@endsection
