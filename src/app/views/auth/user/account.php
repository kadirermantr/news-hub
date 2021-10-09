<?php require __DIR__ . '/../../layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase text-center">
                        <strong>Hesap</strong>
                    </div>

                    <div class="card-body">
                        <ul>
                            <li><strong>Ad:</strong> <?= user('name')?></li>
                            <li><strong>Soyad</strong> <?= user('lastname')?></li>
                            <li><strong>E-Posta:</strong> <a href="mailto:<?= user('email')?>"><?= user('email')?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/../../layouts/footer.php';?>