<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhislistResource\Pages;
use App\Filament\Resources\WhislistResource\RelationManagers;
use App\Models\Whislist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WhislistResource extends Resource
{
    protected static ?string $model = Whislist::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('id_pembeli')
                            ->label('ID Pembeli')
                            ->numeric()
                            ->required(),
    
                        Forms\Components\TextInput::make('id_produk')
                            ->label('ID Produk')
                            ->numeric()
                            ->required(),
                    ]),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            'index' => Pages\ListWhislists::route('/'),
            'create' => Pages\CreateWhislist::route('/create'),
            'edit' => Pages\EditWhislist::route('/{record}/edit'),
        ];
    }
}
