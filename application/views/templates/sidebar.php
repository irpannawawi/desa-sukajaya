<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

            </div>
            <a href="#" style="text-align: center" class="text-center">SISTEM INFORMASI <br>PELAYANAN MASYARAKAT</a>
            
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if(!empty($_SESSION['role'])): ?>
                <li class="nav-item ">
                    <a href="<?=site_url($_SESSION['role'])?>" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Master Data</li>
                <li class="nav-item">
                    <a href="<?=site_url($_SESSION['role'].'/masyarakat')?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data <?=$_SESSION['role']=='admin'?'Warga':'Keluarga'?>
                        </p>
                    </a>
                </li>
                <?php if($_SESSION['role'] == 'admin'): ?> 
                <li class="nav-item">
                    <a href="<?=site_url($_SESSION['role'].'/admin')?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Admin
                        </p>
                    </a>
                </li>
                <?php endif ?>
                <li class="nav-header">Surat-surat keterangan</li>

                <li class="nav-item">
                    <a href="<?=site_url($_SESSION['role'].'/surat_kematian')?>" class="nav-link">
                        <i class="nav-icon fa fa-heartbeat"></i>
                        <p>
                            Kematian
                        </p>
                    </a>
                </li>
                <?php endif; // end if isset role ?>
                <li class="nav-item">
                    <a href="<?=empty($_SESSION['role'])?site_url('public/surat_domisili'):site_url($_SESSION['role'].'/surat_domisili')?>" class="nav-link">
                        <i class="nav-icon fas fa-map"></i>
                        <p>
                            Domisili
                        </p>
                    </a>
                </li>
                <?php if(!empty($_SESSION['role'])): ?>
                <li class="nav-item">
                    <a href="<?=site_url($_SESSION['role'].'/surat_kelakuan_baik')?>" class="nav-link">
                        <i class="nav-icon fas fa-hands"></i>
                        <p>
                            Kelakuan Baik
                        </p>
                    </a>
                </li>
                <?php endif; // end if isset role ?>
                <li class="nav-item">
                    <a href="<?=empty($_SESSION['role'])?site_url('public/surat_keterangan_usaha'):site_url($_SESSION['role'].'/surat_keterangan_usaha')?>" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Usaha
                        </p>
                    </a>
                </li>
                <?php if(!empty($_SESSION['role'])): ?>
                

                
                
                <li class="nav-item">
                    <a href="<?=site_url('logout')?>" class="nav-link text-danger">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                <?php endif; // end if isset role ?>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>