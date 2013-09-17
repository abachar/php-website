<?php

/**
 * Class Project
 */
class Project {

    public $code;
    public $name;
    public $description;
    public $tools;
    public $images;

    function __construct($code, $name, $description, $tools, $images = null) {
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
        $this->tools = $tools;
        $this->images = $images;
    }
}