<section>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Delete
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <form method="POST">
                        <div class="modal-body">
                            <p>Are you sure?</p>
                            <p class="text-center"> You won't be able to revert this!</p>
                            <input type="hidden" name="currentEmail" value='<?php echo $_SESSION["currentEmail"] ?>'>
                            <input type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-outline-danger" name="delete" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>