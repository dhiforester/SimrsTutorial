<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_daftar=date('Y-m-d H:i:s');
    //Validasi nama tidak boleh kosong
    if(empty($_POST['nama'])){
        echo '<small><code class="text-danger">Nama tidak boleh kosong!</code></small>';
    }else{
        //Validasi gender tidak boleh kosong
        if(empty($_POST['gender'])){
            echo '<small><code class="text-danger">Gender pasien tidak boleh kosong!</code></small>';
        }else{
            //Validasi status tidak boleh kosong
            if(empty($_POST['status'])){
                echo '<small><code class="text-danger">Status pasien tidak boleh kosong!</code></small>';
            }else{
                //Variabel Lainnya
                $nama=$_POST['nama'];
                $gender=$_POST['gender'];
                $status=$_POST['status'];
                //Menangkap Variabel Lainnya yang tidak wajib diisi
                if(empty($_POST['nik'])){
                    $nik="";
                    $ValidasiNik="";
                }else{
                    $nik=$_POST['nik'];
                    $ValidasiNik=getDataDetail($Conn,'pasien','nik',$nik,'nik');
                }
                if(empty($_POST['no_bpjs'])){
                    $no_bpjs="";
                    $ValidasiNoBpjs="";
                }else{
                    $no_bpjs=$_POST['no_bpjs'];
                    $ValidasiNoBpjs=getDataDetail($Conn,'pasien','no_bpjs',$no_bpjs,'no_bpjs');
                }
                if(empty($_POST['kontak'])){
                    $kontak="";
                }else{
                    $kontak=$_POST['kontak'];
                }
                if(empty($_POST['tempat_lahir'])){
                    $tempat_lahir="";
                }else{
                    $tempat_lahir=$_POST['tempat_lahir'];
                }
                if(empty($_POST['tanggal_lahir'])){
                    $tanggal_lahir="";
                }else{
                    $tanggal_lahir=$_POST['tanggal_lahir'];
                }
                if(empty($_POST['propinsi'])){
                    $provinsi="";
                }else{
                    $provinsi=$_POST['propinsi'];
                }
                if(empty($_POST['kabupaten'])){
                    $kabupaten="";
                }else{
                    $kabupaten=$_POST['kabupaten'];
                }
                if(empty($_POST['kecamatan'])){
                    $kecamatan="";
                }else{
                    $kecamatan=$_POST['kecamatan'];
                }
                if(empty($_POST['desa'])){
                    $desa="";
                }else{
                    $desa=$_POST['desa'];
                }
                if(empty($_POST['alamat'])){
                    $alamat="";
                }else{
                    $alamat=$_POST['alamat'];
                }
                if(empty($_POST['golongan_darah'])){
                    $golongan_darah="";
                }else{
                    $golongan_darah=$_POST['golongan_darah'];
                }
                //Validasi Nik Duplikat
                if(!empty($ValidasiNik)){
                    echo '<small><code class="text-danger">NIK yang anda input sudah terdaftar!</code></small>';
                }else{
                    //Validasi no_bpjs Duplikat
                    if(!empty($ValidasiNoBpjs)){
                        echo '<small><code class="text-danger">No. BPJS yang anda input sudah terdaftar!</code></small>';
                    }else{
                        //Simpan Data
                        $entry="INSERT INTO pasien (
                            nama,
                            nik,
                            no_bpjs,
                            kontak,
                            tempat_lahir,
                            tanggal_lahir,
                            gender,
                            provinsi,
                            kabupaten,
                            kecamatan,
                            desa,
                            alamat,
                            golongan_darah,
                            status,
                            tanggal_daftar
                        ) VALUES (
                            '$nama',
                            '$nik',
                            '$no_bpjs',
                            '$kontak',
                            '$tempat_lahir',
                            '$tanggal_lahir',
                            '$gender',
                            '$provinsi',
                            '$kabupaten',
                            '$kecamatan',
                            '$desa',
                            '$alamat',
                            '$golongan_darah',
                            '$status',
                            '$tanggal_daftar'
                        )";
                        $Input=mysqli_query($Conn, $entry);
                        if($Input){
                            echo '<small class="text-success" id="NotifikasiTambahPasienBerhasil">Success</small>';
                        }else{
                            echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                        }
                    }
                }
            }
        }
    }
?>