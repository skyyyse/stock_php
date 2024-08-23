<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <div class="navbar-nav pl-2">
        <ol class="breadcrumb p-0 m-0 bg-white">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <?php echo  $_SESSION['users_name'] ?>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
                <img src="<?php echo $_SESSION['users_image']==null?"image/user/avatar5.png":"https://imgs.search.brave.com/OjJtj1gYxLnfEW9CD6qrumi3F_LEe3mKP1DzQmL35zU/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tYXhj/ZG4uaWNvbnM4LmNv/bS9wYWNrcy9wcmV2/aWV3LWljb24vcHJv/ZmlsZS5zdmc" ?>" class='img-circle elevation-2' width="40" height="40" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                <h4 class="h4 mb-0"><strong><?php echo  $_SESSION['users_name'] ?></strong></h4>
                <div class="mb-3"><?php echo  $_SESSION['users_email'] ?></div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user-cog mr-2"></i> Changes Profile
                </a>
                <div class="dropdown-divider"></div>
                <button type="button" class="dropdown-item changes_password" data-bs-toggle="modal" data-bs-target="#changes_password">
                    <i class="fas fa-lock mr-2"></i> Change Password
                </button>
                <div class="dropdown-divider"></div>
                <form action="http://localhost/php/admin/admin/stock_controller/auth/controller/auth_controller.php"  method="POST">
                    <button type="submit" name="submit_action" value="logout" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>