<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->required(fn (string $context) => $context === 'create')
                        ->dehydrated(fn ($state) => filled($state))
                        ->maxLength(255)
                        ->afterStateHydrated(fn ($component, $record) => $component->state(''))
                        ->autocomplete('new-password')
                        ->reactive()
                        ->visibleOn('create', 'edit'),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->sortable()
                ->toggleable(),

            Tables\Columns\TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->sortable()
                ->limit(30),

            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable()
                ->sortable()
                ->copyable()
                ->copyMessage('Email copied')
                ->copyMessageDuration(1500)
                ->limit(40),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Joined')
                ->dateTime('M d, Y')
                ->sortable()
                ->toggleable(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ])
        ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
