<?php require __DIR__ . '/../layouts/header.php'; ?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kaydol</div>

                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Ad</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"  autocomplete="name" autofocus value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Soyad</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname"  autocomplete="lastname" value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '' ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Posta Adresi</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email"  autocomplete="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">
                                    <!---
                                    <input id="email" type="email" class="form-control" name="email"  autocomplete="email">
                                    --->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Parola</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password"  autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Parola Tekrarı</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Kaydol</button>
                                </div>
                            </div>
                        </form>

                        <?php if (!empty($_SESSION['error'])) { ?>
                            <div class="col-md-6 offset-md-4 my-3">
                                <?php foreach ($_SESSION['error'] as $error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Hata:</strong> <?php echo $error; ?>
                                    </div>
                                <?php }?>
                            </div>
                        <?php } ?>

                        <hr>

                        <div class="text-center">
                            Zaten üye misiniz? <a href="/login">Oturum açın</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/../layouts/footer.php';?>