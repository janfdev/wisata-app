<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriWisataResource\Pages;
use App\Filament\Resources\KategoriWisataResource\RelationManagers;
use App\Models\KategoriWisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;

class KategoriWisataResource extends Resource
{

    protected static ?string $navigationLabel = 'Kategori Wisata';

    protected static ?string $model = KategoriWisata::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required()->maxLength(100),
                FileUpload::make('gambar')
                ->image()
                ->directory('kategori-wisata')
                ->imageEditor()
                ->maxSize(1024)
                ->preserveFilenames()
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("nama")->searchable(),
                ImageColumn::make('gambar')
                ->circular()
                ->label("Icon Kategori")
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
            'index' => Pages\ListKategoriWisatas::route('/'),
            'create' => Pages\CreateKategoriWisata::route('/create'),
            'edit' => Pages\EditKategoriWisata::route('/{record}/edit'),
        ];
    }
}