<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
    echo $_SESSION["currentEmail"];
    $db->deleteUser($user);