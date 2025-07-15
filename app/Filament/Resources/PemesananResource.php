<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemesananResource\Pages;
use App\Filament\Resources\PemesananResource\RelationManagers;
use App\Models\Pemesanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class PemesananResource extends Resource
{
    protected static ?string $navigationLabel = 'Pemesanan';
    
    protected static ?string $model = Pemesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Select::make('user_id')
                ->relationship(
                    name: 'user', 
                    titleAttribute: 'name', 
                    modifyQueryUsing: fn ($query) => $query->where('role', 'user')
                )
                ->required(),
                Select::make("wisata_id")
                    ->relationship('wisata', 'nama')
                    ->required(),
                DatePicker::make("tanggal")
                    ->label('Tanggal Pemesanan')
                    ->required(),
                TextInput::make('jumlah_tiket')
                    ->label("Jumlah Tiket")
                    ->required(),
                TextInput::make('total_harga')
                    ->label("Total Harga")
                    ->required(),
                Select::make('status')->options([
                    "proses" => "Proses",
                    "selesai" => "Selesai",
                    "batal" => "Batal"
                ])->default('proses')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Nama Pemesan')->searchable(),
                TextColumn::make('wisata.nama')->label('Nama Wisata')->searchable(),
                TextColumn::make('tanggal')->date()->label('Tanggal Pemesanan'),
                TextColumn::make('jumlah_tiket')->label('Jumlah Tiket'),
                TextColumn::make('total_harga')->money('IDR', true)->label('Total Harga'),
                TextColumn::make("status")
                ->badge()
                ->icon(fn (string $state): string => match ($state) {
                    'proses' => "heroicon-o-clock",
                    'selesai' => "heroicon-o-check-circle",
                    'batal' => "heroicon-o-x-circle"
                })
                ->color(fn (string $state): string => match ($state) {
                    'proses' => 'warning',
                    'selesai' => 'success',
                    'batal' => 'danger',
                    default => 'secondary',
                })->label('Status')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPemesanans::route('/'),
            'create' => Pages\CreatePemesanan::route('/create'),
            'edit' => Pages\EditPemesanan::route('/{record}/edit'),
        ];
    }
}