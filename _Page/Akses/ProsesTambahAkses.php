<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
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
                //Validasi Password tidak boleh kosong
                if(empty($_POST['password1'])){
                    echo '<small class="text-danger">Password tidak boleh kosong</small>';
                }else{
                    //Validasi Level Akses Tidak Boleh Kosong
                    if(empty($_POST['akses'])){
                        echo '<small class="text-danger">Level akses tidak boleh kosong</small>';
                    }else{
                        //Validasi kontak tidak boleh lebih dari 20 karakter
                        $JumlahKarakterKontak=strlen($_POST['kontak_akses']);
                        if($JumlahKarakterKontak>20||$JumlahKarakterKontak<6||!preg_match("/^[0-9]*$/", $_POST['kontak_akses'])){
                            echo '<small class="text-danger">Kontak terdiri dari 6-20 karakter numerik</small>';
                        }else{
                            //Validasi kontak tidak boleh duplikat
                            $kontak_akses=$_POST['kontak_akses'];
                            $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE kontak='$kontak_akses'"));
                            if(!empty($ValidasiKontakDuplikat)){
                                echo '<small class="text-danger">Nomor kontak tersebut sudah terdaftar</small>';
                            }else{
                                //Validasi email duplikat
                                $email_akses=$_POST['email_akses'];
                                $ValidasiEmailDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE email='$email_akses'"));
                                if(!empty($ValidasiEmailDuplikat)){
                                    echo '<small class="text-danger">Email sudah digunakan</small>';
                                }else{
                                    if($_POST['password1']!==$_POST['password2']){
                                        echo '<small class="text-danger">Password Tidak sama</small>';
                                    }else{
                                        //Validasi jumlah dan jenis karakter password
                                        $JumlahKarakterPassword=strlen($_POST['password1']);
                                        if($JumlahKarakterPassword>20||$JumlahKarakterPassword<6||!preg_match("/^[a-zA-Z0-9]*$/", $_POST['password1'])){
                                            echo '<small class="text-danger">Password can only have 6-20 numeric characters</small>';
                                        }else{
                                            //Jumlah Karakter Akses Tidak Boleh Lebih Dari 20 Karakter
                                            $JumlahKarakterAkses=strlen($_POST['akses']);
                                            if($JumlahKarakterAkses>20){
                                                echo '<small class="text-danger">Jumlah karakter level akses tidak boleh lebih dari 20 karakter</small>';
                                            }else{
                                                //Variabel Lainnya
                                                $nama_akses=$_POST['nama_akses'];
                                                $kontak_akses=$_POST['kontak_akses'];
                                                $email_akses=$_POST['email_akses'];
                                                $password1=$_POST['password1'];
                                                $password1=MD5($password1);
                                                $akses=$_POST['akses'];
                                                //Simpan Data
                                                $entry="INSERT INTO akses (
                                                    nama,
                                                    kontak,
                                                    email,
                                                    password,
                                                    akses
                                                ) VALUES (
                                                    '$nama_akses',
                                                    '$kontak_akses',
                                                    '$email_akses',
                                                    '$password1',
                                                    '$akses'
                                                )";
                                                $Input=mysqli_query($Conn, $entry);
                                                if($Input){
                                                    echo '<small class="text-success" id="NotifikasiTambahAksesBerhasil">Success</small>';
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
        }
    }
?>