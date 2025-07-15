<?php

namespace App\Filament\Widgets;

use App\Models\Pemesanan;
use Filament\Widgets\ChartWidget;

class StatistikKeuanganChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Keuangan';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Keuangan',
                    'data' => [
                        Pemesanan::where('status', 'selesai')->sum('total_harga'),
                        Pemesanan::where('status', 'selesai')->avg('total_harga'),
                    ],
                    'backgroundColor' => ['#FBBF24', '#34D399'],
                ],
            ],
            'labels' => ['Total Pendapatan', 'Rata-rata'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}