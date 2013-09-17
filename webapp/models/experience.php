<?php

/**
 * Class Experience
 */
class Experience {

	public $startDate;
	public $endDate;
	public $name;
	public $desc;
	public $employer;
    public $job;
    public $roles;
    public $tools;
    public $methods;

    function __construct($startDate, $endDate, $name, $desc, $employer, $job, $roles, $tools, $methods) {
        $this->startDate  = $startDate;
        $this->endDate = $endDate;
        $this->name  = $name;
        $this->desc = $desc;
        $this->employer  = $employer;
        $this->job = $job;
        $this->roles  = $roles;
        $this->tools = $tools;
        $this->methods = $methods;
    }
}