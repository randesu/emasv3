<?php

namespace App\Filament\Resources;
use App\Models\Customer;
use App\Models\Keranjang;


use App\Filament\Resources\TransactionV2Resource\Pages;
use App\Filament\Resources\TransactionV2Resource\RelationManagers;
use App\Models\TransactionV2;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\{Select, TextInput, Textarea, Hidden};
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionV2Resource extends Resource
{
    protected static ?string $model = TransactionV2::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Transaksi Dll.';

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function form(Form $form): Form
    {
        

return $form
            ->schema([

           Select::make('customer_id')
    ->label('Nama Pembeli')
    ->options(function () {
        $pembeliIds = Keranjang::pluck('id_pembeli')->unique();
        return Customer::whereIn('id', $pembeliIds)->pluck('nama_pembeli', 'id');
    })
    ->searchable()
    ->required()
    ->reactive()
    ->afterStateUpdated(function ($state, callable $set) {
        // Isi total
        $keranjangs = Keranjang::with('produk')
            ->where('id_pembeli', $state)
            ->get();

        $total = $keranjangs->sum(function ($item) {
            return $item->jumlah_beli * ($item->produk->harga ?? 0);
        });

        $set('total', $total);
        // Isi alamat otomatis
        $customer = Customer::find($state);
        $set('address', $customer?->alamat_pembeli);
    }),


    
    // Select::make('customer_id')
    //     ->label('Nama Pembeli')
    //     ->options(\App\Models\Customer::all()->pluck('nama_pembeli', 'id'))
    //     ->searchable()
    //     ->required()
    //     ->reactive()
    //     ->afterStateUpdated(function ($state, callable $set) {
    //         // Cari keranjang milik pembeli ini
    //         $keranjangs = \App\Models\Keranjang::with('produk')
    //             ->where('id_pembeli', $state)
    //             ->get();

    //         // Hitung total = jumlah_beli * harga
    //         $total = $keranjangs->sum(function ($item) {
    //             return $item->jumlah_beli * ($item->produk->harga ?? 0);
    //         });

    //         $set('total', $total);
    //     }),

    TextInput::make('invoice')
        ->label('Kode Invoice')
        ->required(),

Textarea::make('address')
    ->label('Alamat Pembeli')
    ->required()
    ->rows(2),

    TextInput::make('total')
        ->label('Total Bayar')
        ->numeric()
        ->disabled()
        ->dehydrated(), // penting: tetap disimpan

    Select::make('status')
    ->label('Status')
    ->options([
        'pending' => 'Pending',
        'success' => 'Success',
        'expired' => 'Expired',
        'failed'  => 'Failed',
    ])
    ->default('pending')
    ->required(),
]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('invoice')->searchable(),
            Tables\Columns\TextColumn::make('customer.nama_pembeli')->searchable(),
            Tables\Columns\TextColumn::make('total')->money('IDR', locale: 'id'),
            Tables\Columns\TextColumn::make('status')->badge()
            ->color(fn(string $state): string => match ($state) {
                'pending' => 'warning',
                'success' => 'success',
                'expired' => 'gray',
                'failed' => 'danger',
            }),
            
            Tables\Columns\TextColumn::make('created_at')
            ->label('Dibuat Pada')
            ->dateTime('l, d M Y, H:i'),

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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactionV2S::route('/'),
            'view'  => Pages\ViewTransaction::route('/{record}'),
            // 'create' => Pages\CreateTransactionV2::route('/create'),
            // 'edit' => Pages\EditTransactionV2::route('/{record}/edit'),
        ];
    }
}
