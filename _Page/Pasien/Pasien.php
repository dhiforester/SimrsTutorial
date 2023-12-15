<?php
    //Routing Halaman Sub Pasien
    if(empty($_GET['Sub'])){
        include "_Page/Pasien/PasienHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailPasien"){
            include "_Page/Pasien/DetailPasien.php";
        }else{
           
        }
    }
?>