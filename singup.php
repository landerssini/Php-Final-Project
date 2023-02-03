<?php

    include_once("db.php");

    if(isset($_POST["send-register"])){
        if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"])){
            echo "<p>No se pueden dejar campos vacíos.</p>";
        }
        else{
            $pass_encrypt = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
            $consulta = $dbh->prepare("INSERT INTO users (id, name, email, password) VALUES (NULL, ?, ?, ?)");
            $consulta->execute([$_POST["name"], $_POST["email"], $pass_encrypt]);
    
            return header("location:index.php");
        }
    }

?>