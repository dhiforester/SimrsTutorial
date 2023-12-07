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
?>