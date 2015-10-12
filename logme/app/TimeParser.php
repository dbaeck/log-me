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

    protected $parts;

    public function __construct($parts)
    {
        $this->parts = $parts;
    }

    public function parse()
    {
        //CarbonInterval does not allow 0 second intervals at the moment

        $end = Carbon::now();
        $start = clone $end;

        foreach($this->parts as $part) {
            $start->sub(CarbonInterval::createFromDateString($part));
        }

        $seconds = $end->getTimestamp() - $start->getTimestamp();
        return new LoggedInterval($start, $end, $seconds);
    }
}