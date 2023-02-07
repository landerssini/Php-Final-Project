<?php

    include_once("./db.php");
 
    if(isset($_POST['submit-login'])){
        $email = $_POST["email"];
        $password = $_POST["password"];
    }


    class Login extends Connection  {
        
        public function login($email, $password) {
            $conexion = parent::connect();
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

    if ($auth->login($email, $password)) {
        header("location:./userpanel.php");
    } else {
        header("location: ./form-login.php"); 
    };
        
    

    

?> 




