<?php
    session_start();
    $_SESSION ["SesiIdAkses"]="";
    $_SESSION ["SesiNotifikasi"]="";
    unset($_SESSION['SesiIdAkses']);
    unset($_SESSION['SesiNotifikasi']);
    session_destroy();   
    session_unset();
    header('Location:../../Login.php');
?>