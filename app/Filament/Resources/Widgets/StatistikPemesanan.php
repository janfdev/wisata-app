<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Pemesanan;

class StatistikPemesanan extends Widget
{
    protected static string $view = 'filament.widgets.statistik-pemesanan';

    public function getViewData(): array
    {
        return [
            'totalPemesanan' => Pemesanan::count(),
            'totalSelesai' => Pemesanan::where('status','selesai')->count(),
        ];
    }
}