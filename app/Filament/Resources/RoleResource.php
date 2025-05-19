<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Modules\Core\Entities\Role;
use Modules\Core\Entities\Permission;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-finger-print';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                TextInput::make('name')
                    ->minLength(2)
                    ->maxLength(255)
                    ->required()
                    ->unique(ignoreRecord: true),
            ]),

            Grid::make(4)->schema(self::getPermissionGroupCards()),
        ]);
    }

protected static function getPermissionGroupCards(): array
{
    $groupedPermissions = Permission::all()->groupBy('group');

    return [
        Grid::make(4) // 4 columns per row
            ->schema(
                $groupedPermissions->map(function ($permissions, $groupName) {
                    return Card::make()
                        ->schema([
                            CheckboxList::make('permissions')
                                ->label($groupName)
                                ->relationship('permissions', 'name')
                                ->options($permissions->pluck('label', 'id')->toArray())
                                ->columns(2),
                        ])
                        ->columnSpan(1); // Each card takes up 1 column
                })->values()->toArray()
            ),
    ];
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make()
                ->visible(fn () => auth()->user()->can('dashboard.user_management.roles.delete')),
                            
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
{
    
    return auth()->user()?->can('dashboard.user_management.roles.view');
}

}
