<?php

/**
 * Class PersonalCard
 */
class PersonalCard {

    public $firstName;
    public $lastName;
    public $mobile;
    public $emails;
    public $address;
    public $birthday;
    public $civil;
    public $job;
    public $jobExt;
    public $facebook;
    public $linkedin;
    public $viadeo;
    public $about;

    public $age;

    function __construct($firstName, $lastName, $mobile, $emails, $address, $birthday, $civil, $job, $jobExt, $facebook, $linkedin, $viadeo, $about) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->mobile = $mobile;
        $this->emails = $emails;
        $this->address = $address;
        $this->birthday = $birthday;
        $this->civil = $civil;
        $this->job = $job;
        $this->jobExt = $jobExt;
        $this->facebook = $facebook;
        $this->linkedin = $linkedin;
        $this->viadeo = $viadeo;
        $this->about = $about;

        $this->age = $this->calc_age($birthday);
    }

    /**
     * @param $birthday
     * @return string
     */
    private function calc_age($birthday) {
        list($day, $month, $year) = explode("/", $birthday);
        $age = date("Y") - $year;
        if (date("m") < $month) {
            $age--;
        } elseif ((date("m") == $month) && (date("d") < $day)) {
            $age--;
        }

        return $age;
    }
}