<?php
    if(!empty($_SESSION['SesiNotifikasi'])){
        $NotifikasiSwal=$_SESSION['SesiNotifikasi'];
?>
    <!------- ROUTING SWAL BERDASARKAN SESSION ------------>
    <?php if($NotifikasiSwal=="Login Berhasil"){ ?>
        <script>
            swal("Selamat Datang!", "Login Berhasil", "success");
        </script>
    <?php } ?>
<?php 
        unset($_SESSION['SesiNotifikasi']);
    }
?>