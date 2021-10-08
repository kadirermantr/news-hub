<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="<?= env('APP_URL'); ?>"><?= env('APP_NAME'); ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= env('APP_URL'); ?>">Anasayfa</a>
                </li>
            </ul>

            <div class="navbar-collapse">
                <ul class="navbar-nav ml-auto">
                <?php if (isGuest()): ?>
                    <li class='nav-item mr-3'><a href="/register" class="nav nav-link">Kaydol</a></li>
                    <li class='nav-item'><a href="/login" class="nav nav-link">Oturum Aç</a></li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo user('name') ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="/account">Hesap</a></li>
                            <li><a class="dropdown-item" href="/logout">Oturumu kapat</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>