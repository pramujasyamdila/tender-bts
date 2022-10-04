<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand" style="margin-bottom: 50px;">
            <img class="img-fluid mb-2 mt-3" width="60px" style="margin-top: -20px;" src="<?= base_url('assets/tower.png') ?>" alt="">
            <label for=""><b>Vendor BTS</b></label>
        </div>
        <div class="sidebar-brand sidebar-brand-sm mt-4">
            <img class="img-fluid mb-2 mt-3" width="60px" style="margin-top: -20px;" src="<?= base_url('assets/tower.png') ?>" alt="">
        </div>
        <br>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link"><i class="fas fa-fire"></i> <span>DASHBOARD</span></a>
            </li>
            <li class="menu-header">Master</li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('vendor/perusahaan') ?>" class="nav-link"><i class="fas fa-users"></i> <span>Identitas Perusahaan</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('vendor/pengalaman') ?>" class="nav-link"><i class="fas fa-users"></i> <span>Pengalaman Kerja</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('vendor/tenaga') ?>" class="nav-link"><i class="fas fa-users"></i> <span>Tenaga Ahli</span></a>
            </li>

            </li>
            <li class="menu-header">Paket Tender Baru</li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('vendor/paket_baru') ?>" class="nav-link"><i class="fas fa-file"></i> <span>Daftar Paket Baru</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('vendor/tender_diikuti') ?>" class="nav-link"><i class="fas fa-file"></i> <span>Tender Dikuti</span></a>
            </li>
            <li class="menu-header">Pengaturan</li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link"><i class="fas fa-users"></i> <span>Kelola Akun</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Vendor
            </a>
        </div>
    </aside>
</div>