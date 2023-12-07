<?php
    if(empty($_GET['Page'])){
        $Page="";
    }else{
        $Page=$_GET['Page'];
    }
?>
<aside id="sidebar" class="sidebar menu_background">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php if($Page==""){echo "collapsed";} ?>" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($Page=="Akses"){echo "collapsed";} ?>" href="index.php?Page=Akses">
                <i class="bi bi-key"></i>
                <span>Akses</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($Page=="Pasien"){echo "collapsed";} ?>" href="index.php?Page=Pasien">
                <i class="bi bi-people"></i>
                <span>Pasien</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($Page=="Kunjungan"){echo "collapsed";} ?>" href="index.php?Page=Kunjungan">
                <i class="bi bi-file-earmark-medical-fill"></i>
                <span>Kunjungan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($Page=="Keuangan"){echo "collapsed";} ?>" href="index.php?Page=Keuangan">
                <i class="bi bi-coin"></i>
                <span>Keuangan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($Page=="Apotek"){echo "collapsed";} ?>" href="index.php?Page=Apotek">
                <i class="bi bi-capsule-pill"></i>
                <span>Apotek</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($Page=="Laboratorium"){echo "collapsed";} ?>" href="index.php?Page=Laboratorium">
                <i class="bi bi-file-medical"></i>
                <span>Laboratorium</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($Page=="Radiologi"){echo "collapsed";} ?>" href="index.php?Page=Radiologi">
                <i class="bi bi-camera"></i>
                <span>Radiologi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($Page=="Hemodialisa"){echo "collapsed";} ?>" href="index.php?Page=Hemodialisa">
                <i class="bi bi-camera"></i>
                <span>Hemodialisa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($Page=="Laporan"){echo "collapsed";} ?>" href="index.php?Page=Laporan">
                <i class="bi bi-file-bar-graph"></i>
                <span>Laporan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($Page=="Pengaturan"){echo "collapsed";} ?>" href="index.php?Page=Pengaturan">
                <i class="bi bi-gear"></i>
                <span>Pengaturan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Keluar</span>
            </a>
        </li>
    </ul>
</aside> 
