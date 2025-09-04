<?php
namespace App\Filament\Resources;

use App\Filament\Resources\WhyUsResource\Pages;
use App\Models\WhyUs;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class WhyUsResource extends Resource
{
    protected static ?string $model = WhyUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Home Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TranslatableContainer::make(
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                ),
                TextInput::make("icon")
                    ->required(),
                TranslatableContainer::make(
                    RichEditor::make('content')
                        ->required()
                        ->maxLength(255)
                )->columnSpan(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('content')
                    ->label("content")
                    ->limit(50)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('icon'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index'  => Pages\ListWhyUs::route('/'),
            'create' => Pages\CreateWhyUs::route('/create'),
            'edit'   => Pages\EditWhyUs::route('/{record}/edit'),
        ];
    }
}
