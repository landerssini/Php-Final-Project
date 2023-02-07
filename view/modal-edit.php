<?php
    // include_once 'db.php';
    include_once ('update.php');
    echo $_SESSION["currentUser"];
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
                    <form action="" method="POST">
                        <input type="text" class="form-control" name="uname" placeholder="name"><br>
                        <input type="email" class="form-control" name="uemail" placeholder="email"><br>
                        <input type="password" placeholder="password" class="form-control" name="upassword"><br>
                        <input type="hidden" name="currentUser" value="<?php echo $_SESSION["currentUser"]?>">
                        <input type="submit" class="btn btn-primary" name="update" value="Update">
                    </form>
                    </div>
                    <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>