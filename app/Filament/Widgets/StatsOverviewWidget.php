<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Book;
use App\Models\Category;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Books', Book::count())
            ->description('All books currently in the library')
            ->descriptionIcon('heroicon-m-book-open')
            ->color('success'),
            Stat::make('Total Authors', Author::count()),
            Stat::make('Total Categories', Category::count()),
        ];
    }
}
