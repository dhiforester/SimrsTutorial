<?php
    if(!empty($_SESSION['NotifikasiSwal'])){
        $NotifikasiSwal=$_SESSION['NotifikasiSwal'];
?>
    <!------- ROUTING SWAL BERDASARKAN SESSION ------------>
    <?php if($NotifikasiSwal=="Login Berhasil"){ ?>
        <script>
            swal("Welcome back!", "Login Successful", "success");
        </script>
    <?php } ?>
<?php 
        unset($_SESSION['NotifikasiSwal']);
    }
?>