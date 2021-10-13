<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="/admin">Kontrol Paneli</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/admin">
                        <i class="fas fa-angle-double-right"></i>
                        Başlangıç
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/admin/profile">
                        <i class="fas fa-user"></i>
                        Profil
                    </a>
                </li>

                <?php if (user('role_level') >= 2): ?>
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/admin/news">
                        <i class="fas fa-feather-alt"></i>
                        Haberler
                    </a>
                </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/admin/category">
                            <i class="fas fa-list-alt"></i>
                            Kategoriler
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (user('role_level') >= 3): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/admin/comment">
                            <i class="fas fa-comments"></i>
                            Yorumlar
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/admin/user">
                            <i class="fas fa-users"></i>
                            Kullanıcılar
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Merhaba, <?php echo user('name') ?> <?php echo user('lastname') ?>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/admin/profile">Profili güncelle</a>
                            <a class="dropdown-item" href="/">Siteye geri dön</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Oturumu kapat</a>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>