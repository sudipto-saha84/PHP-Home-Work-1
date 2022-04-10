<?php include 'includes/header.php'; ?>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-body">
                        <img src="<?php echo $studentInfo['image']; ?>" alt="" class="w-100">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-body">
                        <h2 class="card-title">Student Name: <?php echo $studentInfo['name']; ?></h2>
                        <h2 class="card-title">Student Email: <?php echo $studentInfo['email']; ?></h2>
                        <h2 class="card-title">Student Mobile: <?php echo $studentInfo['mobile']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>