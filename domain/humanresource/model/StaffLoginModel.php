<?php
namespace domain\humanresource\model;

class StaffLoginModel {
    private $email;
    private $password;

    public function setEmail($email) {
        $this->$email = $email;
    }

    public function getEmail() {
        return $email;
    }

    public function setPassword($password) {
        $this->$password = $password;
    }

    public function getPassword() {
        return $password;
    }
}

?>