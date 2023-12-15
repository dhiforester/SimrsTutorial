<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Function.php";
    //Tangkap id_pasien
    if(empty($_POST['id_pasien'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center text-danger mb-3">';
        echo '      ID Pasien Tidak Boleh Kosong!.';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_pasien=$_POST['id_pasien'];
        $nama=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'nama');
        $nik=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'nik');
        $no_bpjs=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'no_bpjs');
        $kontak=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'kontak');
        $tempat_lahir=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'tempat_lahir');
        $tanggal_lahir=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'tanggal_lahir');
        $gender=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'gender');
        $provinsi=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'provinsi');
        $kabupaten=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'kabupaten');
        $kecamatan=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'kecamatan');
        $desa=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'desa');
        $alamat=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'alamat');
        $golongan_darah=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'golongan_darah');
        $status=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'status');
        $tanggal_daftar=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'tanggal_daftar');
        //Membuka Nama nama wilayah
        $provinsi=getDataDetail($Conn,'wilayah','kode',$provinsi,'nama');
        $kabupaten=getDataDetail($Conn,'wilayah','kode',$kabupaten,'nama');
        $kecamatan=getDataDetail($Conn,'wilayah','kode',$kecamatan,'nama');
        $desa=getDataDetail($Conn,'wilayah','kode',$desa,'nama');
?>
    <div class="row mb-3">
        <div class="col-md-4">Nama</div>
        <div class="col-md-8"><code><?php echo "$nama"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">NIK</div>
        <div class="col-md-8"><code><?php echo "$nik"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">No.BPJS</div>
        <div class="col-md-8"><code><?php echo "$no_bpjs"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Kontak</div>
        <div class="col-md-8"><code><?php echo "$kontak"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">TTL</div>
        <div class="col-md-8"><code><?php echo "$tempat_lahir, $tanggal_lahir"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Gender</div>
        <div class="col-md-8"><code><?php echo "$gender"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Provinsi</div>
        <div class="col-md-8"><code><?php echo "$provinsi"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Kabupaten/Kota</div>
        <div class="col-md-8"><code><?php echo "$kabupaten"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Kecamatan</div>
        <div class="col-md-8"><code><?php echo "$kecamatan"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Desa/Kelurahan</div>
        <div class="col-md-8"><code><?php echo "$desa"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Alamat</div>
        <div class="col-md-8"><code><?php echo "$alamat"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Gol.Darah</div>
        <div class="col-md-8"><code><?php echo "$golongan_darah"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Status</div>
        <div class="col-md-8"><code><?php echo "$status"; ?></code></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">Tanggal Daftar</div>
        <div class="col-md-8"><code><?php echo "$tanggal_daftar"; ?></code></div>
    </div>
<?php }?>