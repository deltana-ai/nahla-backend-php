<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanResource\Pages;
use App\Filament\Resources\PlanResource\RelationManagers;
use App\Models\Plan;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlanResource extends Resource
{
    protected static ?string $model = Plan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('label')
                    ->required()
                    ->label('نوع الباقة')
                    ->options([
                        'عادي' => 'عادي',
                        'مميز' => 'مميز',
                        'الأفضل' => 'الأفضل',
                    ])
                    ->native(false)
                    ->searchable(),
                TextInput::make('title')->required()->label('عنوان الباقة'),
                TextInput::make('monthly_price')->required()->label('السعر الشهري'),
                TextInput::make('yearly_price')->required()->label('السعر السنوي'),
                Repeater::make('features')
                    ->schema([
                        TextInput::make('text')->label('الميزة'),
                        Select::make('enabled')
                            ->label('مفعلة؟')
                            ->options([
                                true => 'نعم',
                                false => 'لا',
                            ])
                            ->required(),
                    ])
                    ->label('المميزات')
                    ->minItems(1)
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')->label('العلامة'),
                TextColumn::make('title')->label('عنوان الباقة'),
                TextColumn::make('monthly_price')->label('شهرياً'),
                TextColumn::make('yearly_price')->label('سنوياً'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlans::route('/'),
            'create' => Pages\CreatePlan::route('/create'),
            'edit' => Pages\EditPlan::route('/{record}/edit'),
        ];
    }
}
