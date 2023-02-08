<?php
// include_once 'db.php';
include_once('update.php');
$user = new Edit();
$user->update();

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
                        <input type="text" class="form-control" name="name" placeholder="new name" value='<?php echo $_SESSION["currentUser"] ?>'><br>
                        <input type="email" class="form-control" name="email" placeholder="email" value='<?php echo $_SESSION["currentEmail"] ?>' readonly><br>
                        <input type="password" class="form-control password" name="password" placeholder="password" value='<?php echo $_SESSION["currentPass"] ?>'><br>
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