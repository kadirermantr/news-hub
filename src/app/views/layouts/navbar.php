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

                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    <?php
                    $user = session_control();

                    if ($user !== false) {
                        echo "<li class='nav-item'><a href='#' class='btn btn-primary mr-3'>$user</a></li>";
                        echo "<li class='nav-item'><a href='/logout' class='btn btn-danger'>Oturumu Kapat</a></li>";
                    } else {
                        echo "<li class='nav-item'><a href='/login' class='btn btn-primary'>Oturum Aç</a></li>";
                    }

                    ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>