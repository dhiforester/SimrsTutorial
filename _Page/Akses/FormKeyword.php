<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['keyword_by'])){
        echo '<label for="keyword">Kata Kunci</label>';
        echo '<input type="text" name="keyword" id="keyword" class="form-control">';
    }else{
        $keyword_by=$_POST['keyword_by'];
        if($keyword_by=="akses"){
            echo '<label for="keyword">Kata Kunci</label>';
            echo '<select name="keyword" id="keyword" class="form-control">';
            echo '  <option value="">Pilih</option>';
            //Tampilkan list akses
            $Qry = mysqli_query($Conn, "SELECT DISTINCT akses FROM akses ORDER BY akses ASC");
            while ($Data = mysqli_fetch_array($Qry)) {
                $akses=$Data['akses'];
                echo '<option value="'.$akses.'">'.$akses.'</option>';
            }
            echo '</select>';
        }else{
            echo '<label for="keyword">Kata Kunci</label>';
            echo '<input type="text" name="keyword" id="keyword" class="form-control">';
        }
    }
?>