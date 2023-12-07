<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_POST['id_akses'])){
        echo '<span class="text-danger">Sistem Tidak Bisa Menangkap ID akses</span>';
    }else{
        if(empty($_POST['password1'])){
            echo '<span class="text-danger">Password Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['password2'])){
                echo '<span class="text-danger">Password Tidak Boleh Kosong</span>';
            }else{
                $id_akses=$_POST['id_akses'];
                $password1=$_POST['password1'];
                $password2=$_POST['password2'];
                $JumlahPassword1 = strlen($password1);
                $JumlahPassword2 = strlen($password2);
                if($JumlahPassword1<5||$JumlahPassword1>50){
                    echo '<span class="text-danger">Password Harus 6-20 karakter</span>';
                }else{
                    if($JumlahPassword2<5||$JumlahPassword2>50){
                        echo '<span class="text-danger">Password Harus 6-20 karakter</span>';
                    }else{
                        $PasswordEnkripsi=MD5($password1);
                        $UpdatePassword = mysqli_query($Conn,"UPDATE akses SET 
                            password='$PasswordEnkripsi'
                        WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
                        if($UpdatePassword){
                            echo '<span class="text-success" id="NotifikasiUbahPasswordBerhasil">Success</span>';
                        }else{
                            echo '<span class="text-danger">Update Password Gagal!</span>';
                        }
                    }
                }
            }
        }
    }
?>