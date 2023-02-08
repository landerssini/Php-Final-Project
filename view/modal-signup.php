<?php 
   include_once("./signup.php");
   include_once("./db.php");
?>

<div class="nav-log">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSignUp"> Sign Up
    </button>
    <div class="modal fade" id="modalSignUp" tabindex="-1" aria-labelledby="modalSignUpLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../logo.jpg" alt="" width="100">
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="text" id="user" placeholder="Your name" name="name" placeholder="Username"
                            class="form-control form-control-lg">
                        <input type="text" id="Email" placeholder="Example@mail.com" name="email" placeholder="email"
                            class="form-control form-control-lg">
                        <input type="password" placeholder="Password" name="password"
                            class="form-control form-control-lg password">
                        <i class="bi bi-eye-slash togglePassword"></i>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Sign up" name="send-register">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>