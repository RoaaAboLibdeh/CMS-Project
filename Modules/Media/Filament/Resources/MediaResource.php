<?php

namespace Modules\Media\Filament\Resources;

use Modules\Media\Filament\Resources\Pages;
use App\Filament\Resources\MediaResource\RelationManagers;
use Modules\Media\Entities\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $navigationLabel = 'Media Library';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('file_name')
                    ->label('Preview')
                    ->getStateUsing(fn($record) => $record->getFullUrl())
                    ->square(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('mime_type'),
                Tables\Columns\TextColumn::make('size')->label('Size (KB)'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('file')
                ->label('Upload Media')
                ->directory('uploads')
                ->image()
                ->multiple()
                ->maxSize(2048),
        ]);
    }

     public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
   
