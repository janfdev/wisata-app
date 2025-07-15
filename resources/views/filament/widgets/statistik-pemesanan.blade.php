<x-filament::widget>
    <x-filament::card>
        <div class="text-xl font-semibold mb-4">Statistik Pemesanan</div>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-amber-100 dark:bg-amber-900/30 p-4 rounded-lg shadow">
                <div class="text-sm text-amber-800 dark:text-amber-200">Total Pemesanan</div>
                <div class="text-2xl font-bold text-amber-600 dark:text-amber-300">{{ $totalPemesanan }}</div>
            </div>

            <div class="bg-green-100 dark:bg-green-900/30 p-4 rounded-lg shadow">
                <div class="text-sm text-green-800 dark:text-green-200">Pemesanan Selesai</div>
                <div class="text-2xl font-bold text-green-600 dark:text-green-300">{{ $totalSelesai }}</div>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
