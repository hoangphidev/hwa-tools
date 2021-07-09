<?php

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Current Datetime = current_day | current_month | current_year | current_date
|--------------------------------------------------------------------------
*/

if (!function_exists('current_day')) {

    /**
     * Current day
     *
     * @return int
     */
    function current_day()
    {
        return Carbon::now()->day;
    }
}

if (!function_exists('current_month')) {

    /**
     * Current month
     *
     * @return int
     */
    function current_month()
    {
        return Carbon::now()->month;
    }
}

if (!function_exists('current_year')) {

    /**
     * Current year
     *
     * @return int
     */
    function current_year()
    {
        return Carbon::now()->year;
    }
}

if (!function_exists('current_date')) {

    /**
     * Current date
     *
     * @param string $format
     * @return int
     */
    function current_date($format = 'Y-m-d H:i:s')
    {
        return Carbon::now()->format($format);
    }
}

/*
|--------------------------------------------------------------------------
| Custom Datetime = custom_date
|--------------------------------------------------------------------------
*/

if (!function_exists('custom_date')) {

    /**
     * Customer date
     *
     * @param $date
     * @param string $format
     * @param null $locale
     * @return string
     */
    function custom_date($date, $format = 'H:i:s d/m/Y', $locale = null)
    {
        if (isset($locale) && !is_null($locale))
            return ((Carbon::parse($date)->diffInDays(Carbon::now())) < 3) ? Carbon::parse($date)->locale($locale)->diffForHumans() : Carbon::parse($date)->format($format);
        return Carbon::parse($date)->format($format);
    }
}
