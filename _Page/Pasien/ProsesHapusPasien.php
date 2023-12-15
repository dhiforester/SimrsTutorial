<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_pasien'])){
        echo '<span class="text-danger">ID Pasien tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_pasien=$_POST['id_pasien'];
        //Proses hapus data
        $HapusPasien = mysqli_query($Conn, "DELETE FROM pasien WHERE id_pasien='$id_pasien'") or die(mysqli_error($Conn));
        if ($HapusPasien) {
            echo '<span class="text-success" id="NotifikasiHapusPasienBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>