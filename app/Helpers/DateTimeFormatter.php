<?php

use Illuminate\Support\Carbon;

/**
 * Nicely formats date/time.
 */
if (!function_exists('formatDateTime')) {
    function formatDateTime($dateTime, $format = 'F j, Y g:i A')
    {
        return Carbon::parse($dateTime)->format($format);
    }
}
