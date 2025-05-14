<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Rating;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RatingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RatingResource\RelationManagers;

class RatingResource extends Resource
{
    protected static ?string $model = Rating::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

 //               use Filament\Forms;

select::make('checkout_id')
    ->label('Kode Checkout')
    ->options(\App\Models\Checkout::all()->pluck('id', 'id'))
    ->searchable()
    ->required()
    ->reactive()
    ->afterStateUpdated(function ($state, callable $set) {
        $checkout = \App\Models\Checkout::find($state);
        $set('produk_id', $checkout?->produk?->id);
        $set('pembeli_id', $checkout?->pembeli?->id);
        $set('nama_produk', $checkout?->produk?->nama_produk);
        $set('nama_pembeli', $checkout?->pembeli?->nama_pembeli);
    }),

    // Hidden field yang disimpan
Hidden::make('produk_id')->required(),
Hidden::make('pembeli_id')->required(),

// Tampil tapi tidak disimpan
TextInput::make('nama_produk')
    ->label('Nama Produk')
    ->disabled()
    ->dehydrated(false),

TextInput::make('nama_pembeli')
    ->label('Nama Pembeli')
    ->disabled()
    ->dehydrated(false),


// Input Rating
TextInput::make('rating')
    ->label('Rating')
    ->numeric()
    ->minValue(1)
    ->maxValue(5)
    ->required(),


                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                //use Filament\Tables;

Tables\Columns\TextColumn::make('checkout.id')
    ->label('Checkout'),

Tables\Columns\TextColumn::make('checkout.produk.nama_produk')
    ->label('Nama Produk')
    ->sortable()
    ->searchable(),

Tables\Columns\TextColumn::make('pembeli.nama_pembeli')
    ->label('Pembeli'),

Tables\Columns\TextColumn::make('rating')
    ->label('Rating'),

                //
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
            'index' => Pages\ListRatings::route('/'),
            'create' => Pages\CreateRating::route('/create'),
            'edit' => Pages\EditRating::route('/{record}/edit'),
        ];
    }
}
