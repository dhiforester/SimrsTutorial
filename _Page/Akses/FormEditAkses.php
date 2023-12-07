<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Function.php";
    //Tangkap id_akses
    if(empty($_POST['id_akses'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 mb-3">';
        echo '      ID Akses Tidak Boleh Kosong!.';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_akses=$_POST['id_akses'];
        $nama=getDataDetail($Conn,'akses','id_akses',$id_akses,'nama');
        $kontak=getDataDetail($Conn,'akses','id_akses',$id_akses,'kontak');
        $email=getDataDetail($Conn,'akses','id_akses',$id_akses,'email');
        $akses=getDataDetail($Conn,'akses','id_akses',$id_akses,'akses');
?>
    <input type="hidden" name="id_akses" value="<?php echo "$id_akses"; ?>">
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="nama_akses">Nama Lengkap</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="nama_akses" id="nama_akses" class="form-control" value="<?php echo "$nama"; ?>">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="kontak_akses">Nomor Kontak</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="kontak_akses" id="kontak_akses" class="form-control" placeholder="62" value="<?php echo "$kontak"; ?>">
            <small>Hanya boleh angka (maksimal 20 karakter)</small>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="email_akses">Email</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="email_akses" id="email_akses" class="form-control" placeholder="alamat-email@domain.com" value="<?php echo "$email"; ?>">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="akses">Level Akses</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="akses" id="akses" list="ListAkses" class="form-control" value="<?php echo "$akses"; ?>">
            <datalist id="ListAkses">
                <?php
                    //Array Data akses
                    $QryAkses = mysqli_query($Conn, "SELECT DISTINCT akses FROM akses ORDER BY akses ASC");
                    while ($DataAkses = mysqli_fetch_array($QryAkses)) {
                        $akses= $DataAkses['akses'];
                        echo '<option value="'.$akses.'">';
                    }
                ?>
            </datalist>
            <small>Hanya boleh angka (maksimal 20 karakter)</small>
        </div>
    </div>
<?php }?>