//Menampilkan Akses Pertama Kali
$('#MenampilkanTabelAkses').html("Loading...");
var ProsesBatas = $('#ProsesBatas').serialize();
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Akses/TabelAkses.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelAkses').html(data);
    }
});
//Ketika Batas Data Diubah
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/TabelAkses.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelAkses').html(data);
        }
    });
});
//Ketika keyword_by
$('#keyword_by').change(function(){
    var keyword_by = $('#keyword_by').val();
    $('#FormKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormKeyword.php',
        data 	    :  {keyword_by: keyword_by},
        success     : function(data){
            $('#FormKeyword').html(data);
        }
    });
});
//Ketika Submit Proses Filter Dan Pencarian
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/TabelAkses.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelAkses').html(data);
        }
    });
});
//Ketika Modal Tambah Akses Muncul
$('#ModalTambahAkses').on('show.bs.modal', function (e) {
    $('#NotifikasiTambahAkses').html('<small class="text-primary">Pastkan data akses yang anda input sudah benar</small>');
});
//Kondisi saat tampilkan password
$('.form-check-input').click(function(){
    if($(this).is(':checked')){
        $('#password1').attr('type','text');
        $('#password2').attr('type','text');
    }else{
        $('#password1').attr('type','password');
        $('#password2').attr('type','password');
    }
});
//Ketika Proses Submit Tambah Akses
$('#ProsesTambahAkses').submit(function(){
    $('#NotifikasiTambahAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahAkses')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesTambahAkses.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahAkses').html(data);
            var NotifikasiTambahAksesBerhasil=$('#NotifikasiTambahAksesBerhasil').html();
            if(NotifikasiTambahAksesBerhasil=="Success"){
                //Menutup Modal
                $('#ModalTambahAkses').modal('hide');
                //Reset Form Tambah
                $('#ProsesTambahAkses')[0].reset();
                $('#password1').attr('type','password');
                $('#password2').attr('type','password');
                //Reset Form Filter Data
                $('#ProsesBatas')[0].reset();
                //Menampilkan Data
                var ProsesBatas = $('#ProsesBatas').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelAkses.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelAkses').html(data);
                    }
                });
                //Menampilkan Swal
                swal("Berhasil!", "Tambah Akses Berhasil", "success");
            }
        }
    });
});
//Ketika Modal Detail Akses Muncul
$('#ModalDetailAkses').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#FormDetailAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormDetailAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormDetailAkses').html(data);
        }
    });
});
//Ketika Modal Edit Akses Muncul
$('#ModalEditAkses').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#NotifikasiEditAkses').html('<small class="text-primary">Pastkan data akses yang anda input sudah benar</small>');
    $('#FormEditAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormEditAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormEditAkses').html(data);
        }
    });
});
//Ketika Proses Submit Edit Akses
$('#ProsesEditAkses').submit(function(){
    $('#NotifikasiEditAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditAkses')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesEditAkses.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditAkses').html(data);
            var NotifikasiEditAksesBerhasil=$('#NotifikasiEditAksesBerhasil').html();
            if(NotifikasiEditAksesBerhasil=="Success"){
                //Menutup Modal
                $('#ModalEditAkses').modal('hide');
                //Menampilkan Data
                var ProsesBatas = $('#ProsesBatas').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelAkses.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelAkses').html(data);
                    }
                });
                //Menampilkan Swal
                swal("Berhasil!", "Edit Akses Berhasil", "success");
            }
        }
    });
});
//Ketika Modal Ubah Password Muncul
$('#ModalUbahPassword').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#NotifikasiUbahPassword').html('<small class="text-primary">Pastkan password yang anda input sudah benar</small>');
    $('#FormUbahPassword').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormUbahPassword.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormUbahPassword').html(data);
            //Kondisi saat tampilkan password
        $('#TampilkanPassword2').click(function(){
            if($(this).is(':checked')){
                $('#password1_edit').attr('type','text');
                $('#password2_edit').attr('type','text');
            }else{
                $('#password1_edit').attr('type','password');
                $('#password2_edit').attr('type','password');
            }
        });
        }
    });
});
//Ketika Proses Submit Edit Password
$('#ProsesUbahPassword').submit(function(){
    $('#NotifikasiUbahPassword').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesUbahPassword')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesUbahPassword.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUbahPassword').html(data);
            var NotifikasiUbahPasswordBerhasil=$('#NotifikasiUbahPasswordBerhasil').html();
            if(NotifikasiUbahPasswordBerhasil=="Success"){
                //Menutup Modal
                $('#ModalUbahPassword').modal('hide');
                //Menampilkan Data
                var ProsesBatas = $('#ProsesBatas').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelAkses.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelAkses').html(data);
                    }
                });
                //Menampilkan Swal
                swal("Berhasil!", "Ubah Password Berhasil", "success");
            }
        }
    });
});
//Ketika Modal Hapus Akses Muncul
$('#ModalHapusAkses').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#NotifikasiHapusAkses').html('<small class="text-primary">Apakah anda yakin akan menghapus data ini?</small>');
    $('#FormHapusAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormHapusAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormHapusAkses').html(data);
        }
    });
});
//Ketika Proses Submit Hapus Akses
$('#ProsesHapusAkses').submit(function(){
    $('#NotifikasiHapusAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesHapusAkses')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesHapusAkses.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiHapusAkses').html(data);
            var NotifikasiHapusAksesBerhasil=$('#NotifikasiHapusAksesBerhasil').html();
            if(NotifikasiHapusAksesBerhasil=="Success"){
                //Menutup Modal
                $('#ModalHapusAkses').modal('hide');
                //Menampilkan Data
                var ProsesBatas = $('#ProsesBatas').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelAkses.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelAkses').html(data);
                    }
                });
                //Menampilkan Swal
                swal("Berhasil!", "Hapus Akses Berhasil", "success");
            }
        }
    });
});