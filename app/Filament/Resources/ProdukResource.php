<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Produk;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Forms\Components\TextInput;
use Filament\Resources\Resource;
use Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProdukResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdukResource\RelationManagers;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = 'Tentang sistem';

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->schema([
    
                    //image
                    Forms\Components\FileUpload::make('gambar_produk')
                    
                       
                      ->label('Gambar Produk')
                      ->placeholder('Gambar Produk'),
                    //   ->storeFileNamesIn('gambar_produk'),
                    //   ->required(),
    
                    //name
                    Forms\Components\TextInput::make('nama_produk')
                      ->label('Nama Produk')
                      ->placeholder('Nama Produk')
                      ->required(),

                      Forms\Components\Select::make('category_id')
                      ->label('Kategori Produk')
                      ->relationship('produkToCategory', 'name')
                      ->required(),
                      

                    Forms\Components\TextInput::make('harga')
                        ->integer()
                        ->label('Harga Produk')
                        ->placeholder('Harga Produk')
                        ->required(),
                    
                    Forms\Components\TextInput::make('kode_produk')
                      ->label('kode produk')
                      ->placeholder('Kode Produk')
                      ->required(),

                    Forms\Components\TextInput::make('berat_barang')
                        ->integer()
                        ->label('Berat Barang')
                        ->placeholder('Berat Barang')
                        ->required(),
                    
                    Forms\Components\TextInput::make('kadar_barang')
                        ->integer()
                        ->label('Kadar Barang')
                        ->placeholder('Kadar Barang')
                        ->required(),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Gambar produk
                Tables\Columns\ImageColumn::make('gambar_produk')
                    ->label('Gambar')
                    ->circular(),
    
                // Nama produk
                Tables\Columns\TextColumn::make('nama_produk')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
    
                // Harga produk
                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR')
                    ->sortable(),
    
                // Stok produk
                Tables\Columns\TextColumn::make('stok')
                    ->label('Stok')
                    ->sortable(),
    
                // Kategori (jika ada relasi)
                Tables\Columns\TextColumn::make('kategori.nama')
                    ->label('Kategori')
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
            // tambahkan relasi jika produk punya relasi detail lain
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }    
}
