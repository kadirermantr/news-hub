<?php use Core\Session;

require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Kontrol Paneli</a></li>
                        <li class="breadcrumb-item"><a href="/admin/comment">Yorumlar</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">

                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="<?=csrf()?>">

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Yazar</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required autocomplete="title" value="<?= $comments['user'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Tarih</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required autocomplete="title" value="<?= $comments['date'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Haber</label>

                                <div class="col-md-6">
                                    <div class="form-control">
                                        <a href="/news?id=<?= $comments['news_id'] ?>" target="_blank"><?= $comments['news'] ?></a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-md-4 col-form-label text-md-right">Yorum</label>

                                <div class="col-md-6">
                                    <textarea name="content" class="form-control" id="content" cols="30" rows="10"><?= $comments['content'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="hidden" id="id" name="id" value="<?= $comments['id'] ?>">
                                    <button type="submit" name="submit" class="btn btn-primary" value="update">Güncelle</button>
                                    <button type="submit" name="submit" class="btn btn-danger" value="delete">Sil</button>
                                </div>
                            </div>
                        </form>

                        <?php if (Session::get('error')) { ?>
                            <div class="col-md-6 offset-md-4 my-3">
                                <?php foreach (Session::get('error') as $error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Hata:</strong> <?php echo $error; ?>
                                    </div>
                                <?php }?>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/layouts/footer.php';?>