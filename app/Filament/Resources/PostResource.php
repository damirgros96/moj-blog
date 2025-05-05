<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Category; 
use App\Models\User; 
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;


class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';

    public static function form(Form $form): Form
    {
    return $form
        ->schema([
            Forms\Components\TextInput::make('title')->required(),
            
            Select::make('category_id')
                ->label('Category')
                ->relationship('category', 'name')
                ->required(),

            Select::make('user_id')
                ->label('Author')
                ->relationship('user', 'name')
                ->required(),

            FileUpload::make('image')
                ->image()
                ->directory('post-images')
                ->required(),
            

            Forms\Components\RichEditor::make('content')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')
                ->label('Title')
                ->sortable()
                ->searchable()
                ->limit(50)
                ->wrap(),

            Tables\Columns\TextColumn::make('category.name')
                ->label('Category')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('user.name')
                ->label('Author')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Created')
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
