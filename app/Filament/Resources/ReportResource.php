<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Models\Report;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                FileUpload::make("file")->required(),
                TranslatableContainer::make(
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                ),

                TranslatableContainer::make(
                    TextInput::make('description')
                        ->nullable()
                ),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title"),
                TextColumn::make("description"),
                TextColumn::make('file')
                    ->label('File')
                    ->url(fn($record) => $record->file ? Storage::url($record->file) : null, true)
                    ->openUrlInNewTab(),

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
            'index'  => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit'   => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
