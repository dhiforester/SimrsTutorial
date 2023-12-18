<?php
    date_default_timezone_set('UTC');
    include "../../_Config/Connection.php";
    include "../../_Config/Function.php";
    if(!empty($_POST['id_pengaturan'])){
        $id_pengaturan=$_POST['id_pengaturan'];
    }else{
        $id_pengaturan="";
    }
    $profile_pengaturan=getDataDetail($Conn,'pengaturan','id_pengaturan',$id_pengaturan,'profile_pengaturan');
    $kategori_pengaturan=getDataDetail($Conn,'pengaturan','id_pengaturan',$id_pengaturan,'kategori_pengaturan');
    $pengaturan=getDataDetail($Conn,'pengaturan','id_pengaturan',$id_pengaturan,'pengaturan');
    $status=getDataDetail($Conn,'pengaturan','id_pengaturan',$id_pengaturan,'status');
    $pengaturan = json_decode($pengaturan, true);
    $url_api=$pengaturan['url_api'];
    $cons_id=$pengaturan['cons_id'];
    $user_key=$pengaturan['user_key'];
    $secret_key=$pengaturan['secret_key'];
    $kode_ppk=$pengaturan['kode_ppk'];
    $timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));
    //Creat Signature
    $signature = hash_hmac('sha256', $cons_id."&".$timestamp, $secret_key, true);
    // base64 encode…
    $encodedSignature = base64_encode($signature);
    echo $encodedSignature;
?>