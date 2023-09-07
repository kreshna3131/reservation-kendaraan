<?php

use Carbon\Carbon;

if (! function_exists('formatDate')) {
    /**
     * Custom format date
     *
     * @param string $date
     * @param string $format
     *
     * @return string
     */
    function formatDate($date, $format)
    {
        if (!$date) {
            return "";
        }

        return Carbon::parse($date)->translatedFormat($format);
    }
}

if (! function_exists('formatFromTo')) {
    /**
     * Format date to time stamp
     *
     * @param string $date
     * @param string $format_from
     * @param string $format_to
     *
     * @return string
     */
    function formatFromTo($date, $format_from, $format_to)
    {
        if (!$date) {
            return "";
        }

        try {
            $date = Carbon::createFromLocaleFormat($format_from, config('app.locale'), $date)->translatedFormat($format_to);

            return $date;
        } catch (\Throwable $th) {
            return "";
        }
    }
}

if (!function_exists('rupiah')) {
    /**
     * @param  float $angka
     * @param  bool $prefix
     * @return string
     */
    function rupiah($angka, $prefix = true)
    {
        if (is_null($angka)) {
            return null;
        }

        if ($prefix) {
            $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
            return $hasil_rupiah;
        }

        $hasil_rupiah = number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
}

if (!function_exists('calculatePercentageProgressBar')) {
    function calculatePercentageProgressBar($value)
    {
        $minPercent = 0.5;
        $maxPercent = 100;

        if ($value == 0) {
            return $minPercent;
        }

        $percentage = 100 - 100 / (30 / $value);

        if ($percentage < $minPercent) {
            return $minPercent;
        }

        if ($percentage > $maxPercent) {
            return $maxPercent;
        }

        return $percentage;
    }
}