<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Filament\Resources\TransaksiResource\RelationManagers;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Get;
use Filament\Forms\Set;

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
                        Select::make('id_pembeli')
                            ->label('Nama Pembeli')
                            ->relationship('customer', 'nama_pembeli')
                            ->disabled() // agar tidak bisa dipilih manual
                            ->dehydrated(), // tetap dikirim saat submit
                        
    
                        // Total Bayar
                        TextInput::make('total_bayar')
                            ->label('Total Bayar')
                            ->disabled() // agar tidak diubah manual
                            ->dehydrated(), // tetap dikirim saat submit
                        
    
                        // ID Checkout - relasi ke tabel checkout
                        Select::make('id_checkout')
                            ->label('Kode Checkout')
                            ->relationship('checkout', 'id') // pastikan ini sesuai
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive() // agar bisa trigger perubahan
                            ->afterStateUpdated(function ($state, Set $set) {
                                $checkout = \App\Models\Checkout::with('customer')->find($state);

                                if ($checkout) {
                                    $set('total_bayar', $checkout->total_beli);
                                    $set('id_pembeli', $checkout->id_pembeli);
                                }
                            }),
    
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

public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()->with('customer');
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Nama Pembeli
                Tables\Columns\TextColumn::make('customer.nama_pembeli')
                ->label('Nama Pembeli')
                ->searchable()
                ->sortable(),

                // Total Bayar
                Tables\Columns\TextColumn::make('total_bayar')
                    ->label('Total Bayar')
                    ->money('IDR')
                    ->sortable(),
    
                // Nama Checkout (atau ID Checkout)
                Tables\Columns\TextColumn::make('id_checkout')
                    ->label('ID Checkout')
                    ->sortable(),
    
                // Barcode
                // Tables\Columns\TextColumn::make('barcode')
                //     ->label('Barcode')
                //     ->copyable()
                //     ->searchable(),
    
                // Status Pembayaran
                Tables\Columns\TextColumn::make('status_pembayaran')
                    ->label('Status Pembayaran')
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Sudah Bayar' : 'Belum Bayar')
                    ->badge()
                    ->color(fn ($state) => $state == 1 ? 'success' : 'warning')
                    ->sortable(),
    
                // Tanggal Transaksi
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            // ->actions([
            //     Tables\Actions\EditAction::make(),
            // ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ])
            ;
    }
    
        //ini untuk menghilangkan tombol New Keranjang
    public static function canCreate(): bool
    {
        return false;
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
