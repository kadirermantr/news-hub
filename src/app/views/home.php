<?php require __DIR__ . '/layouts/header.php';?>

<!--
    <div class="container">
    <div class="row py-5">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://mdbootstrap.com/img/new/slides/041.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://mdbootstrap.com/img/new/slides/042.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://mdbootstrap.com/img/new/slides/043.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
-->

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3">

            <?php foreach($news as $post): ?>
            <div class="col mb-4">
                <div class="card">
                    <a href="news?id=<?= $post['id']?>" class="stretched-link text-dark" style="position: relative;">
                    <img src="https://mdbootstrap.com/img/new/standard/city/044.jpg" class="card-img-top">

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