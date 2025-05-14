<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailCheckoutResource\Pages;
use App\Filament\Resources\DetailCheckoutResource\RelationManagers;
use App\Models\DetailCheckout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailCheckoutResource extends Resource
{
    protected static ?string $model = DetailCheckout::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    
    protected static ?string $navigationGroup = 'Palung Mariana';

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        // Produk (relasi)
                        Forms\Components\Select::make('id_produk')
                            ->label('Nama Produk')
                            ->relationship('produk', 'name') // pastikan ada relasi 'produk' di model
                            ->searchable()
                            ->required(),
    
                        // Total Beli
                        Forms\Components\TextInput::make('total_beli')
                            ->label('Total Beli')
                            ->numeric()
                            ->required(),
    
                        // Harga Produk
                        Forms\Components\TextInput::make('harga_produk')
                            ->label('Harga Produk')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),
    
                        // Pembeli (relasi)
                        Forms\Components\Select::make('id_pembeli')
                            ->label('Nama Pembeli')
                            ->relationship('pembeli', 'nama_pembeli') // pastikan ada relasi 'pembeli' di model
                            ->searchable()
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_produk')
                    ->label('ID Produk')
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('total_beli')
                    ->label('Total Beli')
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('harga_produk')
                    ->label('Harga Produk')
                    ->money('IDR', true)
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('id_pembeli')
                    ->label('ID Pembeli')
                    ->sortable(),
            ])
            ->filters([
                //
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
            // Tambahkan relasi jika diperlukan, contoh:
            // RelationManagers\ProdukRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDetailCheckouts::route('/'),
            'create' => Pages\CreateDetailCheckout::route('/create'),
            'edit' => Pages\EditDetailCheckout::route('/{record}/edit'),
        ];
    }
}