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
            <div class="modal-content modal__form-color">
                <form action= '' method="POST">
                    <div class="modal-header">
                        <h3>Edit</h3>
                    </div>
                    <div class="modal-body">
                        <label for="name" class="formulario__label">Nombre</label>
                        <input type="text" class="form-control formulario__input" name="nombre" placeholder="Your Name"
                            value='<?php echo $_SESSION["currentName"] ?>'>
                        <label for="email" class="formulario__label">Email</label>
                        <input type="email" class="form-control formulario__input" name="correo" placeholder="Email"
                            value='<?php echo $_SESSION["currentEmail"] ?>'>
                        <label for="password" class="formulario__label">Password</label>
                        <input type="password" class="form-control password formulario__input" name="password" placeholder="Password"
                            value='<?php echo $_SESSION["currentPass"] ?>'>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="update" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>