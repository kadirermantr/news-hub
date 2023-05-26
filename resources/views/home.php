<?php require __DIR__ . '/layouts/header.php';?>

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3">

            <?php foreach($news as $post): ?>
            <div class="col mb-4">
                <div class="card">
                    <a href="news?id=<?= $post['id']?>" class="stretched-link text-dark text-decoration-none" style="position: relative;">
                    <img src="<?php public_path('uploads/img/' . $post['image'])?>" class="card-img-top">

                    <div class="card-body">
                        <h5 class="card-title"><?= $post['title'] ?></h5>
                        <p class="card-text"><?= $post['content'] ?></p>
                    </div>
                    </a>

                    <div class="card-footer text-muted small">
                        <div class="row">
                            <div class="col text-center"><?= $post['date'] ?></div>
                            <div class="col text-center"><a href="category?id=<?= $post['category_id'] ?>">#<?= $post['category'] ?></a></div>
                            <div class="col text-center"><?= $post['user'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>

<?php require __DIR__ . '/layouts/footer.php';?>
