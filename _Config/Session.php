<?php
    //Menangkap seasson kemudian menampilkannya
    session_start();
    if(empty($_SESSION["SesiIdAkses"])){
        header("Location:Login.php");
    }else{
        $SessionIdAkses=$_SESSION ["SesiIdAkses"];
        //Inisiasi data akses dari database
        $QuerySessionAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$SessionIdAkses'")or die(mysqli_error($Conn));
        $DataSessionAkses = mysqli_fetch_array($QuerySessionAkses);
        //Apabila data akses ada
        if(!empty($DataSessionAkses['id_akses'])){
            $SessionNama= $DataSessionAkses['nama'];
            $SessionEmail= $DataSessionAkses['email'];
            $SessionKontak= $DataSessionAkses['kontak'];
            $SessionAkses= $DataSessionAkses['akses'];
        }else{
            header("Location:Login.php");
        }
    }
?>
