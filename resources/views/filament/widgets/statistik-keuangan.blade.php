<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-bold text-gray-700 mb-4">Statistik Keuangan</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 bg-amber-100 rounded">
                <h3 class="text-sm text-gray-500">Total Pendapatan</h3>
                <p class="text-xl font-semibold text-amber-700">
                    Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
                </p>
            </div>

            <div class="p-4 bg-amber-50 rounded">
                <h3 class="text-sm text-gray-500">Rata-rata per Pemesanan</h3>
                <p class="text-xl font-semibold text-amber-600">
                    Rp{{ number_format($rataRata, 0, ',', '.') }}
                </p>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
