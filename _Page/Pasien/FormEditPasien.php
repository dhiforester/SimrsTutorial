<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Function.php";
    //Tangkap id_pasien
    if(empty($_POST['id_pasien'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 mb-3 text-center text-danger">';
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
        //Menghitung panjang karakter
        $KarNama = strlen($nama);
        $KarTempatLahir = strlen($tanggal_lahir);
        $KarAlamat = strlen($alamat);
?>
    <script>
        //Ketika Mengetik nama
        $('#nama2').keyup(function(){
            var textValue = $('#nama2').val();
            //Hitung Jumlah Karakter
            var lengthValue=textValue.length;
            //menampilkan Pada label
            $('#panjang_nama2').html(lengthValue);
            //Batas Krakter Yang diketik
            var maxLength=50;
            if (lengthValue > maxLength) {
                // Potong teks menjadi maxLength karakter
                var truncatedText = textValue.substring(0, maxLength);
                // Atur nilai input menjadi teks yang dipotong
                $(this).val(truncatedText);
            }
        });
        //Ketika Mengetik tempat_lahir
        $('#tempat_lahir2').keyup(function(){
            var textValue = $('#tempat_lahir2').val();
            //Hitung Jumlah Karakter
            var lengthValue=textValue.length;
            //menampilkan Pada label
            $('#panjang_tempat_lahir2').html(lengthValue);
            //Batas Krakter Yang diketik
            var maxLength=20;
            if (lengthValue > maxLength) {
                // Potong teks menjadi maxLength karakter
                var truncatedText = textValue.substring(0, maxLength);
                // Atur nilai input menjadi teks yang dipotong
                $(this).val(truncatedText);
            }
        });
        //Ketika Mengetik alamat
        $('#alamat2').keyup(function(){
            var textValue = $('#alamat2').val();
            //Hitung Jumlah Karakter
            var lengthValue=textValue.length;
            //menampilkan Pada label
            $('#panjang_alamat2').html(lengthValue);
            //Batas Krakter Yang diketik
            var maxLength=50;
            if (lengthValue > maxLength) {
                // Potong teks menjadi maxLength karakter
                var truncatedText = textValue.substring(0, maxLength);
                // Atur nilai input menjadi teks yang dipotong
                $(this).val(truncatedText);
            }
        });
        //propinsi
        $('#propinsi2').change(function(){
            $('#desa2').html("<option>Pilih</option>");
            $('#kecamatan2').html("<option>Pilih</option>");
            $('#kabupaten2').html("<option>Loading..</option>");
            var kategori = "Kota Kabupaten";
            var KodeWilayah = $('#propinsi2').val();
            $.ajax({
                type 	: 'POST',
                url 	: '_Page/Pasien/PilihWilayah.php',
                data 	:  {kategori: kategori, KodeWilayah: KodeWilayah},
                success : function(data){
                    $('#kabupaten2').html(data);
                }
            });
        });
        //Kabupaten
        $('#kabupaten2').change(function(){
            $('#desa2').html("<option>Pilih</option>");
            $('#kecamatan2').html("<option>Loading..</option>");
            var kategori = "Kecamatan";
            var KodeWilayah = $('#kabupaten2').val();
            $.ajax({
                type 	: 'POST',
                url 	: '_Page/Pasien/PilihWilayah.php',
                data 	:  {kategori: kategori, KodeWilayah: KodeWilayah},
                success : function(data){
                    $('#kecamatan2').html(data);
                }
            });
        });
        //Kecamatan
        $('#kecamatan2').change(function(){
            $('#desa2').html("<option>Loading..</option>");
            var kategori = "Kelurahan";
            var KodeWilayah = $('#kecamatan2').val();
            $.ajax({
                type 	: 'POST',
                url 	: '_Page/Pasien/PilihWilayah.php',
                data 	:  {kategori: kategori, KodeWilayah: KodeWilayah},
                success : function(data){
                    $('#desa2').html(data);
                }
            });
        });
    </script>
    <input type="hidden" name="id_pasien" id="id_pasien" value="<?php echo "$id_pasien"; ?>">
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="nama2">Nama Lengkap</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="nama" id="nama2" class="form-control" value="<?php echo "$nama"; ?>">
            <small>
                <code id="panjang_nama2" class="text-dark"><?php echo $KarNama; ?></code>/<code class="text-info">50</code>
            </small>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="nik">NIK</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="nik" id="nik" class="form-control" value="<?php echo "$nik"; ?>">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="no_bpjs">No.BPJS</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="no_bpjs" id="no_bpjs" class="form-control" value="<?php echo "$no_bpjs"; ?>">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="kontak">Nomor Kontak</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="kontak" id="kontak" class="form-control" placeholder="62" value="<?php echo "$kontak"; ?>">
            <small>Hanya boleh angka (maksimal 20 karakter)</small>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="tempat_lahir2">Tempat Lahir</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="tempat_lahir" id="tempat_lahir2" class="form-control" value="<?php echo "$tempat_lahir"; ?>">
            <small>
                <code id="panjang_tempat_lahir2" class="text-dark"><?php echo $KarTempatLahir; ?></code>/<code class="text-info">20</code>
            </small>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="tanggal_lahir">Tanggal Lahir</label>
        </div>
        <div class="col-md-8">
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo "$tanggal_lahir"; ?>">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="gender">Gender</label>
        </div>
        <div class="col-md-8">
            <select name="gender" id="gender" class="form-control">
                <option <?php if($gender==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($gender=="Perempuan"){echo "selected";} ?> value="Perempuan">Perempuan</option>
                <option <?php if($gender=="Laki-laki"){echo "selected";} ?> value="Laki-laki">Laki-laki</option>
            </select>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="propinsi2">Provinsi</label>
        </div>
        <div class="col-md-8">
            <select name="propinsi" id="propinsi2" class="form-control">
                <option value="">Pilih</option>
                <?php
                    //List Provinsi
                    $query = mysqli_query($Conn, "SELECT*FROM wilayah WHERE kategori='Provinsi' ORDER BY nama ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_wilayah=$data['id_wilayah'];
                        $KodeWilayah=$data['kode'];
                        $NamaWilayah=$data['nama'];
                        if($provinsi==$KodeWilayah){
                            echo '<option selected value="'.$KodeWilayah.'">'.$NamaWilayah.'</option>';
                        }else{
                            echo '<option value="'.$KodeWilayah.'">'.$NamaWilayah.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="kabupaten2">Kabupaten</label>
        </div>
        <div class="col-md-8">
            <select name="kabupaten" id="kabupaten2" class="form-control">
                <option value="">Pilih</option>
                <?php
                    if(!empty($provinsi)){
                        //List Kabupaten
                        $query = mysqli_query($Conn, "SELECT*FROM wilayah WHERE kategori='Kota Kabupaten' AND kode like '%$provinsi%' ORDER BY nama ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_wilayah=$data['id_wilayah'];
                            $KodeWilayah=$data['kode'];
                            $NamaWilayah=$data['nama'];
                            if($kabupaten==$KodeWilayah){
                                echo '<option selected value="'.$KodeWilayah.'">'.$NamaWilayah.'</option>';
                            }else{
                                echo '<option value="'.$KodeWilayah.'">'.$NamaWilayah.'</option>';
                            }
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="kecamatan2">Kecamatan</label>
        </div>
        <div class="col-md-8">
            <select name="kecamatan" id="kecamatan2" class="form-control">
                <option value="">Pilih</option>
                <?php
                    if(!empty($kabupaten)){
                        //List Kabupaten
                        $query = mysqli_query($Conn, "SELECT*FROM wilayah WHERE kategori='Kecamatan' AND kode like '%$kabupaten%' ORDER BY nama ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_wilayah=$data['id_wilayah'];
                            $KodeWilayah=$data['kode'];
                            $NamaWilayah=$data['nama'];
                            if($kecamatan==$KodeWilayah){
                                echo '<option selected value="'.$KodeWilayah.'">'.$NamaWilayah.'</option>';
                            }else{
                                echo '<option value="'.$KodeWilayah.'">'.$NamaWilayah.'</option>';
                            }
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="desa2">Desa</label>
        </div>
        <div class="col-md-8">
            <select name="desa" id="desa2" class="form-control">
                <option value="">Pilih</option>
                <?php
                    if(!empty($kecamatan)){
                        //List Desa
                        $query = mysqli_query($Conn, "SELECT*FROM wilayah WHERE kategori='Kelurahan' AND kode like '%$kecamatan%' ORDER BY nama ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_wilayah=$data['id_wilayah'];
                            $KodeWilayah=$data['kode'];
                            $NamaWilayah=$data['nama'];
                            if($desa==$KodeWilayah){
                                echo '<option selected value="'.$KodeWilayah.'">'.$NamaWilayah.'</option>';
                            }else{
                                echo '<option value="'.$KodeWilayah.'">'.$NamaWilayah.'</option>';
                            }
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="alamat2">Alamat</label>
        </div>
        <div class="col-md-8">
            <textarea name="alamat" id="alamat2" class="form-control"><?php echo $alamat; ?></textarea>
            <code id="panjang_alamat2" class="text-dark"><?php echo $KarAlamat; ?></code>/<code class="text-info">50</code>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="golongan_darah">Golongan Darah</label>
        </div>
        <div class="col-md-8">
            <select name="golongan_darah" id="golongan_darah" class="form-control">
                <option <?php if($golongan_darah==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($golongan_darah=="A"){echo "selected";} ?> value="A">A</option>
                <option <?php if($golongan_darah=="B"){echo "selected";} ?> value="B">B</option>
                <option <?php if($golongan_darah=="AB"){echo "selected";} ?> value="AB">AB</option>
                <option <?php if($golongan_darah=="O"){echo "selected";} ?> value="O">O</option>
            </select>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="status">Satatus Pasien</label>
        </div>
        <div class="col-md-8">
            <select name="status" id="status" class="form-control">
                <option <?php if($status==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($status=="Aktiv"){echo "selected";} ?> value="Aktiv">Aktiv</option>
                <option <?php if($status=="Non Aktiv"){echo "selected";} ?> value="Non Aktiv">Non Aktiv</option>
            </select>
        </div>
    </div>
<?php }?>