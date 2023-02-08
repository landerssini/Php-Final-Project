<?php
include_once("./db.php");
class Edit extends Connection{

        public function update(){
            $conexion = parent::connect();
            if (isset($_POST["update"])) {
                $name_user = $_POST['name'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql = "UPDATE users SET name='$name_user', email='$email', password='$password' WHERE email='$email'";
                $result = mysqli_query($conexion, $sql);
                if ($result) {
                    echo "<p>Cambiado correctamente</p>";
                    $_SESSION["currentUser"] = $name_user;
                    $_SESSION["currentEmail"] = $email;
                }else{
                    echo '<p>Holaaa!</p>';
                }
            }
            
        }
    }


?>