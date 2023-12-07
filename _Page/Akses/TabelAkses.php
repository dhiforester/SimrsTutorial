<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    //kategori
    if(!empty($_POST['kategori'])){
        $kategori=$_POST['kategori'];
    }else{
        $kategori="";
    }
    //Keyword_by
    if(!empty($_POST['keyword_by'])){
        $keyword_by=$_POST['keyword_by'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['keyword'])){
        $keyword=$_POST['keyword'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['batas'])){
        $batas=$_POST['batas'];
    }else{
        $batas="10";
    }
    //ShortBy
    if(!empty($_POST['ShortBy'])){
        $ShortBy=$_POST['ShortBy'];
    }else{
        $ShortBy="DESC";
    }
    //OrderBy
    if(!empty($_POST['OrderBy'])){
        $OrderBy=$_POST['OrderBy'];
    }else{
        $OrderBy="id_akses";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($keyword_by)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE nama like '%$keyword%' OR kontak like '%$keyword%' OR email like '%$keyword%' OR akses like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE $keyword_by like '%$keyword%'"));
        }
    }
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $('#MenampilkanTabelAksesFitur').html('Loading...');
        $.ajax({
            url     : "_Page/AksesFitur/TabelFiturAkses.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelAksesFitur').html(data);
                $('#page').val(valueNext);
            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $('#MenampilkanTabelAksesFitur').html('Loading...');
        $.ajax({
            url     : "_Page/AksesFitur/TabelFiturAkses.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelAksesFitur').html(data);
                $('#page').val(ValuePrev);
            }
        })
    });
    <?php 
        $JmlHalaman =ceil($jml_data/$batas); 
        $a=1;
        $b=$JmlHalaman;
        for ( $i =$a; $i<=$b; $i++ ){
    ?>
        //ketika klik page number
        $('#PageNumber<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumber<?php echo $i;?>').val();
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $('#MenampilkanTabelAksesFitur').html('Loading...');
            $.ajax({
                url     : "_Page/AksesFitur/TabelFiturAkses.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelAksesFitur').html(data);
                    $('#page').val(PageNumber);
                }
            })
        });
    <?php } ?>
</script>
<?php
    if(empty($jml_data)){
        echo '<div class="card">';
        echo '  <div class="card-body text-center text-danger">';
        echo '      Tidak Ada Akun Akses Yang Ditampilkan';
        echo '  </div>';
        echo '</div>';
    }else{
        $no = 1+$posisi;
        //KONDISI PENGATURAN MASING FILTER
        if(empty($keyword_by)){
            if(empty($keyword)){
                $query = mysqli_query($Conn, "SELECT*FROM akses ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }else{
                $query = mysqli_query($Conn, "SELECT*FROM akses WHERE nama like '%$keyword%' OR kontak like '%$keyword%' OR email like '%$keyword%' OR akses like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }
        }else{
            if(empty($keyword)){
                $query = mysqli_query($Conn, "SELECT*FROM akses ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }else{
                $query = mysqli_query($Conn, "SELECT*FROM akses WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }
        }
        while ($data = mysqli_fetch_array($query)) {
            $id_akses=$data['id_akses'];
            $nama=$data['nama'];
            $kontak=$data['kontak'];
            $email= $data['email'];
            $akses= $data['akses'];
?>
            <div class="card">
                <div class="card-body">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style="">
                            <li class="dropdown-header text-start">
                                <h6>Option</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#ModalDetailAkses" data-id="<?php echo "$id_akses"; ?>">
                                    <i class="bi bi-info-circle"></i> Detail
                                </a> 
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#ModalEditAkses" data-id="<?php echo "$id_akses"; ?>">
                                    <i class="bi bi-pencil-square"></i> Edit Akses
                                </a> 
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#ModalUbahPassword" data-id="<?php echo "$id_akses"; ?>">
                                    <i class="bi bi-key"></i> Ubah Password
                                </a> 
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalHapusAkses" data-id="<?php echo "$id_akses"; ?>">
                                    <i class="bi bi-x"></i> Hapus Akses
                                </a>
                            </li>
                        </ul>
                    </div>
                    <b class="card-title">
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailAkses" data-id="<?php echo "$id_akses"; ?>">
                            <?php echo "$no. $nama" ?>
                        </a>
                    </b>
                    <div class="row">
                        <div class="col-md-12">
                            <ul>
                                <li>
                                    <i class="bi bi-envelope"></i> Email : <code><?php echo "$email" ?></code>
                                </li>
                                <li>
                                    <i class="bi bi-phone"></i> Kontak : <code><?php echo "$kontak" ?></code>
                                </li>
                                <li>
                                    <i class="bi bi-key"></i> Akses : <code><?php echo "$akses" ?></code>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
<?php
            $no++; 
        }
    }
?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center">
        <div class="btn-group shadow-0" role="group" aria-label="Basic example">
            <?php
                //Mengatur Halaman
                $JmlHalaman = ceil($jml_data/$batas); 
                $JmlHalaman_real = ceil($jml_data/$batas); 
                $prev=$page-1;
                $next=$page+1;
                if($next>$JmlHalaman){
                    $next=$page;
                }else{
                    $next=$page+1;
                }
                if($prev<"1"){
                    $prev="1";
                }else{
                    $prev=$page-1;
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="PrevPage" value="<?php echo $prev;?>">
                <span aria-hidden="true">«</span>
            </button>
            <?php 
                //Navigasi nomor
                if($JmlHalaman>3){
                    if($page>=2){
                        $a=$page-1;
                        $b=$page+1;
                        if($JmlHalaman<=$b){
                            $a=$page-1;
                            $b=$JmlHalaman;
                        }
                    }else{
                        $a=1;
                        $b=$page+1;
                        if($JmlHalaman<=$b){
                            $a=1;
                            $b=$JmlHalaman;
                        }
                    }
                }else{
                    $a=1;
                    $b=$JmlHalaman;
                }
                for ( $i =$a; $i<=$b; $i++ ){
                    if($page=="$i"){
                        echo '<button class="btn btn-sm btn-info" id="PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPage" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
</div>