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
                        <h4>All student Info</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="tex-center text-success mb-3">
                        <?php if (isset($_SESSION['message']))
                        {
                           echo $_SESSION['message'];
                           unset($_SESSION['message']);
                        }
                        ?>
                        </h3>
                        <h3 class="tex-center text-success mb-3">
                            <?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?>
                        </h3>
                        <table class="table table-border table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($students as $student) { extract($student) ?>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $mobile; ?></td>
                                    <td>
                                        <img src="<?php echo $image; ?>" alt="" height="50" width="90">
                                    </td>
                                    <td>
                                        <a href="action.php?status=edit&id=<?php echo $id; ?>" class="btn btn-outline-success">Edit</a>
                                        <a href="action.php?status=delete&id=<?php echo $id; ?>" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'?>
