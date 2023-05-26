<?php use Core\Session;

require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-uppercase text-center">
                        <strong><?= $news['title'] ?></strong>
                    </div>

                    <div class="card-body">
                        <div class="col-12 pb-4 text-center">
                            <img src="<?php public_path('uploads/img/' . $news['image'])?>" class="img-fluid">
                        </div>

                        <?= $news['content'] ?>
                    </div>
                </div>
            </div>
        </div>

        <section class="content-item my-5" id="comments">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="<?=csrf()?>">

                            <h4 class="pb-3">Yorum yaz</h4>

                            <div class="row">
                                <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                    <textarea name="content" class="form-control" id="message" placeholder="Bir yorum yaz"></textarea>
                                </div>
                            </div>

                            <?php if (!isGuest()): ?>
                            <div class="form-check pb-3">
                                <input class="form-check-input" type="checkbox" name="anonymous" id="anonymous">
                                <label class="form-check-label text-muted font-italic small" for="anonymous">
                                    Anonim olarak gönder
                                </label>
                            </div>
                            <?php endif; ?>

                            <input type="hidden" id="id" name="id" value="<?= $news['id'] ?>">
                            <button type="submit" class="btn btn-primary">Gönder</button>
                        </form>

                        <?php if (Session::get('error')) { ?>
                            <div class="col-md-6">
                                <?php foreach (Session::get('error') as $error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Hata:</strong> <?php echo $error; ?>
                                    </div>
                                <?php }?>
                            </div>
                        <?php } ?>

                        <h3 class="pt-3"><?= count($newsComments) ?> Yorum</h3>

                        <?php foreach($newsComments as $comment): ?>
                        <div class="media">
                            <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>
                            <div class="media-body">
                                <h4 class="media-heading"><?= $comment['user'] ?></h4>
                                <p><?= $comment['content'] ?></p>
                                <ul class="list-unstyled list-inline media-detail pull-left">
                                    <li><i class="fa fa-calendar"></i><?= $comment['date'] ?></li>
                                </ul>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </section>

    </div>

<?php require __DIR__ . '/layouts/footer.php';?>