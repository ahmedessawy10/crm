<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers\DayActivityRelationManager;
use App\Filament\Resources\ProgramResource\RelationManagers\FagsRelationManager;
use App\Filament\Resources\ProgramResource\RelationManagers\GoalsRelationManager;
use App\Filament\Resources\ProgramResource\RelationManagers\ImagesRelationManager;
use App\Models\Program;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ProgramResource extends Resource
{
    use Translatable;

    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'programs';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TranslatableContainer::make(
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                ),
                TranslatableContainer::make(
                    TextInput::make('description')
                        ->required()
                        ->maxLength(255)
                ),

                FileUpload::make('image')
                    ->image()
                    ->required()->columnSpan(2),
                FileUpload::make('background_image')
                    ->image()
                    ->nullable()->columnSpan(2),

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                // ->label(__("file.image"))
                    ->square()
                    ->size(60),

                Tables\Columns\TextColumn::make('name')
                // ->label("file.name")
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                // ->label("file.description")
                    ->limit(50)
                    ->toggleable(),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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

            GoalsRelationManager::class,
            ImagesRelationManager::class,
            DayActivityRelationManager::class,
            FagsRelationManager::class,

        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit'   => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
