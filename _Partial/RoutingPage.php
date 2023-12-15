<?php
    if(empty($_GET['Page'])){
        include "_Page/Beranda/Beranda.php";
    }else{
        $Page=$_GET['Page'];
        if($Page=="Akses"){
            include "_Page/Akses/Akses.php";
        }else{
            if($Page=="Pasien"){
                include "_Page/Pasien/Pasien.php";
            }
        }
    }
?>