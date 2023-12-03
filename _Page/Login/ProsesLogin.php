<?php
    session_start();
    include "../../_Config/Connection.php";
    //Validasi keberadaan email dan password
    if(empty($_POST["email"])){
        $_SESSION ["SesiNotifikasi"]="Email Tidak Boleh Kosong";
        header("Location:../../Login.php");
    }else{
        if(empty($_POST["password"])){
            $_SESSION ["SesiNotifikasi"]="Password Tidak Boleh Kosong";
            header("Location:../../Login.php");
        }else{
            $email=$_POST["email"];
            $password=$_POST["password"];
            $passwordMd5=md5($password);
            //QUERY MEMANGGIL DATA DARI DATABASE Akses
            $Qry=mysqli_query($Conn,"SELECT*FROM akses WHERE email='$email' AND password='$passwordMd5'")or die(mysqli_error($Conn));
            $DataAkses = mysqli_fetch_array($Qry);
            if(!empty($DataAkses["id_akses"])){
                $_SESSION ["SesiIdAkses"]=$DataAkses["id_akses"];
                $_SESSION ["SesiNotifikasi"]="Login Berhasil";
                header("Location:../../index.php");
            }else{
                $_SESSION ["SesiNotifikasi"]="Login gagal karena kombinasi email dan password tidak valid";
                header("Location:../../Login.php");
            }
        }
    }	
?>