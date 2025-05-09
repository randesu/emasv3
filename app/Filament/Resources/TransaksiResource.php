<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Filament\Resources\TransaksiResource\RelationManagers;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    
    protected static ?string $navigationGroup = 'Master Data';

    public static function getNavigationSort(): ?int
    {
        return 10;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        // ID Pembeli - relasi ke tabel pembeli
                        Forms\Components\Select::make('id_pembeli')
                            ->label('Nama Pembeli')
                            ->relationship('pembeli', 'nama_pembeli') // asumsi relasi di model Transaksi
                            ->searchable()
                            ->required(),
    
                        // Total Bayar
                        Forms\Components\TextInput::make('total_bayar')
                            ->label('Total Bayar')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),
    
                        // ID Checkout - relasi ke tabel checkout
                        Forms\Components\Select::make('id_checkout')
                            ->label('Kode Checkout')
                            ->relationship('checkout', 'kode_checkout') // asumsi field 'kode_checkout' di tabel checkout
                            ->searchable()
                            ->required(),
    
                        // Barcode
                        Forms\Components\TextInput::make('barcode')
                            ->label('Barcode')
                            ->required(),
    
                        // Status Pembayaran (misal: 0 = Belum Dibayar, 1 = Sudah Dibayar)
                        Forms\Components\Select::make('status_pembayaran')
                            ->label('Status Pembayaran')
                            ->options([
                                0 => 'Belum Dibayar',
                                1 => 'Sudah Dibayar',
                            ])
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Nama Pembeli
                TextColumn::make('pembeli.nama_pembeli')
                    ->label('Nama Pembeli')
                    ->searchable()
                    ->sortable(),
    
                // Total Bayar
                TextColumn::make('total_bayar')
                    ->label('Total Bayar')
                    ->money('IDR')
                    ->sortable(),
    
                // Nama Checkout (atau ID Checkout)
                TextColumn::make('checkout.id')
                    ->label('ID Checkout')
                    ->sortable(),
    
                // Barcode
                TextColumn::make('barcode')
                    ->label('Barcode')
                    ->copyable()
                    ->searchable(),
    
                // Status Pembayaran
                TextColumn::make('status_pembayaran')
                    ->label('Status Pembayaran')
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Sudah Bayar' : 'Belum Bayar')
                    ->badge()
                    ->color(fn ($state) => $state == 1 ? 'success' : 'warning')
                    ->sortable(),
    
                // Tanggal Transaksi
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime()
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
            // tambahkan jika transaksi memiliki relasi lain seperti detail_transaksi
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }    
}
