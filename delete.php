<?php
include_once('./db.php');


    class Delete extends Connection {

        public function deleteUser($user){
            $conexion = parent::connect();
            if(isset($_POST["delete"])) {
                $query = 'DELETE FROM users WHERE email = "'.$user.'"';
                $check_query = mysqli_query($conexion, $query);
                if($check_query) {
                    header("location: ./logout.php");
                } else {
                    echo " Error, the user has not been deleted";
                }
            }
        }

    }
    session_start();
    $user = $_SESSION["currentEmail"];
    $db = new Delete;
    $db->deleteUser($user);