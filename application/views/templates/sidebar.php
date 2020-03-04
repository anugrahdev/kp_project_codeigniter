<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <style>
        .logo {
            -webkit-filter: drop-shadow(0.3px 0.3px 0 white) drop-shadow(-0.3px -0.3px 0 white);
            filter: drop-shadow(0.3px 0.3px 0 white) drop-shadow(-1px -1px 0 white);
        }
    </style>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/'); ?>img/whitelogo.png" width="50px" height="50px" class="logo">
        </div>
        <div class="sidebar-brand-text mx-3" style="font-family: 'Hind', sans-serif; font-size:20.3px">
            PERTAMINA
        </div>

    </a>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class=" text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- query menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT user_menu.id,menu FROM user_menu
        JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id
        WHERE user_access_menu.role_id = $role_id
        ORDER BY user_access_menu.menu_id ASC";
    $menu = $this->db->query($queryMenu)->result_array();

    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- SUBMENU  -->
        <?php
        $menuid = $m['id'];
        $querysubMenu = "SELECT * FROM user_sub_menu JOIN  user_menu
            ON user_sub_menu.menu_id = user_menu.id
            WHERE user_sub_menu.menu_id = $menuid
            AND user_sub_menu.is_active=1";
        $subMenu = $this->db->query($querysubMenu)->result_array();
        ?>
        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title ==  $sm['title']) : ?>
                <li class="nav-item active ">
                <?php else : ?>
                <li class="nav-item ">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>
            <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">



</ul>
<!-- End of Sidebar -->