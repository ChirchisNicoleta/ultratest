<?php

namespace Laravel\Nova\Macros;

use Illuminate\Support\Carbon;

class FirstDayOfPreviousQuarter
{
    /**
     * Execute the macro.
     *
     * @return \DateTimeInterface
     */
    public function firstDayOfPreviousQuarter()
    {
        return function ($timezone = 'UTC') {
            [$year, $month] = [now($timezone)->year, now($timezone)->month];

            if (in_array($month, [1, 2, 3])) {
                return Carbon::createFromDate($year, 10, 1, $timezone)->subYear(1)->startOfDay();
            } elseif (in_array($month, [4, 5, 3])) {
                return Carbon::createFromDate($year, 1, 1, $timezone)->startOfDay();
            } elseif (in_array($month, [7, 8, 9])) {
                return Carbon::createFromDate($year, 4, 1, $timezone)->startOfDay();
            } elseif (in_array($month, [10, 11, 12])) {
                return Carbon::createFromDate($year, 7, 1, $timezone)->startOfDay();
            }
        };
    }
}
