<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="/admin">YÖNETİM PANELİ</a>
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
                    <a class="nav-link text-white" aria-current="page" href="/admin/news">
                        <i class="fas fa-feather-alt"></i> Haberler
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/admin/category">
                        <i class="fas fa-list-alt"></i> Kategoriler
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/admin/user">
                        <i class="fas fa-user"></i> Kullanıcılar
                    </a>
                </li>
            </ul>

            <div class="navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo user('name') ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown">
                            <a class="dropdown-item" href="/account">Hesap</a>
                            <a class="dropdown-item" href="/">Siteye geri dön</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Oturumu kapat</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>