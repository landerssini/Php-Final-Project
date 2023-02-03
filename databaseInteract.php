<?php


class SignupContr extends databaseConnect {

    protected function setUser($username, $password, $email) {
        $statement = $this->connect()->prepare('INSERT INTO users (username, password, email) VALUES (?,?,?);');

        $encrypt = password_hash($password, PASSWORD_DEFAULT);

        if (!$statement->execute(array($usename, $encrypt, $email))) {
            $statment = null;
            echo "Sign Up error!";
        };

        
    } 
    
    protected function checkUser($username, $email) {
        $statement = $this.connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?');
        if (!$statement->execute(array($usename, $email))) {
            $statment = null;
            echo "Sign Up error!";
        };

        $resultCheck;
        
        if($statement -> rowCount() > 0) {
            $resultCheck = false;
        } else { 
            $resultCheck = true;
        };

        return $resultcheck;
    }    

}