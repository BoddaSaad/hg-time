<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\Product;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->disabled()
                    ->required()
                    ->unique(Product::class, 'slug', fn($record) => $record),

                TextInput::make('description')
                    ->required(),

                TextInput::make('price')
                    ->required()
                    ->numeric(),

                TextInput::make('discount')
                    ->required()
                    ->numeric(),

                TextInput::make('discount_type')
                    ->required(),

                TextInput::make('quantity')
                    ->required()
                    ->integer(),

                Checkbox::make('active'),

                Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->searchable(),

                TextInput::make('return_policy'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description'),

                TextColumn::make('price'),

                TextColumn::make('discount'),

                TextColumn::make('discount_type'),

                TextColumn::make('quantity'),

                TextColumn::make('active'),

                TextColumn::make('brand.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('return_policy'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
