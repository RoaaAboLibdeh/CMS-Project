<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use Modules\Core\Entities\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup ='Settings';


    

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Full Name'),

                TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255)
                    ->label('Email Address'),

                TextInput::make('password')
                    ->password()
                    ->maxLength(255)
                    ->label('Password')
                    ->required(fn($livewire) => $livewire instanceof Pages\CreateUser)
                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                    ->dehydrated(fn($state) => filled($state))
                    ->nullable(),

                Select::make('roles')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->relationship('roles', 'name')
                    ->label('Assign Roles')
                    ->getOptionLabelFromRecordUsing(fn($record) => ucfirst($record->name)),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])




            ->actions([
                EditAction::make(),
                DeleteAction::make()
                ->visible(fn () => auth()->user()->can('dashboard.user_management.users.delete')),
                            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

     public static function canAccess(): bool
{
    
    return auth()->user()?->can('dashboard.user_management.users.view');
}
}
