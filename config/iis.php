<?php

class IIS {
    public $username;
    public $useremail;
    public $generatelimit = 0;

    function setusername($name) {
        $this->username = $name;
    }

    function getusername() {
        return $this->username;
    }

    function setuseremail($email) {
        $this->useremail = $email;
    }

    function getuseremail() {
        return $this->useremail;
    }
    
    function setgeneratelimit($limit) {
        $this->generatelimit = $limit;
    }

    function getgeneratelimit() {
        return $this->generatelimit;
    }



}


?>