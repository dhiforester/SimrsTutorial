<?php
    if(empty($_GET['Page'])){
        include "_Page/Beranda/ModalBeranda.php";
    }else{
        $Page=$_GET['Page'];
        //Nanti Di Routing Fitur Modal atau Popup Di Sini
        if($Page=="Akses"){
            include "_Page/Akses/ModalAkses.php";
        }else{
            if($Page=="Pasien"){
                include "_Page/Pasien/ModalPasien.php";
            }else{
                if($Page=="Pengaturan"){
                    include "_Page/Pengaturan/ModalPengaturan.php";
                }
            }
        }
    }
    //Modal Global
    include "_Page/Logout/ModalLogout.php";
?>