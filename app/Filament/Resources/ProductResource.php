<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use League\CommonMark\Extension\Table\TableRow;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Product Information')->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->unique(Product::class, 'slug', ignoreRecord: true),

                        MarkdownEditor::make('description')
                            ->columnSpanFull()
                            ->fileAttachmentsDirectory('Products'),
                    ])->columns(2),
                    
                    Section::make('Images')->schema([
                        FileUpload::make('images')
                            ->multiple()
                            ->required()
                            ->optimize('webp')
                            ->directory('Products')
                            ->maxFiles(5)
                            ->reorderable()
                    ])
                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('ProductPrice')->schema([
                        Repeater::make('New')
                        ->relationship('ProductPrice')
                        ->label('More')
                        ->schema([
                            TextInput::make('weight')
                                ->required(),
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                        ])->columns(2),   
                    ]),
                    Section::make('Status')->schema([
                        Toggle::make('is_active')
                            ->required()
                            ->default(true),

                        Toggle::make('is_featured')
                            ->required(),

                        Toggle::make('is_stack')
                            ->required()
                            ->default(true),

                        Toggle::make('on_sale')
                            ->required()
                    ])
                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                ImageColumn::make('images')
                    ->circular()
                    ->stacked()
                    ->limit(5),
                TextColumn::make('ProductPrice.weight')
                ->label('Weight')
                ->searchable(),
                TextColumn::make('ProductPrice.price')
                ->label('Price')
                ->money('BDT')
                ->numeric()
                ->searchable(),
                IconColumn::make('is_featured')
                    ->boolean()->toggleable(isToggledHiddenByDefault:true),
                IconColumn::make('is_active')
                    ->boolean(),
                IconColumn::make('on_sale')
                    ->boolean()->toggleable(isToggledHiddenByDefault:true),
                IconColumn::make('is_stack')
                    ->boolean()->toggleable(isToggledHiddenByDefault:true)
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->icon('heroicon-m-adjustments-horizontal')
                ->size(ActionSize::Small)
                ->color('primary')
                ->button()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
