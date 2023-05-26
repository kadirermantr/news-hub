<?php use Core\Session;

require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Control Panel</a></li>
                        <li class="breadcrumb-item"><a href="/admin/user">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">

                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="<?=csrf()?>">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Firstname</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="<?= $user['name'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Lastname</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="<?= $user['lastname'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role_level" class="col-md-4 col-form-label text-md-right">Current Role</label>

                                <div class="col-md-6">
                                    <input id="role_level" type="text" class="form-control" name="role_level" readonly value="<?= $user['role'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_role" class="col-md-4 col-form-label text-md-right">New Role</label>

                                <div class="col-md-6">
                                    <select name="new_role" class="form-select form-control">
                                        <option disabled selected>Select</option>
                                        <option value="1">User</option>
                                        <option value="2">Editor</option>
                                        <?php if(user('role_level') == 4): ?>
                                        <option value="3">Moderator</option>
                                        <option value="4">Admin</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="hidden" id="id" name="id" value="<?= $user['id'] ?>">
                                    <button type="submit" class="btn btn-primary" value="update">Update</button>
                                </div>
                            </div>
                        </form>

                        <?php if (Session::get('error')) { ?>
                            <div class="col-md-6 offset-md-4 my-3">
                                <?php foreach (Session::get('error') as $error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning:</strong> <?php echo $error; ?>
                                    </div>
                                <?php }?>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/layouts/footer.php';?>
