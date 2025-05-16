<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardinghouseResource\Pages;
use App\Filament\Resources\BoardinghouseResource\RelationManagers;
use App\Models\Boardinghouse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BoardinghouseResource extends Resource
{
    protected static ?string $model = Boardinghouse::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Tabs::make('Tabs')
            ->tabs([
                Forms\Components\Tabs\Tab::make('informasi umum')
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                        ->image()
                        ->directory('boarding_house')
                        ->required(),
                Forms\Components\TextInput::make('name')
                ->required()
                ->debounce(500)
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set){
                    $set('slug', Str::slug($state));
                }),
                Forms\Components\TextInput::make('slug')
                ->required(),
                Forms\Components\Select::make('city_id')
                ->relationship('city', 'name')
                ->required(),
                Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),
                Forms\Components\RichEditor::make('description')
                ->required(),
                Forms\Components\TextInput::make('price')
                ->numeric()
                ->prefix('IDR')
                ->required(),
                Forms\Components\TextArea::make('address')
                ->required(),
            ]),
               
                    
                
           
                    ])->columnSpan(2)
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
            'index' => Pages\ListBoardinghouses::route('/'),
            'create' => Pages\CreateBoardinghouse::route('/create'),
            'edit' => Pages\EditBoardinghouse::route('/{record}/edit'),
        ];
    }
}
