<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_pengaturan'])){
        echo '<span class="text-danger">ID Pengaturan tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_pengaturan=$_POST['id_pengaturan'];
        //Proses hapus data
        $HapusPengaturan = mysqli_query($Conn, "DELETE FROM pengaturan WHERE id_pengaturan='$id_pengaturan'") or die(mysqli_error($Conn));
        if ($HapusPengaturan) {
            echo '<span class="text-success" id="NotifikasiHapusPengaturanVclaimBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>