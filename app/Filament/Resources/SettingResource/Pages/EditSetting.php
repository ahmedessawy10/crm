<?php
namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class EditSetting extends Page implements HasForms
{

    use InteractsWithForms;

    protected static string $resource = SettingResource::class;

    protected static string $view = 'filament.resources.setting-resource.pages.edit-setting';
    public ?array $data           = [];
    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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
                    ])->collapsible(),
                Section::make('Social media')
                    ->description('This is shown in the About Us section of your app.')
                    ->schema([

                        TextInput::make('instagram_url')
                        // ->label('')
                        // ->maxLength()
                            ->nullable(),
                        TextInput::make('facebook_url')
                        // ->label('')
                        // ->maxLength()
                            ->nullable(),
                        TextInput::make('twitter_url_url')
                        // ->label('')
                        // ->maxLength()
                            ->nullable(),
                        TextInput::make('youtube_url')
                        // ->label('')
                        // ->maxLength()
                            ->nullable(),

                    ])
                    ->collapsible(),

            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            auth()->user()->company->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
