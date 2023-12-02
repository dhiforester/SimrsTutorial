<?php
    if(empty($_GET['Page'])){
        $Page="";
    }else{
        $Page=$_GET['Page'];
    }
    //Nanti Di Routing Fitur Modal atau Popup Di Sini
    include "_Page/Beranda/ModalBeranda.php";
?>