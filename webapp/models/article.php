<?php

/**
 * Class Article
 */
class Article {

    public $code;
    public $date;
    public $author;
    public $title;
    public $description;
    public $printable;
    public $draft;

    function __construct($code, $date, $title, $description, $printable = true, $draft = true, $author = "Abdelhakim Bachar") {
        $this->code = $code;
        $this->date = $date;
        $this->author = $author;
        $this->title = $title;
        $this->description = $description;
        $this->printable = $printable;
        $this->draft = $draft;
    }
}