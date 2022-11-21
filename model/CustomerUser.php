<?php
include_once __DIR__ . "/User.php";

class Customer extends User {

    private $contactnumber;
    private $dob;
    public function __construct($contactnumber, $dob, $id, $firstname, $lastname, $email, $password) {
        $this->contactnumber = $contactnumber;
        $this->dob = $dob;
    }

    public function getContactnumber()
    {
        return $this->contactnumber;
    }

    public function setContactnumber($contactnumber)
    {
        $this->contactnumber = $contactnumber;

        return $this;
    }

    public function getDob()
    {
        return $this->dob;
    }

    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }
}