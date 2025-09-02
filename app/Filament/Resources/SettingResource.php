<?php
namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon        = 'heroicon-o-cog-8-tooth';
    protected static ?string $navigationLabel       = 'Settings';
    protected static ?string $pluralModelLabel      = 'Settings';
    protected static ?string $slug                  = 'settings';
    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('General Settings')
                ->description('Basic application information.')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TranslatableContainer::make(
                                TextInput::make('app_name')
                                    ->label('App Name')
                                    ->maxLength(255)
                                    ->required()
                            )
                                ->label('App Name'),

                            FileUpload::make('logo')
                                ->label('Logo')
                                ->image()
                                ->imageEditor()
                                ->columnSpan(1),
                        ]),
                    Select::make('default_language')
                        ->label('Default Language')
                        ->options([
                            'en' => 'English',
                            'ar' => 'Arabic',
                        ])
                        ->required(),
                ])
                ->columns(1)
                ->collapsible(),

            Section::make('About Us')
                ->description('This is shown in the About Us section of your app.')
                ->schema([
                    TranslatableContainer::make(
                        RichEditor::make('about_us')
                            ->label('About Us')
                            ->maxLength(1000)
                            ->required()
                    )
                        ->label('About Us'),
                ])
                ->collapsible(),
        ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        // No table is needed for singleton resource.
        return $table
            ->columns([])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            // Route root to edit page directly (singleton pattern)
            // 'edit'  => Pages\EditSetting::route('/{record}/edit'),
            'index' => Pages\EditSetting::route("/settings/edit"),
            'edit'  => Pages\EditSetting::route('/'),

        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

}
