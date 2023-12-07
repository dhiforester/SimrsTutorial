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
    <div class="row mb-3">
        <div class="col-md-4">Nama</div>
        <div class="col-md-8"><code><?php echo "$nama"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Kontak</div>
        <div class="col-md-8"><code><?php echo "$kontak"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Email</div>
        <div class="col-md-8"><code><?php echo "$email"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Akses</div>
        <div class="col-md-8"><code><?php echo "$akses"; ?></code></div>
    </div>
<?php }?>