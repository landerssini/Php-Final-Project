<?php
// include_once("./signup.php");
?>
<div class="nav-log">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLogin"> Login </button>
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../logo.jpg" alt="" width="100">
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