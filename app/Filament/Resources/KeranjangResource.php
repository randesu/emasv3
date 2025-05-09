<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Keranjang;
use App\Models\customer;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KeranjangResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KeranjangResource\RelationManagers;

class KeranjangResource extends Resource
{
    protected static ?string $model = Keranjang::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    
    protected static ?string $navigationGroup = 'Master Data';

    public static function getNavigationSort(): ?int
    {
        return 8;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        // Relasi ke pembeli
                        Forms\Components\Select::make('id_pembeli')
                            ->label('Nama Pembeli')
                            ->relationship('keranjangToPembeli', 'nama_pembeli') // pastikan relasi 'pembeli' ada di model Keranjang
                            // ->searchable()
                            ->required(),
    
                        // Relasi ke produk
                        Forms\Components\Select::make('id_produk')
                            ->label('Nama Produk')
                            ->relationship('keranjangToProduk', 'id') // pastikan relasi 'produk' ada di model Keranjang
                            // ->searchable()
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->id} - {$record->nama_produk}")
                            ->required(),
    
                        // Jumlah Beli
                        Forms\Components\TextInput::make('jumlah_beli')
                            ->label('Jumlah Beli')
                            ->numeric()
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('keranjangToPembeli.nama_pembeli')
                    ->label('ID Pembeli')
                   // ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->id} - {$record->nama_pembeli}")
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('id_produk')
                    ->label('ID Produk')
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('jumlah_beli')
                    ->label('Jumlah Beli')
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
            // Tambahkan relasi jika ada (misalnya relasi ke Produk atau Pembeli)
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeranjangs::route('/'),
            'create' => Pages\CreateKeranjang::route('/create'),
            'edit' => Pages\EditKeranjang::route('/{record}/edit'),
        ];
    }    
}
