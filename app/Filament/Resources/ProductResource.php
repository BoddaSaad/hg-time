<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $slug = 'products';

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()->schema([
                    TextInput::make('title')
                        ->required(),

                    RichEditor::make('description')
                        ->fileAttachmentsDirectory('attachments')
                        ->required(),

                    SpatieMediaLibraryFileUpload::make('gallery')
                        ->reorderable()
                        ->openable()
                        ->appendFiles()
                        ->multiple()->panelLayout('grid'),

                    RichEditor::make('return_policy')
                        ->fileAttachmentsDirectory('attachments'),

                    Toggle::make('active')->default(true),
                ])->columnSpan(2),

                Section::make()->schema([
                    Group::make()->schema([
                        TextInput::make('price')
                            ->required()
                            ->numeric(),

                        TextInput::make('quantity')
                            ->required()
                            ->default(1)
                            ->numeric()
                            ->minValue(1)
                            ->integer(),

                        TextInput::make('discount')
                            ->numeric(),

                        Select::make('discount_type')
                            ->options([
                                'percentage' => 'Percentage',
                                'fixed' => 'Fixed',
                            ]),
                    ])->columns(2)->columnSpanFull(),

                    Group::make()->schema([
                        Select::make('brand_id')
                            ->relationship('brand', 'name')
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                                SpatieMediaLibraryFileUpload::make('logo')
                                    ->avatar()
                                    ->image(),
                            ])
                            ->searchable(),

                        Select::make('categories')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->searchable(),
                    ]),
                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('price')->sortable(),

                TextColumn::make('discount'),

                TextColumn::make('discount_type'),

                TextColumn::make('quantity')->sortable(),

                ToggleColumn::make('active')->sortable(),

                TextColumn::make('brand.name')
                    ->searchable(),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['brand']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'brand.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->brand) {
            $details['Brand'] = $record->brand->name;
        }

        return $details;
    }
}
