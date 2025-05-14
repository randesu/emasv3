<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CheckoutResource\Pages;
use App\Filament\Resources\CheckoutResource\RelationManagers;
use App\Models\Checkout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CheckoutResource extends Resource
{
    protected static ?string $model = Checkout::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    
    protected static ?string $navigationGroup = 'Transaksi Dll.';

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
                        // ID Pembeli - relasi
                        Select::make('id_pembeli')
                            ->label('Nama Pembeli')
                            ->relationship('customer', 'nama_pembeli')
                            ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->id} - {$record->nama_pembeli}")
                            ->searchable()
                            ->preload()
                            ->required(),
    
                        // Total Beli
                        Forms\Components\TextInput::make('total_beli')
                            ->label('Total Beli')
                            ->numeric()
                            ->required(),

                        Forms\Components\TextInput::make('id_produk')
                            ->label('id Produk')
                            ->numeric(),
                            // ->required()
                            // ->rows(3),
    
                        // Alamat Pembeli
                        Forms\Components\Textarea::make('alamat_pembeli')
                            ->label('Alamat Pembeli')
                            ->required()
                            ->rows(3),
    
                        // Metode Pembayaran (asumsi integer seperti 1 = COD, 2 = Transfer)
                        Forms\Components\Select::make('metode_pembayaran')
                            ->label('Metode Pembayaran')
                            ->options([
                                1 => 'COD',
                                2 => 'Transfer Bank',
                                3 => 'QRIS',
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
                // Kolom nama pembeli dari relasi
                    Tables\Columns\TextColumn::make('customer.nama_pembeli')
                    ->label('Nama Pembeli')
                    ->sortable(),

                    Tables\Columns\TextColumn::make('id_produk')
                    ->label('id Produk')
                    ->sortable(),
    
                // Total Beli
                Tables\Columns\TextColumn::make('total_beli')
                    ->label('Total Beli')
                    ->numeric()
                    ->sortable(),
    
                // Alamat Pembeli
                Tables\Columns\TextColumn::make('alamat_pembeli')
                    ->label('Alamat')
                    ->limit(30)
                    ->wrap(),
    
                // Metode Pembayaran dengan label
                Tables\Columns\TextColumn::make('metode_pembayaran')
                    ->label('Metode Pembayaran')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        1 => 'COD',
                        2 => 'Transfer Bank',
                        3 => 'QRIS',
                        default => 'Tidak Diketahui',
                    }),
            ])
            ->filters([
                // Contoh filter berdasarkan metode pembayaran
                Tables\Filters\SelectFilter::make('metode_pembayaran')
                    ->label('Metode Pembayaran')
                    ->options([
                        1 => 'COD',
                        2 => 'Transfer Bank',
                        3 => 'QRIS',
                    ]),
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
            // Tambahkan relasi jika Checkout memiliki detail transaksi atau lainnya
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCheckouts::route('/'),
            'create' => Pages\CreateCheckout::route('/create'),
            'edit' => Pages\EditCheckout::route('/{record}/edit'),
        ];
    }
}