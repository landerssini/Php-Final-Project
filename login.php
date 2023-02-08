<?php



include_once("./db.php");

if (isset($_POST['submit-login'])) {
    // $name = $_POST['name'];
    $email = $_POST["email"];
    $password = $_POST["password"];
}


class Login extends Connection
{

    public function login($email, $password)
    {
        $conexion = parent::connect();
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $answer = mysqli_query($conexion, $sql);
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
    $_SESSION["currentEmail"] = $email;
    $_SESSION["currentPass"] = $password;
    header("location:./index.php?session=active");
} else {
    header("location: ./index.php?error=badcredentials");
};
