<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Forms\Form;
use App\Models\Herobanner;
use Filament\Tables\Table;
use Forms\Components\Select;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HerobannerResource\Pages;
use App\Filament\Resources\HerobannerResource\RelationManagers;

class HerobannerResource extends Resource
{
    protected static ?string $model = Herobanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    

    protected static ?string $navigationGroup = 'Tentang sistem';

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
                        // Nama Banner
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Banner')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('link_gambar')
                            ->label('Link Banner')
                            ->disabled(),
                            // ->required(),
                            

                        Forms\Components\Select::make('set_active')
                            ->label('Status banner')
                            ->required()
                            ->options([
                                'true' => 'Aktif',
                                'false' => 'Mati',
                            ]),
    
                        // Gambar Banner
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar Banner')
                            ->disk('s3')
                            ->directory('public')
                            ->visibility('public')
                            // ->image()
                            // ->directory('hero-banners') // direktori penyimpanan di storage/app/public
                            ->required(),
                    ]),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Banner')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('link_gambar')
                ->limit(40)
                ->copyable()
                ->copyableState(fn (Herobanner $record): string => "URL: {$record->link_gambar}")
                    // ->prefix('https://')
                    // ->suffix('.com')
                    ->label('Link Banner')
                    ->searchable()
                    ->sortable(),
                
                    Tables\Columns\TextColumn::make('set_active')
                    ->label('Status Banner')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        '1' => 'Aktif',
                        '0' => 'Non-Aktif',
                    }),
    
                    Tables\Columns\ImageColumn::make('gambar')
                ->disk('s3')
                    ->label('Gambar')
                    ->circular(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
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
