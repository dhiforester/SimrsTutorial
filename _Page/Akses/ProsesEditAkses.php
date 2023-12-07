<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";
    //Validasi id_akses tidak boleh kosong
    if(empty($_POST['id_akses'])){
        echo '<small class="text-danger">ID Akses tidak boleh kosong</small>';
    }else{
        //Validasi nama tidak boleh kosong
        if(empty($_POST['nama_akses'])){
            echo '<small class="text-danger">Nama tidak boleh kosong</small>';
        }else{
            //Validasi kontak tidak boleh kosong
            if(empty($_POST['kontak_akses'])){
                echo '<small class="text-danger">Kontak tidak boleh kosong</small>';
            }else{
                //Validasi email tidak boleh kosong
                if(empty($_POST['email_akses'])){
                    echo '<small class="text-danger">Email tidak boleh kosong</small>';
                }else{
                    //Validasi Level Akses Tidak Boleh Kosong
                    if(empty($_POST['akses'])){
                        echo '<small class="text-danger">Level akses tidak boleh kosong</small>';
                    }else{
                        //Variabel Lainnya
                        $id_akses=$_POST['id_akses'];
                        $nama=$_POST['nama_akses'];
                        $kontak=$_POST['kontak_akses'];
                        $email=$_POST['email_akses'];
                        $akses=$_POST['akses'];
                        //Data Lama
                        $KontakLama=getDataDetail($Conn,'akses','id_akses',$id_akses,'kontak');
                        $EmailLama=getDataDetail($Conn,'akses','id_akses',$id_akses,'email');
                        //Validasi kontak tidak boleh lebih dari 20 karakter
                        $JumlahKarakterKontak=strlen($_POST['kontak_akses']);
                        if($JumlahKarakterKontak>20||$JumlahKarakterKontak<6||!preg_match("/^[0-9]*$/", $_POST['kontak_akses'])){
                            echo '<small class="text-danger">Kontak terdiri dari 6-20 karakter numerik</small>';
                        }else{
                            //Jumlah Karakter Akses Tidak Boleh Lebih Dari 20 Karakter
                            $JumlahKarakterAkses=strlen($_POST['akses']);
                            if($JumlahKarakterAkses>20){
                                echo '<small class="text-danger">Jumlah karakter level akses tidak boleh lebih dari 20 karakter</small>';
                            }else{
                                //Validasi Kontak Tidak Boleh Duplikat
                                if($kontak==$KontakLama){
                                    $ValidasiDuplikatKontak="";
                                }else{
                                    $ValidasiDuplikatKontak=getDataDetail($Conn,'akses','kontak',$kontak,'kontak');
                                    if(!empty($ValidasiDuplikatKontak)){
                                        $ValidasiDuplikatKontak="Kontak Yang Anda Gunakan Sudah Ada";
                                    }else{
                                        $ValidasiDuplikatKontak="";
                                    }
                                }
                                //Validasi Email Tidak Boleh Duplikat
                                if($email==$EmailLama){
                                    $ValidasiEmailDuplikat="";
                                }else{
                                    $ValidasiEmailDuplikat=getDataDetail($Conn,'akses','email',$email,'email');
                                    if(!empty($ValidasiEmailDuplikat)){
                                        $ValidasiEmailDuplikat="Email Yang Anda Gunakan Sudah Ada";
                                    }else{
                                        $ValidasiEmailDuplikat="";
                                    }
                                }
                                if(!empty($ValidasiDuplikatKontak)){
                                    echo '<small class="text-danger">'.$ValidasiDuplikatKontak.'</small>';
                                }else{
                                    if(!empty($ValidasiEmailDuplikat)){
                                        echo '<small class="text-danger">'.$ValidasiEmailDuplikat.'</small>';
                                    }else{
                                        //Simpan Data
                                        $UpdateAkses = mysqli_query($Conn,"UPDATE akses SET 
                                            nama='$nama',
                                            email='$email',
                                            kontak='$kontak',
                                            akses='$akses'
                                        WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
                                        if($UpdateAkses){
                                            echo '<small class="text-success" id="NotifikasiEditAksesBerhasil">Success</small>';
                                        }else{
                                            echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>