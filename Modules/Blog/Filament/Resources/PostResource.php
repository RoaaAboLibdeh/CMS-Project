<?php

namespace Modules\Blog\Filament\Resources;

use Modules\Blog\Filament\Resources\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use Modules\Blog\Entities\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
            return $form->schema([
        Forms\Components\TextInput::make('title')
            ->required()
            ->reactive()
            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Str::slug($state))),
        Forms\Components\TextInput::make('slug')->required(),
        Forms\Components\Select::make('category_id')
            ->label('Category')
            ->options(\Modules\Category\Entities\Category::pluck('name', 'id'))
            ->searchable(),
        Forms\Components\FileUpload::make('featured_image')
            ->image()
            ->directory('posts')
            ->imagePreviewHeight('150'),
        Forms\Components\RichEditor::make('content')->required()->columnSpan('full'),
        Forms\Components\Select::make('status')
            ->options([
                'draft' => 'Draft',
                'published' => 'Published'
            ])
            ->default('draft'),
        Forms\Components\DateTimePicker::make('published_at')
            ->label('Publish Date'),
        Forms\Components\Section::make('SEO Settings')->schema([
            Forms\Components\TextInput::make('meta_title'),
            Forms\Components\Textarea::make('meta_description'),
        ])->collapsed(),
    ])->columns(2);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
