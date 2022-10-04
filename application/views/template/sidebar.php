<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand" style="margin-bottom: 50px;">
            <img class="img-fluid mb-2 mt-3" width="60px" style="margin-top: -20px;" src="<?= base_url('assets/tower.png') ?>" alt="">
            <label for=""><b>TENDER BTS</b></label>
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
            <?php if ($this->session->userdata('id_role') == 2) { ?>

            <?php       } else { ?>
                <li class="menu-header">Master</li>
                <li class="nav-item dropdown">
                    <a href="<?= base_url('pegawai') ?>" class="nav-link"><i class="fas fa-users"></i> <span>Pegawai</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="<?= base_url('pegawai/pengajuan') ?>" class="nav-link"><i class="fas fa-users"></i> <span>Pengajuan</span></a>
                </li>
            <?php     }
            ?>
            </li>
            <?php if ($this->session->userdata('id_role') == 2) { ?>

            <?php       } else { ?>
                <li class="menu-header">Rencana Umum Pengadaan</li>
                <li class="nav-item dropdown">
                    <a href="<?= base_url('paket') ?>" class="nav-link"><i class="fas fa-file"></i> <span>Rup </span></a>
                </li>
                <li class="menu-header">Paket</li>
                <li class="nav-item dropdown">
                    <a href="<?= base_url('paket/paket_tender') ?>" class="nav-link"><i class="fas fa-file"></i> <span>Paket Tender </span></a>
                </li>
            <?php     }
            ?>

            <?php if ($this->session->userdata('id_role') == 1) { ?>

            <?php       } else { ?>
                <li class="menu-header">Daftar paket</li>
                <li class="nav-item dropdown">
                    <a href="<?= base_url('paket/daftar_paket') ?>" class="nav-link"><i class="fas fa-file"></i> <span>Paket Tender </span></a>
                </li>
            <?php     }
            ?>

            <?php if ($this->session->userdata('id_role') == 2) { ?>
                <li class="menu-header">Tender Berlangsung</li>
                <li class="nav-item dropdown">
                    <a href="<?= base_url('paket/informasi_tender') ?>" class="nav-link"><i class="fas fa-file"></i> <span>Informasi Tender </span></a>
                </li>
            <?php       } else { ?>
            <?php     }
            ?>
            <li class="menu-header">Pengaturan</li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link"><i class="fas fa-users"></i> <span>Kelola Akun</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> TENDER BTS
            </a>
        </div>
    </aside>
</div>