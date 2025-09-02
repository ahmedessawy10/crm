<?php
namespace App\Filament\Resources\ProgramResource\RelationManagers;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class GoalsRelationManager extends RelationManager
{
    protected static string $relationship = 'goals';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
