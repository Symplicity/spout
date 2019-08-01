<?php

namespace Box\Spout\Writer\Common\Creator\Style;

class DateFormatHelper
{
    public static function convertToExcelDate(\DateTime $date) : float
    {
        $year = $date->format('Y');
        $month = $date->format('m');
        $day = $date->format('d');
        $hours = $date->format('H');
        $minutes = $date->format('i');
        $seconds = $date->format('s');

        $MSEDate1900IsLeapYear = true;
        if (($year === 1900) && ($month <= 2)) {
            $MSEDate1900IsLeapYear = false;
        }

        $localDate = 2415020;

        if ($month > 2) {
            $month -= 3;
        } else {
            $month += 9;
            $year--;
        }

        $century = substr($year, 0, 2);
        $decade = substr($year, 2, 2);
        $excelDate = floor((146097 * $century) / 4) + floor((1461 * $decade) / 4) + floor((153 * $month + 2) / 5) + $day + 1721119 - $localDate + $MSEDate1900IsLeapYear;

        $excelTime = (($hours * 3600) + ($minutes * 60) + $seconds) / 86400;

        return (float) $excelDate + $excelTime;
    }
}
