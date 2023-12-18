//Menampilkan List Pengaturan Pertama Kali
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Pengaturan/ListPengaturanBridging.php',
    success     : function(data){
        $('#ListPengaturanBridging').html(data);
    }
});
//Ketika Menampilkan Modal Tambah Pengaturan 
$('#ModalTambahPengaturanVclaim').on('show.bs.modal', function (e) {
    $('#NotifikasiTambahPengaturanVclaim').html('<small><code class="text-primary">Pastkan data pengaturan yang anda input sudah benar</code></small>');
    $('#FormTambahPengaturanVclaim').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pengaturan/FormTambahPengaturanVclaim.php',
        success     : function(data){
            $('#FormTambahPengaturanVclaim').html(data);
        }
    });
});
//Ketika Proses Submit Pengaturan
$('#ProsesTambahPengaturanVclaim').submit(function(){
    $('#NotifikasiTambahPengaturanVclaim').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahPengaturanVclaim')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pengaturan/ProsesTambahPengaturanVclaim.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahPengaturanVclaim').html(data);
            var NotifikasiTambahPengaturanVclaimBerhasil=$('#NotifikasiTambahPengaturanVclaimBerhasil').html();
            if(NotifikasiTambahPengaturanVclaimBerhasil=="Success"){
                //Menutup Modal
                $('#ModalTambahPengaturanVclaim').modal('hide');
                //Menampilkan Data
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pengaturan/ListPengaturanBridging.php',
                    success     : function(data){
                        $('#ListPengaturanBridging').html(data);
                    }
                });
                //Menampilkan Swal
                swal("Berhasil!", "Tambah Pengaturan Bridging Berhasil Berhasil", "success");
            }
        }
    });
});
//Modal Edit Pengaturan Vclaim
$('#ModalEditPengaturanVclaim').on('show.bs.modal', function (e) {
    var id_pengaturan = $(e.relatedTarget).data('id');
    $('#FormEditPengaturanVclaim').html("Loading...");
    $('#NotifikasiEditPengaturanVclaim').html('<small><code class="text-primary">Pastkan data pengaturan yang anda input sudah benar</code></small>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pengaturan/FormEditPengaturanVclaim.php',
        data        : {id_pengaturan: id_pengaturan},
        success     : function(data){
            $('#FormEditPengaturanVclaim').html(data);
        }
    });
});
//Ketika Proses Edit Pengaturan
$('#ProsesEditPengaturanVclaim').submit(function(){
    $('#NotifikasiEditPengaturanVclaim').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditPengaturanVclaim')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pengaturan/ProsesEditPengaturanVclaim.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditPengaturanVclaim').html(data);
            var NotifikasiEditPengaturanVclaimBerhasil=$('#NotifikasiEditPengaturanVclaimBerhasil').html();
            if(NotifikasiEditPengaturanVclaimBerhasil=="Success"){
                //Menutup Modal
                $('#ModalEditPengaturanVclaim').modal('hide');
                //Menampilkan Data
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pengaturan/ListPengaturanBridging.php',
                    success     : function(data){
                        $('#ListPengaturanBridging').html(data);
                    }
                });
                //Menampilkan Swal
                swal("Berhasil!", "Edit Pengaturan Bridging Berhasil Berhasil", "success");
            }
        }
    });
});
//Modal Hapus Pasien
$('#ModalHapusPengaturanVclaim').on('show.bs.modal', function (e) {
    var id_pengaturan = $(e.relatedTarget).data('id');
    $('#PutIdPengaturan').val(id_pengaturan);
    $('#NotifikasiHapusPengaturanVclaim').html('<small><code class="text-primary">Apakah Anda Yakin Akan Menghapus Data Tersebut?</code></small>');
});
//Ketika Proses Hapus Pengaturan
$('#ProsesHapusPengaturanVclaim').submit(function(){
    $('#NotifikasiHapusPengaturanVclaim').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesHapusPengaturanVclaim')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pengaturan/ProsesHapusPengaturanVclaim.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiHapusPengaturanVclaim').html(data);
            var NotifikasiHapusPengaturanVclaimBerhasil=$('#NotifikasiHapusPengaturanVclaimBerhasil').html();
            if(NotifikasiHapusPengaturanVclaimBerhasil=="Success"){
                //Menutup Modal
                $('#ModalHapusPengaturanVclaim').modal('hide');
                //Menampilkan Data
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pengaturan/ListPengaturanBridging.php',
                    success     : function(data){
                        $('#ListPengaturanBridging').html(data);
                    }
                });
                //Menampilkan Swal
                swal("Berhasil!", "Hapus Pengaturan Bridging Berhasil Berhasil", "success");
            }
        }
    });
});
//Modal Hapus Pasien
$('#ModalGenerateSignature').on('show.bs.modal', function (e) {
    var id_pengaturan = $(e.relatedTarget).data('id');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pengaturan/HasilGenerateSignature.php',
        data 	    :  {id_pengaturan: id_pengaturan},
        success     : function(data){
            $('#HasilGenerateSignature').val(data);
        }
    });
});