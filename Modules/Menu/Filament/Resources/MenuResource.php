<?php

namespace Modules\Menu\Filament\Resources;

use Modules\Menu\Filament\Resources\Pages;


use App\Filament\Resources\MenuResource\RelationManagers;
use Modules\Menu\Entities\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3'; // Menu icon
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $navigationLabel = 'Menus'; // Name in sidebar
    protected static ?string $slug = 'menus';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Menu Title')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('url')
                ->label('Menu URL')
                ->placeholder('https://example.com or /page-slug'),

            Forms\Components\Select::make('parent_id')
                ->label('Parent Menu')
                ->options(Menu::pluck('title', 'id'))
                ->searchable()
                ->placeholder('Select parent menu')
                ->default(null),

            Forms\Components\Select::make('location')
                ->label('Menu Location')
                ->options([
                    'header' => 'Header Menu',
                    'footer' => 'Footer Menu',
                ])
                ->default('header'),

            Forms\Components\TextInput::make('sort_order')
                ->numeric()
                ->default(0),

            Forms\Components\Toggle::make('is_active')
                ->label('Active')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Menu Title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Location'),

                Tables\Columns\TextColumn::make('parent.title')
                    ->label('Parent Menu'),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),

                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Active')
                
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}