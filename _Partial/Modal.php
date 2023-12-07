<?php
    if(empty($_GET['Page'])){
        include "_Page/Beranda/ModalBeranda.php";
    }else{
        $Page=$_GET['Page'];
        //Nanti Di Routing Fitur Modal atau Popup Di Sini
        if($Page=="Akses"){
            include "_Page/Akses/ModalAkses.php";
        }
    }
    //Modal Global
    include "_Page/Logout/ModalLogout.php";
?>