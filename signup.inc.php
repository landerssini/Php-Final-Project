<?php


if(isset($_POST["submit"]))

{

   
    $username =  $_POST["username"];
    $email =  $_POST["email"];
    $password  =  $_POST["password"];
    $passwordRepeat =  $_POST["passwordRepeat"];
    
    

    include "databaseConnect.php";
    
    include "databaseInteract.php";
    
    include "signupContr.php";
    echo "hola";
    

    $signup = new SignupContr($username,$email,$password,$passwordRepeat);
    
    $signup->setUser();

    header("location: login.php");

    






    
}

//12345678