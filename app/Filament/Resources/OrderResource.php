<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationLabel = 'الطلبات';
    protected static ?string $pluralLabel = 'الطلبات';
    protected static ?string $navigationGroup = 'الإدارة';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('العميل'),
                TextColumn::make('plan.title')->label('الباقة'),
                TextColumn::make('web.name')->label('الموقع')->default('-'),
                TextColumn::make('app.name')->label('التطبيق')->default('-'),
                TextColumn::make('subscription_years')->label('مدة الاشتراك')->formatStateUsing(fn($state) => match ($state) {
                    1 => 'عام',
                    2 => 'عامين',
                    default => $state . ' أعوام',
                }),
                TextColumn::make('total_price')->label('الإجمالي')->suffix(' $'),
                TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime(),
                ImageColumn::make('receipt')
                    ->label('صورة الإيصال')
                    ->disk('public')
                    ->height(50)
                    ->width(50)

            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('المستخدم')
                    ->relationship('user', 'name') // يفترض عندك علاقة user في Order
                    ->searchable()
                    ->required(),

                Select::make('web_id')
                    ->label('الموقع')
                    ->relationship('web', 'name') // يفترض عندك علاقة plan في Order
                    ->searchable()
                    ->required(),
                Select::make('plan_id')
                    ->label('الباقة')
                    ->relationship('plan', 'title') // يفترض عندك علاقة plan في Order
                    ->searchable()
                    ->required(),
                Select::make('app_id')
                    ->label('التطبيق')
                    ->relationship('app', 'name') // يفترض عندك علاقة app في Order
                    ->searchable()
                    ->nullable(),
                TextInput::make('subscription_years')->label('مدة الاشتراك'),
                TextInput::make('total_price')->label('الإجمالي'),
                TextInput::make('transfer_number'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
