//Menampilkan Akses Pertama Kali
$('#MenampilkanTabelPasien').html("Loading...");
var ProsesBatas = $('#ProsesBatas').serialize();
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Pasien/TabelPasien.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelPasien').html(data);
    }
});
//Ketika Batas Data Diubah
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelPasien').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pasien/TabelPasien.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelPasien').html(data);
        }
    });
});
//Ketika keyword_by
$('#keyword_by').change(function(){
    var keyword_by = $('#keyword_by').val();
    $('#FormKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pasien/FormKeyword.php',
        data 	    :  {keyword_by: keyword_by},
        success     : function(data){
            $('#FormKeyword').html(data);
        }
    });
});
//Ketika Submit Proses Filter Dan Pencarian
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelPasien').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pasien/TabelPasien.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelPasien').html(data);
        }
    });
});
//Ketika Modal Tambah Pasien Muncul
$('#ModalTambahPasien').on('show.bs.modal', function (e) {
    $('#NotifikasiTambahPasien').html('<small><code class="text-primary">Pastkan data pasien yang anda input sudah benar</code></small>');
});
//Ketika Mengetik nama
$('#nama').keyup(function(){
    var textValue = $('#nama').val();
    //Hitung Jumlah Karakter
    var lengthValue=textValue.length;
    //menampilkan Pada label
    $('#panjang_nama').html(lengthValue);
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
$('#tempat_lahir').keyup(function(){
    var textValue = $('#tempat_lahir').val();
    //Hitung Jumlah Karakter
    var lengthValue=textValue.length;
    //menampilkan Pada label
    $('#panjang_tempat_lahir').html(lengthValue);
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
$('#alamat').keyup(function(){
    var textValue = $('#alamat').val();
    //Hitung Jumlah Karakter
    var lengthValue=textValue.length;
    //menampilkan Pada label
    $('#panjang_alamat').html(lengthValue);
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
$('#propinsi').change(function(){
    $('#desa').html("<option>Pilih</option>");
    $('#kecamatan').html("<option>Pilih</option>");
    $('#kabupaten').html("<option>Loading..</option>");
    var kategori = "Kota Kabupaten";
    var KodeWilayah = $('#propinsi').val();
    $.ajax({
        type 	: 'POST',
        url 	: '_Page/Pasien/PilihWilayah.php',
        data 	:  {kategori: kategori, KodeWilayah: KodeWilayah},
        success : function(data){
            $('#kabupaten').html(data);
        }
    });
});
//Kabupaten
$('#kabupaten').change(function(){
    $('#desa').html("<option>Pilih</option>");
    $('#kecamatan').html("<option>Loading..</option>");
    var kategori = "Kecamatan";
    var KodeWilayah = $('#kabupaten').val();
    $.ajax({
        type 	: 'POST',
        url 	: '_Page/Pasien/PilihWilayah.php',
        data 	:  {kategori: kategori, KodeWilayah: KodeWilayah},
        success : function(data){
            $('#kecamatan').html(data);
        }
    });
});
//Kecamatan
$('#kecamatan').change(function(){
    $('#desa').html("<option>Loading..</option>");
    var kategori = "Kelurahan";
    var KodeWilayah = $('#kecamatan').val();
    $.ajax({
        type 	: 'POST',
        url 	: '_Page/Pasien/PilihWilayah.php',
        data 	:  {kategori: kategori, KodeWilayah: KodeWilayah},
        success : function(data){
            $('#desa').html(data);
        }
    });
});
//Ketika Proses Submit Tambah Pasien
$('#ProsesTambahPasien').submit(function(){
    $('#NotifikasiTambahPasien').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahPasien')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pasien/ProsesTambahPasien.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahPasien').html(data);
            var NotifikasiTambahPasienBerhasil=$('#NotifikasiTambahPasienBerhasil').html();
            if(NotifikasiTambahPasienBerhasil=="Success"){
                //Menutup Modal
                $('#ModalTambahPasien').modal('hide');
                //Reset Form Tambah
                $('#ProsesTambahPasien')[0].reset();
                //Reset Form Filter Data
                $('#ProsesBatas')[0].reset();
                //Menampilkan Data
                var ProsesBatas = $('#ProsesBatas').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pasien/TabelPasien.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelPasien').html(data);
                    }
                });
                //Menampilkan Swal
                swal("Berhasil!", "Tambah Pasien Berhasil", "success");
            }
        }
    });
});
//Modal Detail Pasien
$('#ModalDetailPasien').on('show.bs.modal', function (e) {
    var id_pasien = $(e.relatedTarget).data('id');
    $('#FormDetailPasien').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pasien/FormDetailPasien.php',
        data        : {id_pasien: id_pasien},
        success     : function(data){
            $('#FormDetailPasien').html(data);
        }
    });
});
//Modal Edit Pasien
$('#ModalEditPasien').on('show.bs.modal', function (e) {
    var id_pasien = $(e.relatedTarget).data('id');
    $('#FormEditPasien').html("Loading...");
    $('#NotifikasiEditPasien').html('<small><code class="text-primary">Pastkan data pasien yang anda input sudah benar</code></small>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pasien/FormEditPasien.php',
        data        : {id_pasien: id_pasien},
        success     : function(data){
            $('#FormEditPasien').html(data);
        }
    });
});
//Ketika Proses Submit Edit Pasien
$('#ProsesEditPasien').submit(function(){
    $('#NotifikasiEditPasien').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditPasien')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pasien/ProsesEditPasien.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditPasien').html(data);
            var NotifikasiEditPasienBerhasil=$('#NotifikasiEditPasienBerhasil').html();
            if(NotifikasiEditPasienBerhasil=="Success"){
                //Menutup Modal
                $('#ModalEditPasien').modal('hide');
                //Reset Form Edit
                $('#ProsesEditPasien')[0].reset();
                //Menampilkan Data
                var ProsesBatas = $('#ProsesBatas').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pasien/TabelPasien.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelPasien').html(data);
                    }
                });
                //Menampilkan Swal
                swal("Berhasil!", "Edit Pasien Berhasil", "success");
            }
        }
    });
});
//Modal Hapus Pasien
$('#ModalHapusPasien').on('show.bs.modal', function (e) {
    var id_pasien = $(e.relatedTarget).data('id');
    $('#PutIdPasien').val(id_pasien);
    $('#NotifikasiHapusPasien').html('<small><code class="text-primary">Apakah anda yakin akan menghapus data ini?</code></small>');
});
//Ketika Proses Submit Hapus Pasien
$('#ProsesHapusPasien').submit(function(){
    $('#NotifikasiHapusPasien').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesHapusPasien')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pasien/ProsesHapusPasien.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiHapusPasien').html(data);
            var NotifikasiHapusPasienBerhasil=$('#NotifikasiHapusPasienBerhasil').html();
            if(NotifikasiHapusPasienBerhasil=="Success"){
                //Menutup Modal
                $('#ModalHapusPasien').modal('hide');
                //Reset Form Hapus
                $('#ProsesHapusPasien')[0].reset();
                //Menampilkan Data
                var ProsesBatas = $('#ProsesBatas').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pasien/TabelPasien.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelPasien').html(data);
                    }
                });
                //Menampilkan Swal
                swal("Berhasil!", "Hapus Pasien Berhasil", "success");
            }
        }
    });
});
//Modal Detail NIK
$('#ModalDetailNik').on('show.bs.modal', function (e) {
    var nik = $(e.relatedTarget).data('id');
    $('#FormDetailNik').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pasien/FormDetailNik.php',
        data        : {nik: nik},
        success     : function(data){
            $('#FormDetailNik').html(data);
        }
    });
});
//Modal Detail BPJS
$('#ModalDetailBpjs').on('show.bs.modal', function (e) {
    var no_bpjs = $(e.relatedTarget).data('id');
    $('#FormDetailBpjs').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pasien/FormDetailBpjs.php',
        data        : {no_bpjs: no_bpjs},
        success     : function(data){
            $('#FormDetailBpjs').html(data);
        }
    });
});