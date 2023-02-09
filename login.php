<?php



include_once("./db.php");

if (isset($_POST['submit-login'])) {
    $email = $_POST["name"];
    $email = $_POST["correo"];
    $password = $_POST["password"];
}


class Login extends Connection
{
    public function login($email, $password)
    {
        $connection = parent::connect();
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $answer= mysqli_query($connection, $sql);
        $passwordHashed = mysqli_fetch_array($answer)["password"];
        
        if (password_verify($password, $passwordHashed)) {
            session_start();
            $_SESSION["currentEmail"] = $email;
            $_SESSION["currentPass"] = $password;
            return true;
        }
    }
}

$auth = new Login();

if ($auth->login($email, $password)) {
    session_start();
    $_SESSION["currentEmail"] = $email;
    $_SESSION["currentPass"] = $password;
    header("location:./index.php?session=active");
} else {
    header("location: ./index.php?error=badcredentials");
};
