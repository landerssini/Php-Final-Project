<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

    include_once("db.php");

    $user = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    class Login extends Connection  {
        
        public function login($user, $email, $password) {
            $conexion = parent::connect();
            $passwordHashed = "";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $answer = mysqli_query($conexion, $sql);
            $passwordHashed = mysqli_fetch_array($answer)["password"];
            
            if (password_verify($password, $passwordHashed)) {
                session_start();
                $_SESSION["currentUser"] = $email;
                return true;
            }
        }
    }

    $auth = new Login();

    if ($auth->login($user, $email, $password)) {
        header("location:userpanel.php");
    } else {
        echo "wrong credentials"; 
    };
        
    

    

        




