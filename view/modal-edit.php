<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once ('db.php');
include_once('update.php');
$user = new Edit();
$user->update();
$conn = new connection();
$conexion = $conn->connect();
$userName = $_SESSION["currentEmail"];
$sql = "SELECT * FROM users WHERE email = '$userName'";
$answer = mysqli_query($conexion, $sql);
$_SESSION["currentUsername"]=(mysqli_fetch_array($answer)["name"])

?>
<div class="nav-log">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit"> Edit </button>
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="logo.jpg" alt="" width="100">
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="text" class="form-control" name="name" placeholder="new name" value='<?php echo $_SESSION["currentUsername"] ?>'><br>
                        <input type="password" class="form-control password" name="password" placeholder="password" value='<?php echo $_SESSION["currentPass"] ?>'><br>
                        <input type="email" class="form-control" name="email" placeholder="email" value='<?php echo $_SESSION["currentEmail"] ?>' readonly><br>
                        <i class="bi bi-eye-slash togglePassword"></i>
                        <input type="hidden" name="currentEmail" value='<?php echo $_SESSION["currentEmail"] ?>'>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="update" value="Update">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>