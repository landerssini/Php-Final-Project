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
        (mysqli_fetch_array($answer)["name"]);
        
        if (password_verify($password, $passwordHashed)) {
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
