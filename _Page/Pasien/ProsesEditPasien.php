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
                //Validasi id_pasien tidak boleh kosong
                if(empty($_POST['id_pasien'])){
                    echo '<small><code class="text-danger">ID pasien tidak boleh kosong!</code></small>';
                }else{
                    //Variabel Lainnya
                    $id_pasien=$_POST['id_pasien'];
                    $nama=$_POST['nama'];
                    $gender=$_POST['gender'];
                    $status=$_POST['status'];
                    //Menangkap Variabel Lainnya yang tidak wajib diisi
                    if(empty($_POST['nik'])){
                        $nik="";
                        $ValidasiNik="";
                    }else{
                        $nik=$_POST['nik'];
                        $NikLama=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'nik');
                        if($NikLama==$nik){
                            $ValidasiNik="";
                        }else{
                            $ValidasiNik=getDataDetail($Conn,'pasien','nik',$nik,'nik');
                        }
                    }
                    if(empty($_POST['no_bpjs'])){
                        $no_bpjs="";
                        $ValidasiNoBpjs="";
                    }else{
                        $no_bpjs=$_POST['no_bpjs'];
                        $NoBpjsLama=getDataDetail($Conn,'pasien','id_pasien',$id_pasien,'no_bpjs');
                        if($NoBpjsLama==$no_bpjs){
                            $ValidasiNoBpjs="";
                        }else{
                            $ValidasiNoBpjs=getDataDetail($Conn,'pasien','no_bpjs',$no_bpjs,'no_bpjs');
                        }
                        
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
                            $UpdatePasien = mysqli_query($Conn,"UPDATE pasien SET 
                                nama='$nama',
                                nik='$nik',
                                no_bpjs='$no_bpjs',
                                kontak='$kontak',
                                tempat_lahir='$tempat_lahir',
                                tanggal_lahir='$tanggal_lahir',
                                gender='$gender',
                                provinsi='$provinsi',
                                kabupaten='$kabupaten',
                                kecamatan='$kecamatan',
                                desa='$desa',
                                alamat='$alamat',
                                golongan_darah='$golongan_darah',
                                status='$status',
                                tanggal_daftar='$tanggal_daftar'
                            WHERE id_pasien='$id_pasien'") or die(mysqli_error($Conn)); 
                            if($UpdatePasien){
                                echo '<small class="text-success" id="NotifikasiEditPasienBerhasil">Success</small>';
                            }else{
                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                            }
                        }
                    }
                }
            }
        }
    }
?>