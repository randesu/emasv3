<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhislistResource\Pages;
use App\Filament\Resources\WhislistResource\RelationManagers;
use App\Models\Whislist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WhislistResource extends Resource
{
    protected static ?string $model = Whislist::class;

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
                        Forms\Components\TextInput::make('id_pembeli')
                            ->label('ID Pembeli')
                            ->numeric()
                            ->required(),
    
                        Forms\Components\TextInput::make('id_produk')
                            ->label('ID Produk')
                            ->numeric()
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
    
                // Kolom Nama Produk
                Tables\Columns\TextColumn::make('produk.name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
    
                // Kolom Tanggal Ditambahkan
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambahkan Pada')
                    ->dateTime()
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
