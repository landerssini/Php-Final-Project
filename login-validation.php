<?php

    include_once("db.php");

    $user = $POST_["user"];
    $email = $POST_["email"];
    $password = $POST_["password"];

    class Login extends Connection  {
        
        public function login($user, $email, $pass) {
            $conexion = parent::connect();
            $sql = "SELECT * FROM users WHERE email = '$user'";
            $answer = mysqli_query($conexion, $sql);
            $passwordHashed = mysqli_fetch_array($answer)["password"];
            
            if (password_verify($password, $passwordHashed)) {
                return true;
                
            }
        }
    }

    if (login($user, $email, $password)) {
        header("location:userpanel.php");
    } else {
        echo "wrong password"; 
    };
        
    

    

        




