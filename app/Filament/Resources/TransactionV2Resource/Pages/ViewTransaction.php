<?php

namespace App\Filament\Resources\TransactionV2Resource\Pages;

use App\Filament\Resources\TransactionV2Resource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Card;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Grid;

class ViewTransaction extends ViewRecord
{
    protected static string $resource = TransactionV2Resource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([                

                // General Information
                Card::make([
                    TextEntry::make('invoice')->label('Invoice'),
                    TextEntry::make('status')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'pending' => 'warning',
                            'success' => 'success',
                            'expired' => 'gray',
                            'failed' => 'danger',
                            'sedang dibungkus' => 'Sedang Dibungkus',
                            'sedang dikirim' => 'Sedang Dikirim',
                        }),
                    TextEntry::make('created_at')->label('Created At'),
                ])->columns(3),

                // Customer Information
                Card::make([
                    TextEntry::make('customer.nama_pembeli')->label('Customer Name'),
                    // TextEntry::make('customer.email')->label('Email Address'),
                    TextEntry::make('address')->label('Address'),
                ])->columns(3),

                // Ongkos Kirim
                // Card::make([
                //     TextEntry::make('shipping.shipping_courier')->label('Jasa Kirim'),
                //     TextEntry::make('shipping.shipping_service')->label('Layanan Kirim'),
                //     TextEntry::make('shipping.shipping_cost')->label('Ongkos Kirim')->numeric(decimalPlaces: 0)->money('IDR', locale: 'id'),
                // ])->columns(3),

               // Transaction Details
                Card::make([
                    RepeatableEntry::make('TransactionDetails')
                        ->label('Items Details')
                        ->schema([
                            ImageEntry::make('produk.linkgambar')->label('Product Image')->circular()->width(100)->height(100),
                            TextEntry::make('produk.nama_produk')->label('Product Name'),
                            TextEntry::make('qty')->label('Quantity'),
                            TextEntry::make('produk.harga')->label('harga')->numeric(decimalPlaces: 0)->money('IDR', locale: 'id'),
                        ])
                        ->columns(4),
                ]),
                Card::make([
                    // Buat container grid untuk alignment
                    Grid::make(1)
                        ->schema([
                            TextEntry::make('total')
                                ->label('Grand Total')
                                ->numeric(decimalPlaces: 0)
                                ->money('IDR', locale: 'id')
                                ->size(TextEntry\TextEntrySize::Large)
                                ->color('primary')
                                ->alignEnd() // Align konten ke kanan
                        ])
                ])
            ]);
    }
}
