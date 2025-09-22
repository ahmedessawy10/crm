<?php
namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\SettingResource\Pages;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon  = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make("base setting")->schema([
                    TranslatableContainer::make(
                        TextInput::make('app_name')
                            ->required()
                            ->maxLength(255)
                    ),

                    TranslatableContainer::make(
                        Textarea::make('about_us')
                            ->required()
                    ),
                    TranslatableContainer::make(
                        TextInput::make('address')
                            ->required()
                    ),

                    Forms\Components\TextInput::make('default_language')
                        ->required()
                        ->maxLength(255),
                    FileUpload::make('logo')
                        ->image(),
                ]),
                Section::make("social media")->schema([
                    Forms\Components\TextInput::make('facebook_url')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('twitter_url')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('youtube_url')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('instagram_url')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('snapchat_url')
                        ->maxLength(255),

                ])
                ,
                Section::make("About us")->schema([
                    // TranslatableContainer::make(
                    //     Textarea::make('about_us')
                    //         ->required()
                    // ),
                    FileUpload::make('about_us_image')
                        ->image(),
                ]),
                Section::make("Why us")->schema([
                    FileUpload::make('why_us_image')
                        ->image(),
                ]),

                Section::make("contact info")->schema([
                    // TranslatableContainer::make(
                    //     TextInput::make('address')
                    //         ->required()
                    // ),
                    TextInput::make('phone')
                        ->tel()
                        ->maxLength(20),

                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo'),
                Tables\Columns\TextColumn::make('default_language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('snapchat_url')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('about_us_image'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSettings::route('/'),
            // 'create' => Pages\CreateSetting::route('/create'),
            'edit'  => Pages\EditSetting::route('/{record}/edit'),
        ];
    }

}
