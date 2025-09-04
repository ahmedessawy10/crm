<?php
namespace App\Filament\Resources;

use App\Filament\Resources\RequestJoinResource\Pages;
use App\Models\RequestJoin;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class RequestJoinResource extends Resource
{
    protected static ?string $model = RequestJoin::class;

    protected static ?string $navigationIcon  = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'requests';

    public static function getNavigationBadge(): ?string
    {
        // Count unread goals (example)
        return \App\Models\RequestJoin::where('is_read', false)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("brand_name"),
                TextColumn::make("email"),
                TextColumn::make("phone"),
                TextColumn::make("website_url"),
                ToggleColumn::make("is_read"),
                TextColumn::make("note"),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageRequestJoins::route('/'),
        ];
    }
}
