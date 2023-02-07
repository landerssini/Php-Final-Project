<?php

class Edit extends Connection{

        public function update(){
            $conexion = parent::connect();
            if (isset($_POST["update"])) {
                $user = $_POST["currentUser"];
                $name_user = $_POST['uname'];
                $email = $_POST['uemail'];
                $password = password_hash($_POST['upassword'], PASSWORD_DEFAULT);;
                $sql = "UPDATE users SET name='$name_user', email='$email', password='$password' WHERE email='$user'";
                $result = mysqli_query($conexion, $sql);
                if ($result) {
                    echo "<p>Camabiado correctamente</p>";
                }else{
                    echo '<p>Holaaa!</p>';
                }
            }
            
        }
    }


?>