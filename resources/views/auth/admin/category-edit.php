<?php use Core\Session;

require __DIR__ . '/layouts/header.php';?>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Control Panel</a></li>
                        <li class="breadcrumb-item"><a href="/admin/category">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">

                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="<?=csrf()?>">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autocomplete="name" value="<?= $category['name'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descrtiption" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea name="description" class="form-control" id="" cols="30" rows="10" required><?= $category['description'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_role" class="col-md-4 col-form-label text-md-right">Responsible Editors</label>

                                <div class="col-md-6">
                                    <select name="users[]" class="form-select form-control" multiple>
                                        <option disabled>Select</option>
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?= $user['id'] ?>" <?= $user['is_editor'] ? 'selected' : '' ?>><?= $user['name'] . " " . $user['lastname'] ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="hidden" id="id" name="id" value="<?= $category['id'] ?>">
                                    <button type="submit" name="submit" class="btn btn-primary" value="update">Update</button>
                                    <button type="submit" name="submit" class="btn btn-danger" value="delete">Delete</button>
                                </div>
                            </div>
                        </form>

                        <div class="col-md-6 offset-md-4 pt-3">
                            <p class="small text-muted font-italic">
                                <strong>Warning:</strong> If a category is deleted, all the news articles belonging to that category will be permanently deleted.
                            </p>
                        </div>

                        <?php if (Session::get('error')) { ?>
                            <div class="col-md-6 offset-md-4 my-3">
                                <?php foreach (Session::get('error') as $error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Hata:</strong> <?php echo $error; ?>
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
