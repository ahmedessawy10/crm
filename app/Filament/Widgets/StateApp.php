<?php
namespace App\Filament\Widgets;

use App\Models\ContactMessage;
use App\Models\PageVisit;
use App\Models\Program;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StateApp extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('total Visits', PageVisit::where("page", "home")->first()?->visits)
                ->description('customer visits  home page ')
                ->descriptionIcon('heroicon-m-magnifying-glass', IconPosition::Before)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),

            Stat::make('total customer', ContactMessage::count())
                ->description('customer in contact message')
                ->descriptionIcon('heroicon-m-users', IconPosition::Before)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('total programs', Program::count())
                ->description('programs')
                ->descriptionIcon('heroicon-m-book-open', IconPosition::Before)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('gray'),

        ];
    }
}
