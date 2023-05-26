<?php use Core\Session;

require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <strong class="text-uppercase"><?= $category['name'] ?> News</strong><br />
                        <?= $category['description'] ?>

                        <?php if (!isGuest()): ?>
                        <div class="form-group row pt-3">
                            <div class="col-md-12">
                                <form action="" method="POST">
                                <?php if(empty($user['category_followed'])): ?>
                                    <button type="submit" name="submit" class="btn btn-sm btn-secondary" value="follow">Follow the category</button>
                                <?php else: ?>
                                    <button type="submit" name="submit" class="btn btn-sm btn-danger" value="revert">Unfollow the category</button>
                                <?php endif; ?>
                                <input type="hidden" id="id" name="id" value="<?= $category['id'] ?>">
                                </form>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2">

            <?php foreach($news as $post): ?>
            <div class="col mb-4">
                <div class="card">
                    <a href="news?id=<?= $post['id']?>" class="stretched-link text-dark text-decoration-none" style="position: relative;">
                        <img src="<?php public_path('uploads/img/' . $post['image'])?>" class="img-fluid">

                        <div class="card-body">
                            <h5 class="card-title"><?= $post['title'] ?></h5>
                            <p class="card-text"><?= $post['content'] ?></p>
                        </div>
                    </a>

                    <div class="card-footer text-muted small">
                        <div class="row">
                            <div class="col text-center"><?= $post['date'] ?></div>
                            <div class="col text-center"><?= $post['user'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php if (Session::get('error')) { ?>
                <div class="col-md-6 offset-3 text-center">
                    <?php foreach (Session::get('error') as $error) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Hata:</strong> <?php echo $error; ?>
                        </div>
                    <?php }?>
                </div>
            <?php } ?>

        </div>
    </div>

<?php require __DIR__ . '/layouts/footer.php';?>
