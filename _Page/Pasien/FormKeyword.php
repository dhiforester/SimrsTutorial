<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['keyword_by'])){
        echo '<label for="keyword">Kata Kunci</label>';
        echo '<input type="text" name="keyword" id="keyword" class="form-control">';
    }else{
        $keyword_by=$_POST['keyword_by'];
        if($keyword_by=="gender"){
            echo '<label for="keyword">Kata Kunci</label>';
            echo '<select name="keyword" id="keyword" class="form-control">';
            echo '  <option value="">Pilih</option>';
            echo '  <option value="Perempuan">Perempuan</option>';
            echo '  <option value="Laki-laki">Laki-laki</option>';
            echo '</select>';
        }else{
            if($keyword_by=="status"){
                echo '<label for="keyword">Kata Kunci</label>';
                echo '<select name="keyword" id="keyword" class="form-control">';
                echo '  <option value="">Pilih</option>';
                echo '  <option value="Aktiv">Aktiv</option>';
                echo '  <option value="Non Aktiv">Non Aktiv</option>';
                echo '</select>';
            }else{
                if($keyword_by=="golongan_darah"){
                    echo '<label for="keyword">Kata Kunci</label>';
                    echo '<select name="keyword" id="keyword" class="form-control">';
                    echo '  <option value="">Pilih</option>';
                    echo '  <option value="A">A</option>';
                    echo '  <option value="B">B</option>';
                    echo '  <option value="AB">AB</option>';
                    echo '  <option value="O">O</option>';
                    echo '</select>';
                }else{
                    if($keyword_by=="tanggal_daftar"){
                        echo '<label for="keyword">Kata Kunci</label>';
                        echo '<input type="date" name="keyword" id="keyword" class="form-control">';
                    }else{
                        echo '<label for="keyword">Kata Kunci</label>';
                        echo '<input type="text" name="keyword" id="keyword" class="form-control">';
                    }
                }
            }
        }
    }
?>