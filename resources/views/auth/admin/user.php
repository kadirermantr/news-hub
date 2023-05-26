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
                        <div class="pb-3">
                            <a href="user/create">» Add new user</a><br />
                            <a href="user/request">» Account deletion requests</a><br />
                            <a href="user/activity">» Activities</a>
                        </div>

                        <table class="table caption-top table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Firstname</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($filtered_users as $user): ?>
                                <tr>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['lastname'] ?></td>
                                    <td><a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a></td>
                                    <td><?= $user['role'] ?></td>
                                    <td>
                                        <a href="user/edit?id=<?= $user['id'] ?>">
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
