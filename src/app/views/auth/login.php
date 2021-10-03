<?php require __DIR__ . '/../layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Oturum Aç</div>

                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Posta Adresi</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Parola</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Oturum Aç</button>
                                </div>
                            </div>
                        </form>

                        <hr>

                        <div class="text-center">
                            <a href="#">Parolamı unuttum</a><br />
                            Bize katılmak ister misiniz? <a href="/register">Şimdi kaydolun.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/../layouts/footer.php';?>