<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="<?= env('APP_URL'); ?>"><?= env('APP_NAME'); ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= env('APP_URL'); ?>">Home</a>
                </li>

                <div class="dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="dropdown-user" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdown-user">
                        <?php foreach ($categories as $nav_category): ?>
                        <a class="dropdown-item" href="/category?id=<?= $nav_category['id'] ?>"><?= $nav_category['name']?></a>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </ul>

            <div class="navbar-collapse">
                <div class="navbar-nav ml-auto">
                <?php if (isGuest()): ?>
                    <li class='nav-item mr-3'><a href="/register" class="nav nav-link text-white">Register</a></li>
                    <li class='nav-item'><a href="/login" class="nav nav-link text-white">Login</a></li>
                <?php else: ?>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="dropdown-user" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, <?php echo user('name') ?> <?php echo user('lastname') ?>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdown-user">
                            <a class="dropdown-item" href="/admin/profile">Update Profile</a>
                            <a class="dropdown-item" href="/admin">Control Panel</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Logout</a>
                        </ul>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>
