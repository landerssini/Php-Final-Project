<?php
include_once("./db.php");

echo $_SESSION["currentEmail"];
class Edit extends Connection{

        public function update(){
            $conexion = $this->connect();
            if (isset($_POST["update"])) {
                $name_user = $_POST['nombre'];
                $email = $_POST['correo'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql = "UPDATE users SET name='$name_user', email='$email', password='$password' WHERE email='$email'";
                $result = mysqli_query($conexion, $sql);
                if ($result) {
                    echo "<p>Cambiado correctamente</p>";

                    
                }
            }
        }
    }
    // ;
    
    
?>

