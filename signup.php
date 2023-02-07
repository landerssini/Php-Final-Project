<?php

    include_once("./db.php");

   
    

    class SignUp extends Connection
    {

        public function register($name, $email, $pass)
        {
            $conexion = parent::connect();
            $check_sql = "SELECT email FROM users WHERE email = '$email'";
            $check_query = mysqli_query($conexion, $check_sql);
            if(mysqli_num_rows($check_query) > 0) {
               echo '<p>Email already exist, try again!</p>';
            }else {
                $sql = "INSERT INTO users (id, name, email, password) VALUES (NULL,?,?,?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('sss', $name, $email, $pass);
                return $query->execute();
            }

        }

    }

    if (isset($_POST["send-register"])) {
        if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"])) {
            echo "<p>Fields cannot be left empty.</p>";
        } else {
            $name_user = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user = new SignUp();
            if ($user->register($name_user, $email, $password)) {
                header("location:form-login.php");
            }

        }
    }

?>