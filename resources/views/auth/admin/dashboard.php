<?php require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center pt-5 pb-3">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="py-2 text-danger"><u>Latest news in the categories I follow</u></h5>

                        <?php foreach($news as $post): ?>
                            <?php if ($post['is_following']): ?>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="news?id=<?= $post['id']?>" target="_blank"><?= $post['title'] ?></a>
                                        #<?= $post['category'] ?>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="py-2 text-danger"><u>My Comments</u></h5>

                        <?php foreach($comments as $comment): ?>
                            <?php if ($comment['user_id'] === user('id')): ?>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <small><?= $comment['date'] ?></small> - <a href="/news?id=<?= $comment['news_id'] ?>" target="_blank"><small><?= $comment['news'] ?></small></a><br>
                                    <div class="font-italic my-2">
                                        <?= $comment['content'] ?>
                                    </div>

                                </li>
                            </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="py-2 text-danger"><u>The news articles I have read</u></h5>

                        <?php foreach($news as $post): ?>
                            <?php if ($post['is_reading']): ?>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="news?id=<?= $post['id']?>" target="_blank"><?= $post['title'] ?></a>
                                        #<?= $post['category'] ?>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/layouts/footer.php';?>
