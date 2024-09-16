<?php

namespace App\Helpers;

class TimeHelper
{
    public static function formatTimeWithArabic($time)
    {
        $dateTime = new \DateTime($time);
        $formattedTime = $dateTime->format('g:i');
        $meridiem = $dateTime->format('A');

        return $meridiem === 'AM' ? $formattedTime . ' صباحا' : $formattedTime . ' مساء';
    }
}