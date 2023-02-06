<?php


class SignupContr extends databaseConnect {

    public function setUser($username, $email, $password) {
        $statement = $this->connect()->prepare('INSERT INTO users (name, password, email) VALUES (?,?,?);');

        $encrypt = password_hash($password, PASSWORD_DEFAULT);

        if (!$statement->execute(array($username, $encrypt, $email))) {
            $statement = null;
            echo "Sign Up error!";
        };

        
    } 
    
    public function checkUser($username, $email) {
        $statement = $this->connect()->prepare('SELECT username FROM users WHERE name = ? OR email = ?');
        if (!$statement->execute(array($username, $email))) {
            $statement = null;
            echo "Sign Up error!";
        };

        $resultCheck;
        
        if(!$statement -> rowCount() > 0) {
            $resultCheck = false;
        } else { 
            $resultCheck = true;
        };

        return $resultcheck;
    }    

}