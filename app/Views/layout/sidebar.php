<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url(); ?>/foto/<?= $_SESSION['foto']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $_SESSION['nama']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <?php if (session()->get('level') == 1) {
                    // Fungsi ke Admin

                    echo '<a href="/siresa/admin"><i class="fa fa-tachometer" aria-hidden="true"></i>DASHBOARD</a>';
                } elseif (session()->get('level') == 2) {
                    // Fungsi ke Pendata
                    echo '<a href="/siresa/pendata"><i class="fa fa-tachometer" aria-hidden="true"></i>DASHBOARD</a>';
                } else {
                    // Fungsi ke Kolektor
                    echo '<a href="/siresa/kolektor"><i class="fa fa-tachometer" aria-hidden="true"></i>DASHBOARD</a>';
                } ?>

            </li>
            <li class="treeview">
                <a href=""><i class="fa fa-link"></i> <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if (session()->get('level') == 1) {
                        // Fungsi ke Admin

                        echo '<li><a href="/siresa/user"></i>User</a></li>';
                        echo '<li><a href="/siresa/potensi"></i>Potensi</a></li>';
                        echo '<li><a href="/siresa/penerimaan"></i>Penerimaan</a></li>';
                    } elseif (session()->get('level') == 2) {
                        // Fungsi ke Pendata

                        echo '<li><a href="/siresa/potensi/pot_by_kel"></i>Potensi</a></li>';
                    } else {
                        // Fungsi ke Kolektor
                        echo '<li><a href="/siresa/potensi/pot_by_kel"></i>Potensi</a></li>';
                    } ?>


                </ul>
            </li>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">HEADER</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
                <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Link in level 2</a></li>
                        <li><a href="#">Link in level 2</a></li>
                    </ul>
                </li>
            </ul>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>