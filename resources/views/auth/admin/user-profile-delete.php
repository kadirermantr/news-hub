<?php use Core\Session;

require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Kontrol Paneli</a></li>
                        <li class="breadcrumb-item"><a href="/admin/profile">Profil</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <div class="col-md-6 offset-md-3 text-center">
                            <p>Bu sayfadan hesabınızı silmek için istek gönderebilirsiniz.</p>
                            <p>
                                <span class="text-danger">
                                    İşlem sonucunda hesabınızı yeniden etkinleştiremez veya eklediğiniz hiçbir içeriği ya da bilgiyi geri getiremezsiniz.
                                </span>
                            </p>
                        </div>

                        <form action="" method="POST">
                            <input type="hidden" id="id" name="id" value="<?= $user['id'] ?>">
                            <input type="hidden" name="_token" value="<?=csrf()?>">

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <input type="hidden" id="id" name="id" value="<?= $user['id'] ?>">
                                    <?php if(empty($user['request'])): ?>
                                         <button type="submit" name="submit" class="btn btn-danger" value="request">Silme isteği gönder</button>
                                    <?php else: ?>
                                        <button type="submit" name="submit" class="btn btn-primary" value="revert">Silme isteğini iptal et</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/layouts/footer.php';?>