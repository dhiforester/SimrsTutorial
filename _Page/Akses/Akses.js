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