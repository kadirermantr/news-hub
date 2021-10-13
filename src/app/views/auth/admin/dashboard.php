<?php require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
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
                        <h5 class="py-2 text-center text-danger">Takip ettiğim kategorilerde son haberler</h5>

                        <table class="table caption-top table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Başlık</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tarih</th>
                                <th scope="col">Yazar</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($news as $post): ?>
                                <?php if ($post['is_following']): ?>
                                <tr>
                                    <td><a href="news?id=<?= $post['id']?>" target="_blank"><?= $post['title'] ?></a></td>
                                    <td><?= $post['category'] ?></td>
                                    <td><?= $post['date'] ?></td>
                                    <td><?= $post['user'] ?>
                                    </td>
                                    <td>
                                        <a href="news/edit?id=<?= $post['id'] ?>">
                                            <span class="btn btn-outline-primary">
                                            <i class="fa fa-edit"></i>
                                            </span>
                                        </a>
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

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="py-2 text-center text-danger">Yorumlarım</h5>

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