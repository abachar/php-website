<?php

/**
 * Class Language
 */
class Language {

    public $language;
    public $level;

    function __construct($language, $level) {
        $this->language = $language;
        $this->level = $level;
    }
}