<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UploadBookResource\Pages;
use App\Filament\Resources\UploadBookResource\RelationManagers;
use App\Models\UploadBook;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UploadBookResource extends Resource
{
    protected static ?string $model = UploadBook::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Management File';
    protected static ?string $navigationLabel = 'File Book';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_buku')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('file_buku')
                    ->directory('img-store/file')
                    ->required(),
                Forms\Components\FileUpload::make('image_buku')
                    ->image()
                    ->directory('img-store/image')
                    ->required(),
                Forms\Components\TextInput::make('kategori')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('deskripsi_buku')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_buku')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_buku'),
                Tables\Columns\ImageColumn::make('image_buku'),
                Tables\Columns\TextColumn::make('kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi_buku')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUploadBooks::route('/'),
            'create' => Pages\CreateUploadBook::route('/create'),
            'view' => Pages\ViewUploadBook::route('/{record}'),
            'edit' => Pages\EditUploadBook::route('/{record}/edit'),
        ];
    }
}
