<?php

namespace App\Filament\Resources\PemesananResource\Pages;

use App\Filament\Resources\PemesananResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePemesanan extends CreateRecord
{
    protected static string $resource = PemesananResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
    $data['user_id'] = auth()->id();
    return $data;
    }

}