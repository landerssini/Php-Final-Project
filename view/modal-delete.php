
<section>
        <button type="button" class="btn user__buttons" data-bs-toggle="modal" data-bs-target="#deleteModal">
        <img src="./assets/icons/delete.png" alt="login-icon" width="20">
        </button>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content modal__form-color">
                    <form action="delete.php" method="POST">
                        <div class="modal-header">
                            <h3>Delete</h3>
                        </div>
                        <div class="modal-body">
                            <label class="text-center formulario__label">Are you sure? You won't be able to revert this!</label>
                            <input type="hidden" class="formulario__input" name="currentEmail" value='<?php echo $_SESSION["currentEmail"] ?>'>
                        </div>
                        <div class="modal-footer delete_modal-btns">
                            <input type="button" class="btn user__buttons " data-bs-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-outline-danger" name="delete" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>