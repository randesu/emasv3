<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
// use App\Models\Whislist;
use Forms\Components\Select;
use App\Models\Wishlist;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WhislistResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WhislistResource\RelationManagers;

class WhislistResource extends Resource
{
    protected static ?string $model = Wishlist::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    
    protected static ?string $navigationGroup = 'Tentang sistem';

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
    Forms\Components\Card::make()
        ->schema([
            // Dropdown untuk Pembeli
            Forms\Components\Select::make('id_pembeli')
                ->label('Pembeli')
                ->relationship('pembeli', 'nama_pembeli') // jika sudah ada relasi di model
                ->searchable()
                ->required(),

            // Dropdown untuk Produk
            Forms\Components\Select::make('id_produk')
                ->label('Produk')
                ->relationship('produk', 'nama_produk') // jika sudah ada relasi di model
                ->searchable()
                ->required(),
        ]),
    ]);

    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom Nama Pembeli
                Tables\Columns\TextColumn::make('pembeli.nama_pembeli')
                    ->label('Nama Pembeli')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('produk.nama_produk')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
    
                // Kolom Tanggal Ditambahkan
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambahkan Pada')
                    ->dateTime()
                    ->disabled()
                    ->sortable(),
            ])
            ->filters([
                // filter bisa ditambahkan nanti jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            // Tambahkan relasi jika resource ini memiliki relasi tambahan (misalnya komentar, rating, dll)
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWhislists::route('/'),
            'create' => Pages\CreateWhislist::route('/create'),
            'edit' => Pages\EditWhislist::route('/{record}/edit'),
        ];
    }
}    
