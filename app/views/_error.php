<?php require __DIR__ . '/layouts/header.php';?>

    <div class="container text-center">
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase text-center">
                        <strong>HTTP ERROR | <?= $code ?></strong>
                    </div>

                    <div class="card-body">
                        <?= $message ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/layouts/footer.php';?>