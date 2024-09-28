<style>
    small {
        font-size: 12px;
    }
</style>

<div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fa fa-circle text-success fa-sm"></i></div>
                                <small><?php echo $_SESSION['nama_lengkap']; ?></small>
                            </a>
                        
                            <a class="nav-link" href="./">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseanggota" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Data Pengguna
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseanggota" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="administrator">Administrator</a>
                                </nav>
                            </div>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsemaster" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Master Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsemaster" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="kecamatan">Kecamatan</a>
                                    <a class="nav-link" href="alatangkut">Alat Angkut</a>
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsetransaksi" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-arrow-alt-circle-down"></i></div>
                                Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsetransaksi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="tps">Hotspot</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="feedback">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-message"></i></div>
                                feedback
                            </a>

                            <!-- <a class="nav-link" href="url.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-link"></i></div>
                                Short URl
                            </a> -->

                            <a class="nav-link" href="../logout">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                               Logout
                            </a>

                        </div>
                    </div>