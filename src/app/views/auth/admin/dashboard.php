<?php require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <h5>Yorumlarım:</h5>

                        <table class="table caption-top table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Yorum</th>
                                <th scope="col">Haber</th>
                                <th scope="col">Tarih</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($comments as $comment): ?>
                                <?php if ($comment['user_id'] === user('id')): ?>
                                <tr>
                                    <td><?= $comment['content'] ?></td>
                                    <td><a href="/news?id=<?= $comment['news_id'] ?>" target="_blank"><?= $comment['news'] ?></a></td>
                                    <td><?= $comment['date'] ?></td>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/layouts/footer.php';?>