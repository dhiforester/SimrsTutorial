<?php
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
?>
<form action="javascript:void(0);" id="ProsesPengaturanVclaim" autocomplete="off">
    <input type="hidden" name="id_pengaturan" id="id_pengaturan" value="<?php echo "$id_pengaturan"; ?>">
    <div class="row mb-3 mt-3">
        <div class="col-md-4 mb-2">
            <label for="profile_pengaturan">Nama Pengaturan</label>
        </div>
        <div class="col-md-8 mb-2">
            <input type="text" name="profile_pengaturan" id="profile_pengaturan" class="form-control" value="<?php echo "$profile_pengaturan"; ?>">
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-4 mb-2">
            <label for="url_api">Url Service</label>
        </div>
        <div class="col-md-8 mb-2">
            <input type="url" name="url_api" id="url_api" class="form-control" value="<?php echo "$url_api"; ?>">
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-4 mb-2">
            <label for="cons_id">Cons ID</label>
        </div>
        <div class="col-md-8 mb-2">
            <input type="text" name="cons_id" id="cons_id" class="form-control" value="<?php echo "$cons_id"; ?>">
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-4 mb-2">
            <label for="user_key">User Key</label>
        </div>
        <div class="col-md-8 mb-2">
            <input type="text" name="user_key" id="user_key" class="form-control" value="<?php echo "$user_key"; ?>">
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-4 mb-2">
            <label for="secret_key">Secret Key</label>
        </div>
        <div class="col-md-8 mb-2">
            <input type="text" name="secret_key" id="secret_key" class="form-control" value="<?php echo "$secret_key"; ?>">
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-4 mb-2">
            <label for="kode_ppk">Kode PPK</label>
        </div>
        <div class="col-md-8 mb-2">
            <input type="text" name="kode_ppk" id="kode_ppk" class="form-control" value="<?php echo "$kode_ppk"; ?>">
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-4 mb-2">
            <label for="status">Status</label>
        </div>
        <div class="col-md-8 mb-2">
            <select name="status" id="status" class="form-control">
                <option <?php if($status==""){echo "selected";} ?> value="">Pilihan</option>
                <option <?php if($status=="Active"){echo "selected";} ?> value="Active">Active</option>
                <option <?php if($status=="Non Active"){echo "selected";} ?> value="Non Active">Non Active</option>
            </select>
        </div>
    </div>
</form>