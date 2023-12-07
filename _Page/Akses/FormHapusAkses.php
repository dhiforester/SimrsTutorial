<?php
    if(!empty($_POST['id_akses'])){
        $id_akses=$_POST['id_akses'];
?>
    <input type="hidden" name="id_akses" value="<?php echo $id_akses; ?>">
    <div class="row">
            <div class="col col-md-12 text-center">
                <span class="modal-icon display-2-lg">
                    <img src="assets/img/question.gif" width="70%">
                </span>
            </div>
        </div>
    </div>
<?php 
    }else{
        $id_akses="";
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">ID Akses Tidak Boleh Kosong!.</small>';
        echo '      </div>';
        echo '  </div>';
    }
?>