<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HerobannerResource\Pages;
use App\Filament\Resources\HerobannerResource\RelationManagers;
use App\Models\Herobanner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HerobannerResource extends Resource
{
    protected static ?string $model = Herobanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    
    protected static ?string $navigationGroup = 'Master Data';

    public static function getNavigationSort(): ?int
    {
        return 7;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        // Nama Banner
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Banner')
                            ->required()
                            ->maxLength(255),
    
                        // Gambar Banner
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar Banner')
                            ->image()
                            ->directory('hero-banners') // direktori penyimpanan di storage/app/public
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
            'index' => Pages\ListHerobanners::route('/'),
            'create' => Pages\CreateHerobanner::route('/create'),
            'edit' => Pages\EditHerobanner::route('/{record}/edit'),
        ];
    }
}
