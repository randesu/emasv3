<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailKeranjangResource\Pages;
use App\Filament\Resources\DetailKeranjangResource\RelationManagers;
use App\Models\DetailKeranjang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailKeranjangResource extends Resource
{
    protected static ?string $model = DetailKeranjang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    
    protected static ?string $navigationGroup = 'Master Data';

    public static function getNavigationSort(): ?int
    {
        return 6;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\ListDetailKeranjangs::route('/'),
            'create' => Pages\CreateDetailKeranjang::route('/create'),
            'edit' => Pages\EditDetailKeranjang::route('/{record}/edit'),
        ];
    }
}
