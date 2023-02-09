<?php
    // if(isset($_POST['email']) && isset($_POST['password'])){
    //     require_once("login.php");
    //     include_once('update.php');
    // }

    // // session_start();

    // if (isset($_SESSION["currentEmail"])) {
    //     header("location:index.php");
    // }
?>
<div class="nav-log">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLogin" data-backdrop="false"> Login </button>
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h3>Log In</h3>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="post" class="gap-2">
                        <input type="email" id="email-login" name="email" placeholder="Email" class="form-control form-control-lg">
                        <div>
                            <input type="password" name="password" placeholder="Password" class="password form-control form-control-lg">
                            <i class="bi bi-eye-slash togglePassword"></i>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Login" name="submit-login" class="btn btn-primary">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>