<?php 
    //Routing File JS Berdasarkan Halaman
    if(empty($_GET['Page'])){
        echo '<script type="text/javascript" src="_Page/Beranda/Beranda.js"></script>';
    }else{
        $Page=$_GET['Page'];
        if($Page=="Akses"){
            echo '<script type="text/javascript" src="_Page/Akses/Akses.js"></script>';
        }
    }
?>