<?php
    include "../../_Config/Connection.php";
    //Menampilkan List Pengaturan Bridging
    $no=1;
    $query = mysqli_query($Conn, "SELECT * FROM pengaturan WHERE kategori_pengaturan='Bridging Vclaim'");
    while ($data = mysqli_fetch_array($query)) {
        $id_pengaturan = $data['id_pengaturan'];
        $profile_pengaturan = $data['profile_pengaturan'];
        $pengaturan = $data['pengaturan'];
        $pengaturan = json_decode($pengaturan, true);
        $status = $data['status'];

?>
<div class="accordion accordion-flush mb-3 border-bottom" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne<?php echo $no;?>"> 
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1<?php echo $no;?>" aria-expanded="false" aria-controls="flush-collapse1<?php echo $no;?>"> 
                <?php echo "$no. $profile_pengaturan"; ?>
            </button>
        </h2>
        <div id="flush-collapse1<?php echo $no;?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne<?php echo $no;?>" data-bs-parent="#accordionFlushExample" style="">
            <div class="accordion-body mb-4">
                <div class="row mb-4">
                    <div class="col col-md-12 mb-2"></div>
                </div>
                <div class="row mb-4">
                    <div class="col col-md-4 mb-2"><b>Status Pengaturan</b></div>
                    <div class="col col-md-8 mb-2"><?php echo "$status"; ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col col-md-4 mb-2"><b>URL</b></div>
                    <div class="col col-md-8 mb-2"><?php echo $pengaturan['url_api']; ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col col-md-4 mb-2"><b>Cons ID</b></div>
                    <div class="col col-md-8 mb-2"><?php echo $pengaturan['cons_id']; ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col col-md-4 mb-2"><b>Kode PPK</b></div>
                    <div class="col col-md-8 mb-2"><?php echo $pengaturan['kode_ppk']; ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col col-md-4 mb-2"><b>User Key</b></div>
                    <div class="col col-md-8 mb-2"><?php echo $pengaturan['user_key']; ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col col-md-4 mb-2"><b>Secret Key</b></div>
                    <div class="col col-md-8 mb-2"><?php echo $pengaturan['secret_key']; ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col col-md-12 mb-2">
                        <button type="button" class="btn btn-success btn-sm" title="Edit Pengaturan" data-bs-toggle="modal" data-bs-target="#ModalEditPengaturanVclaim" data-id="<?php echo "$id_pengaturan"; ?>">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" title="Hapus Pengaturan" data-bs-toggle="modal" data-bs-target="#ModalHapusPengaturanVclaim" data-id="<?php echo "$id_pengaturan"; ?>">
                            <i class="bi bi-trash"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" title="Generate Signature" data-bs-toggle="modal" data-bs-target="#ModalGenerateSignature" data-id="<?php echo "$id_pengaturan"; ?>">
                            <i class="bi bi-arrow-clockwise"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $no++;} ?>