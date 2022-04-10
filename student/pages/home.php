<?php include 'includes/header.php'?>

<?php
    if (!isset($_SESSION['id']))
    {
        header("Location: login.php");
    }
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Add Student Info</h4>
                    </div>
                    <div class="card-body">
                        <h4 class="text-center text-success">
                            <?php echo isset($message) ? $message : '';?>
                        </h4>
                        <form action="action.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group row mt-3">
                                <label class="col-form-label col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-form-label col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-form-label col-md-3">Mobile</label>
                                <div class="col-md-9">
                                    <input type="number" name="mobile" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label class="col-form-label col-md-3">Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-form-label col-md-3"></label>
                                <input type="submit" name="btn" class="btn btn-outline-success btn-block" value="Save Info">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'?>
