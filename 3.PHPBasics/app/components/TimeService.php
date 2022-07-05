<?php

/**
 * class TimeService
 */
class TimeService {

    private $startTime;

    /**
     * @param string $timezone
     */
    public function __construct(string $timezone = 'Etc/GMT-3') {
        date_default_timezone_set($timezone);
        $this->startTime = $this->getCurrentTime();
    }

    /**
     * @return array|float|int|int[]
     */
    public function getSpentTime() {
        return $this->getCurrentTime() - $this->startTime;
    }

    /**
     * @return string
     */
    public function getFormattedSpentTime() {
        return $this->getSpentTime()/1e+6 . 'ms';
    }

    /**
     * @return string
     */
    public function getCurrentFormattedDataTime() {
        return strftime('%Y-%m-%d %H:%M:%S', microtime(true));
    }

    /**
     * @return array|false|float|int|int[]
     */
    public function getCurrentTime(){
        return hrtime(true);
    }
}