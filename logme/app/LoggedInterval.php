<?php
/**
 * Created by PhpStorm.
 * User: danielbaeck
 * Date: 12.10.15
 * Time: 15:41
 */

namespace App;


class LoggedInterval {
    public $seconds;
    public $start;
    public $stop;

    public function __construct($start, $stop, $seconds)
    {
        $this->seconds = $seconds;
        $this->start = $start;
        $this->stop = $stop;
    }
}