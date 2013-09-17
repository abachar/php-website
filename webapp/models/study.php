<?php

/**
 * Class Study
 */
class Study {

    public $date;
    public $desc;
    public $grade;

    function __construct($date, $desc, $grade = null) {
        $this->date  = strtotime($date);
        $this->desc  = $desc;
        $this->grade = $grade;
    }
}