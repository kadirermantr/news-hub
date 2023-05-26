<?php require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Control Panel</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <table class="table caption-top table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Author</th>
                                <th scope="col">Comment</th>
                                <th scope="col">News</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($comments as $comment): ?>
                                <tr>
                                    <td><?= $comment['user'] ?></td>
                                    <td><?= $comment['content'] ?></td>
                                    <td><a href="/news?id=<?= $comment['news_id'] ?>" target="_blank"><?= $comment['news'] ?></a></td>
                                    <td><?= $comment['date'] ?></td>
                                    </td>
                                    <td>
                                        <a href="comment/edit?id=<?= $comment['id'] ?>">
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
