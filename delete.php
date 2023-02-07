<?php
    include_once('./db.php');


    class Delete extends Connection {
        public function deleteUser(){
            $conexion = parent::connect();
            if(isset($_POST["delete"])) {
                $user = $_POST["currentEmail"];
                $query = "DELETE FROM users WHERE email = '$user'";
                $check_query = mysqli_query($conexion, $query);
                if($check_query) {
                    header("location: ./logout.php");
                }else {
                    echo " Error, the user has not been deleted";
                }
            }
        }

    }
    
?>