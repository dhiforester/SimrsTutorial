<?php
    //Memanggil Detail Data
    function getDataDetail($Conn,$NamaDb,$NamaParam,$IdParam,$Kolom){
        $QryParam = mysqli_query($Conn,"SELECT * FROM $NamaDb WHERE $NamaParam='$IdParam'")or die(mysqli_error($Conn));
        $DataParam = mysqli_fetch_array($QryParam);
        if(empty($DataParam[$Kolom])){
            $Response="";
        }else{
            $Response=$DataParam[$Kolom];
        }
        return $Response;
    }
    //Format Tanggal
    function FormatDateTime($Format,$Tanggal){
        date_default_timezone_set('Asia/Jakarta');
        $strtotime=strtotime($Tanggal);
        $Response=date($Format, $strtotime);
        return $Response;
    }
    //Validasi Input Hanya Boleh Angka Huruf dan Spasi
    function validasiInput($input) {
        // Hanya huruf, angka, dan spasi yang diperbolehkan
        $pattern = '/^[A-Za-z0-9\s]+$/';
        // Lakukan validasi
        if (preg_match($pattern, $input)) {
            $Response="Success";
        } else {
            $Response="Hanya Boleh Huruf, Angka dan Spasi";
        }
        return $Response;
    }
?>