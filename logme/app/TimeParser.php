<?php
/**
 * Created by PhpStorm.
 * User: danielbaeck
 * Date: 12.10.15
 * Time: 14:51
 */

namespace App;

use Carbon\Carbon;
use Carbon\CarbonInterval;

class TimeParser {

    private static $convert = [
        'hours' => ['h', 'stunde', 'std', 'stunden'],
        'minutes' => ['m', 'min', 'mins', 'minuten', 'minute'],
        'seconds' => ['s', 'sec', 'secs', 'sekunden', 'sekunde'],
        'days' => ['d', 'tag', 'tage'],
        'weeks' => ['w', 'wochen', 'woche'],
        'months' => ['monat', 'monate'],
        'years' => ['y', 'yrs', 'jahr', 'jahre']
    ];

    protected $parts;

    public function __construct($parts)
    {
        $this->parts = $parts;
    }

    private function processPart($part)
    {
        $pt = $part;
        foreach(self::$convert as $std => $options)
        {
            $pt = preg_replace("/(\d+)[\ ]*(" . implode('|', $options) . ")/i", '$1 '.$std, $pt);
        }
        return $pt;
    }

    public function parse()
    {
        //CarbonInterval does not allow 0 second intervals at the moment

        $end = Carbon::now();
        $start = clone $end;

        foreach($this->parts as $part) {
            $start->sub(CarbonInterval::createFromDateString($this->processPart($part)));
        }

        $seconds = $end->getTimestamp() - $start->getTimestamp();
        return new LoggedInterval($start, $end, $seconds);
    }

    public static function getStripRegex()
    {
        $singularized = [];
        foreach(array_keys(self::$convert) as $plural)
        {
            $singularized[] = $plural;
            $singularized[] = substr($plural, 0, count($plural)-2);
        }

        return "/\d+[\ ]*(" . implode('|', $singularized) . ")/i";
    }
}