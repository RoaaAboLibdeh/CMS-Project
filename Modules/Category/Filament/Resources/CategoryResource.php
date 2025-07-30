<?php

namespace Modules\Category\Filament\Resources;
use Modules\Category\Filament\Resources\Pages;
use Modules\Category\Filament\Resources\CategoryResource\RelationManagers;
use Modules\Category\Entities\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
       return $form->schema([
            Forms\Components\Section::make('Category Info')->schema([
        Forms\Components\TextInput::make('name')->required()->live(onBlur: true),
        Forms\Components\TextInput::make('slug')->required(),
        Forms\Components\Select::make('parent_id')
            ->label('Parent Category')
            ->options(Category::pluck('name', 'id'))
            ->searchable(),
        Forms\Components\Textarea::make('description')->rows(3),
        Forms\Components\FileUpload::make('image')
            ->label('Category Image')
            ->image()
            ->directory('categories')
            ->maxSize(2048),
        Forms\Components\Toggle::make('is_active')->label('Active')->default(true),
    ])->columns(2),

    Forms\Components\Section::make('SEO Settings')->schema([
        Forms\Components\TextInput::make('meta_title')->label('Meta Title'),
        Forms\Components\Textarea::make('meta_description')->label('Meta Description')->rows(3),
    ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('slug'),
            Tables\Columns\TextColumn::make('parent.name')->label('Parent'),
            Tables\Columns\BooleanColumn::make('is_active'),
                Tables\Columns\ImageColumn::make('image')->label('Image')->circular(),
    Tables\Columns\TextColumn::make('name'),
    Tables\Columns\TextColumn::make('slug'),
    Tables\Columns\BooleanColumn::make('is_active'),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
