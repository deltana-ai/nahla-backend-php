<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebResource\Pages;
use App\Filament\Resources\WebResource\RelationManagers;
use App\Models\Web;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebResource extends Resource
{
    protected static ?string $model = Web::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->label('القسم'),
                TextInput::make('name')->required()->label('اسم الموقع'),
                TextInput::make('domin')->label('الدومين'),
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('webs')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')->label('القسم'),
                Tables\Columns\TextColumn::make('name')->label('اسم الموقع'),
                Tables\Columns\TextColumn::make('domin')->label('الدومين'),
                Tables\Columns\ImageColumn::make('image')->disk('public')->label('صورة'),
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
            'index' => Pages\ListWebs::route('/'),
            'create' => Pages\CreateWeb::route('/create'),
            'edit' => Pages\EditWeb::route('/{record}/edit'),
        ];
    }
}
