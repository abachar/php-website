<?php

/**
 * Class Competence Group
 */
class CompetenceGroup {

	public $name;
	public $competences;
	
    function __construct($name, $competences = null) {
        $this->name  = $name;
        $this->level = $level;
        $this->competences = $competences;
    }
}

/**
 * Class Competence
 */
class Competence {

	public $name;
	public $level;
	public $competences;
	
    function __construct($name, $level, $competences = null) {
        $this->name  = $name;
        $this->level = $level;
        $this->competences = $competences;
    }
}