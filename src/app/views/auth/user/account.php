<?php require __DIR__ . '/../../layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase text-center">
                        <strong>Hesap</strong>
                    </div>

                    <div class="card-body">
                        <p>
                            <ul>
                            <li><strong>Ad:</strong> <?= user('name')?></li>
                            <li><strong>Soyad</strong> <?= user('lastname')?></li>
                            <li><strong>E-Posta:</strong> <a href="mailto:<?= user('email')?>"><?= user('email')?></a></li>
                            <li><strong>Üyelik türü:</strong>
                                <?php
                                switch (user('role_level')) {
                                    case 1:
                                        echo "Kullanıcı";
                                        break;

                                    case 2:
                                        echo "Editör";
                                        break;

                                    case 3:
                                        echo "Moderatör";
                                        break;

                                    case 4:
                                        echo "Admin";
                                        break;
                                }
                                ?>
                            </li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/../../layouts/footer.php';?>