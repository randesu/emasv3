<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    
    protected static ?string $navigationGroup = 'Master Data';

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\TextInput::make('nama_pembeli')
                        ->label('Nama Pembeli')
                        ->placeholder('Masukkan nama lengkap')
                        ->required(),

                    Forms\Components\TextInput::make('username_pembeli')
                        ->label('Username')
                        ->placeholder('Masukkan username')
                        ->required(),

                    Forms\Components\TextInput::make('password_pembeli')
                        ->label('Password')
                        ->placeholder('Masukkan password')
                        ->password()
                        ->required(),

                    Forms\Components\Textarea::make('alamat_pembeli')
                        ->label('Alamat')
                        ->placeholder('Masukkan alamat lengkap')
                        ->rows(3)
                        ->required(),

                    Forms\Components\TextInput::make('no_hp')
                        ->label('No HP')
                        ->placeholder('Masukkan nomor HP')
                        ->numeric()
                        ->tel()
                        ->required(),
                ]),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('nama_pembeli')
                ->label('Nama Pembeli')
                ->searchable()
                ->sortable(),

            TextColumn::make('username_pembeli')
                ->label('Username')
                ->searchable()
                ->sortable(),

            TextColumn::make('alamat_pembeli')
                ->label('Alamat')
                ->limit(30),

            TextColumn::make('no_hp')
                ->label('No HP')
                ->searchable(),

            TextColumn::make('created_at')
                ->label('Tanggal Daftar')
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
        // Tambahkan relasi ke transaksi, keranjang, atau lainnya jika diperlukan
    ];
}

public static function getPages(): array
{
    return [
        'index' => Pages\ListCustomers::route('/'),
        'create' => Pages\CreateCustomer::route('/create'),
        'edit' => Pages\EditCustomer::route('/{record}/edit'),
    ];
}
}