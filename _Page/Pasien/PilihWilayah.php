<?php
    include "../../_Config/Connection.php";
    if(!empty($_POST["kategori"])){
        if(!empty($_POST["KodeWilayah"])){
            $kategori=$_POST["kategori"];
            $KodeWilayah=$_POST["KodeWilayah"];
            echo '<option>Pilih</option>';
            $Qry = mysqli_query($Conn, "SELECT * FROM wilayah WHERE kategori='$kategori' AND kode like '%$KodeWilayah%' ORDER BY nama ASC");
            while ($data = mysqli_fetch_array($Qry)) {
                $id_wilayah= $data['id_wilayah'];
                $kode= $data['kode'];
                $nama= $data['nama'];
                if(!empty($data['id_wilayah'])){
                    echo '<option value="'.$kode.'">'.$nama.'</option>';
                }
            }
        }
    }
?>