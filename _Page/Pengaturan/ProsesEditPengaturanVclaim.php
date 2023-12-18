<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_daftar=date('Y-m-d H:i:s');
    //Validasi url_api tidak boleh kosong
    if(empty($_POST['url_api'])){
        echo '<small><code class="text-danger">URL tidak boleh kosong!</code></small>';
    }else{
        //Validasi cons_id tidak boleh kosong
        if(empty($_POST['cons_id'])){
            echo '<small><code class="text-danger">Cons ID tidak boleh kosong!</code></small>';
        }else{
            //Validasi user_key tidak boleh kosong
            if(empty($_POST['user_key'])){
                echo '<small><code class="text-danger">User Key tidak boleh kosong!</code></small>';
            }else{
                //Validasi secret_key tidak boleh kosong
                if(empty($_POST['secret_key'])){
                    echo '<small><code class="text-danger">Secret Key tidak boleh kosong!</code></small>';
                }else{
                    //Validasi kode_ppk tidak boleh kosong
                    if(empty($_POST['kode_ppk'])){
                        echo '<small><code class="text-danger">Kode PPK tidak boleh kosong!</code></small>';
                    }else{
                        //Validasi status tidak boleh kosong
                        if(empty($_POST['status'])){
                            echo '<small><code class="text-danger">Status tidak boleh kosong!</code></small>';
                        }else{
                            //Validasi profile_pengaturan tidak boleh kosong
                            if(empty($_POST['profile_pengaturan'])){
                                echo '<small><code class="text-danger">Nama Profile tidak boleh kosong!</code></small>';
                            }else{
                                //Validasi id_pengaturan tidak boleh kosong
                                if(empty($_POST['id_pengaturan'])){
                                    echo '<small><code class="text-danger">ID Profile tidak boleh kosong!</code></small>';
                                }else{
                                    //Variabel Lainnya
                                    $kategori_pengaturan="Bridging Vclaim";
                                    $id_pengaturan=$_POST['id_pengaturan'];
                                    $url_api=$_POST['url_api'];
                                    $cons_id=$_POST['cons_id'];
                                    $user_key=$_POST['user_key'];
                                    $secret_key=$_POST['secret_key'];
                                    $kode_ppk=$_POST['kode_ppk'];
                                    $status=$_POST['status'];
                                    $profile_pengaturan=$_POST['profile_pengaturan'];
                                    $NamaProfileLama=getDataDetail($Conn,'pengaturan','profile_pengaturan',$profile_pengaturan,'profile_pengaturan');
                                    if($profile_pengaturan==$NamaProfileLama){
                                        $ValidasiNamaProfile="";
                                    }else{
                                        $ValidasiNamaProfile=getDataDetail($Conn,'pengaturan','profile_pengaturan',$profile_pengaturan,'profile_pengaturan');
                                    }
                                    //Validasi Nama Profile Duplikat
                                    if(!empty($ValidasiNamaProfile)){
                                        echo '<small><code class="text-danger">Nama Profile yang anda input sudah terdaftar!</code></small>';
                                    }else{
                                        if($status=="Active"){
                                            //Apabila Status Active maka De Activasi Yang Lain
                                            $UpdateStatus = mysqli_query($Conn,"UPDATE pengaturan SET 
                                                status='Non Active'
                                            WHERE kategori_pengaturan='$kategori_pengaturan' AND id_pengaturan='$id_pengaturan'") or die(mysqli_error($Conn)); 
                                        }
                                        //Membuat file json
                                        $pengaturan = Array (
                                            "url_api" => "$url_api",
                                            "cons_id" => "$cons_id",
                                            "user_key" => "$user_key",
                                            "secret_key" => "$secret_key",
                                            "kode_ppk" => "$kode_ppk"
                                        );
                                        $pengaturan = json_encode($pengaturan, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
                                        //Simpan Data
                                        $UpdatePengaturan = mysqli_query($Conn,"UPDATE pengaturan SET 
                                            profile_pengaturan='$profile_pengaturan',
                                            pengaturan='$pengaturan',
                                            status='$status'
                                        WHERE id_pengaturan='$id_pengaturan'") or die(mysqli_error($Conn)); 
                                        if($UpdatePengaturan){
                                            echo '<small class="text-success" id="NotifikasiEditPengaturanVclaimBerhasil">Success</small>';
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