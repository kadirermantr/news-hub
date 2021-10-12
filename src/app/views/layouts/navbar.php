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
                <div class="navbar-nav ml-auto">
                <?php if (isGuest()): ?>
                    <li class='nav-item mr-3'><a href="/register" class="nav nav-link text-white">Kaydol</a></li>
                    <li class='nav-item'><a href="/login" class="nav nav-link text-white">Oturum Aç</a></li>
                <?php else: ?>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Merhaba, <?php echo user('name') ?> <?php echo user('lastname') ?>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/admin/profile">Profili güncelle</a>
                            <a class="dropdown-item" href="/admin">Kontrol paneli</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Oturumu kapat</a>
                        </ul>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>