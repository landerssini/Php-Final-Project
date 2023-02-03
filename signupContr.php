<?php


class SignupContr {
    private $username;
    private $email;
    private $password;
    private $passwordRepeat;


    public function __construct($username,$email,$password,$passwordRepeat) {
        $this->username = $username,
        $this->email = $email,
        $this->username = $password,
        $this->passwordRepeat = $passwordRepeat,
    }
    

    public function allChecks() {
        if($this->emptyInput() == false) {
            echo "Blank space!";
            exit();
        }
        
        if($this->strangeCharacters() == false) {
            echo "Strange character found!";
            exit();
        }

        if($this->invalidEmail() == false) {
            echo "Invalid Email!";
            exit();
        }

        if($this->passwordMatch() == false) {
            echo "Password not matching!";
            exit();
        }

        if($this->checkUser() == false) {
            echo "Error checking user!";
            exit();
        }

        $this->setUser($this->username, $this->email, $this->passwordRepeat);
    }

    private function emptyInput() {
        $result;
        if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat)) {
            $result = false;
        } else {
            $result = true;
        }
         return result;
        }

    private function strangeCharacters() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        } else {
            $result = true;
        }
         return result;
        }

    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
         return result;
        } 

    private function passwordMatch() {
        $result;
        if(!$this->password == $this->passwordRepeat) {
            $result = false;
        } else {
            $result = true;
        }
         return result;
        }

    private function checkUser() {
        $result;
        if(!$this->checkUser($this->username,$this->password)) {
            $result = false;
        } else {
            $result = true;
        }
         return result;
        }    
        
        

}