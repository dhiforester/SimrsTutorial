<?php 
    //Routing File JS Berdasarkan Halaman
    if(empty($_GET['Page'])){
        echo '<script type="text/javascript" src="_Page/Beranda/Beranda.js"></script>';
    }else{
        $Page=$_GET['Page'];
        if($Page=="Akses"){
            echo '<script type="text/javascript" src="_Page/Akses/Akses.js"></script>';
        }else{
            if($Page=="Pasien"){
                echo '<script type="text/javascript" src="_Page/Pasien/Pasien.js"></script>';
            }else{
                if($Page=="Pengaturan"){
                    echo '<script type="text/javascript" src="_Page/Pengaturan/Pengaturan.js"></script>';
                }else{
                    echo '<script type="text/javascript" src="_Page/Beranda/Beranda.js"></script>';
                }
            }
        }
    }
?>