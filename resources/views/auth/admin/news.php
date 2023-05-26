<?php require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Kontrol Paneli</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <div class="pb-3">
                            <a href="news/create">» Yeni haber ekle</a>
                        </div>

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
                                <tr>
                                    <td><?= $post['title'] ?></td>
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
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/layouts/footer.php';?>