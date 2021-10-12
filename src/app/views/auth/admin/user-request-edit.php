<?php use Core\Session;

require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Kontrol Paneli</a></li>
                        <li class="breadcrumb-item"><a href="/admin/user">Kullanıcılar</a></li>
                        <li class="breadcrumb-item"><a href="/admin/user/request">Hesap silme istekleri</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">

                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="<?=csrf()?>">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Kullanıcı</label>

                                <div class="col-md-6">
                                    <div class="form-control">
                                        <a href="/admin/user/edit?id=<?= $user_request['user_id'] ?>"><?= $user_request['user'] ?></a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="hidden" id="id" name="id" value="<?= $user_request['user_id'] ?>">
                                    <button type="submit" name="submit" class="btn btn-danger" value="delete">Hesabı sil</button>
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