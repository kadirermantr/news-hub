<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="/admin">Control Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/admin">
                        <i class="fas fa-angle-double-right"></i>
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/admin/profile">
                        <i class="fas fa-user"></i>
                        Profile
                    </a>
                </li>

                <?php if (user('role_level') == 2): ?>
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/admin/news/create">
                        <i class="fas fa-feather-alt"></i>
                        Add News
                    </a>
                </li>
                <?php endif; ?>

                <?php if (user('role_level') >= 3): ?>
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/admin/news">
                        <i class="fas fa-feather-alt"></i>
                        News
                    </a>
                </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/admin/category">
                            <i class="fas fa-list-alt"></i>
                            Categories
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (user('role_level') >= 3): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/admin/comment">
                            <i class="fas fa-comments"></i>
                            Comments
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/admin/user">
                            <i class="fas fa-users"></i>
                            Users
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
                            <a class="dropdown-item" href="/admin/profile">Update profile</a>
                            <a class="dropdown-item" href="/">Go back to the website</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Logout</a>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>
