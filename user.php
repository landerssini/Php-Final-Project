<?php
// include_once "db.php";

// class User extends Connection
// {
//     public $name;
//     public $email;
//     public $password;

//     //CREATE
//     public function create()
//     {
//         if (isset($_POST["send-register"])) {
//             if (isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["password"])) {
//                 if (!empty($_POST["nombre"]) && !empty($_POST["correo"]) && !empty($_POST["password"])) {
//                     $name = $_POST["nombre"];
//                     $email = $_POST["correo"];
//                     $password = $_POST["password"];
//                     $passwordHashed = mysqli_fetch_array($password)["password"];
//                     $prepareQuery = "INSERT INTO users (id, name, email, password) VALUES (NULL,'$name','$email','$passwordHashed')";
                    
//                     $sql = $this->conn->query($prepareQuery);
//                 }
//             }

//         }

//     }

    //FETCH
    // public static function searchByEmail($email) {
    //     $db = new Connection;
    //     $db->connect();
    //     $prepare = mysqli_prepare($db->conn, 'SELECT * FROM users WHERE email = ?');
    //     $prepare->bind_param('i', );
    //     $prepare->execute();
    //     $response = $prepare->get_result();
    //     return $response->fetch_object(User::class);
    // }

    
    // public function login($email, $password)
    // {
    //     $connection = $this->connect();
    //     $sql = "SELECT * FROM users WHERE email = '$email'";
    //     $answer= mysqli_query($connection, $sql);
        
    //     $passwordHashed = mysqli_fetch_array($answer)["password"];
    //     $thisName = mysqli_fetch_array($answer)["name"];
        
        
    //     if (password_verify($password, $passwordHashed)) {
    //     session_start();
    //     $_SESSION["currentName"] = $thisName;
    //     $_SESSION["currentEmail"] = $email;
    //     $_SESSION["currentPass"] = $password;
    //     return true;
    //     }
    // }
// }


// $auth = new User();

// if ($auth->login($email, $password)) {
//     $_SESSION["currentEmail"] = $email;
//     $_SESSION["currentPass"] = $password;
//     header("location:./index.php?session=active");
// } else {
//     header("location: ./index.php?error=badcredentials");
// };




    ?>
public function update() {
    $this->connect();
    $prepare = mysqli_prepare($this->conn, $sql = "UPDATE users SET name=?, email=?, password=? WHERE email=?");
    $prepare->bind_param($this->name, $this->email, $this->password);
    $prepare->execute(); 
}



