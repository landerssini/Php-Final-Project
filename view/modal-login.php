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
                    <form action="" method="post" class="gap-2">
                        <input type="email" id="email-login" name="email" placeholder="Email"
                            class="form-control form-control-lg">
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="form-control form-control-lg">
                        <div>
                            <p>Don't have an account? <a href="./form-signup.php">SignUp</a></p>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Login" name="submit-login" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>