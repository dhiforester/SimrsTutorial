<?php
    if(empty($_GET['Page'])){
        echo '<div class="pagetitle">';
        echo '  <h1><i class="bi bi-grid"></i> Dashboard</h1>';
        echo '</div>';
    }else{
        $Page=$_GET['Page'];
        if($Page=="Akses"){
            echo '<div class="pagetitle">';
            echo '  <h1><i class="bi bi-key"></i> Akses</h1>';
            echo '</div>';
        }else{
            if($Page=="Pasien"){
                echo '<div class="pagetitle">';
                echo '  <h1><i class="bi bi-person"></i> Pasien</h1>';
                echo '</div>';
            }else{
                if($Page=="Pengaturan"){
                    echo '<div class="pagetitle">';
                    echo '  <h1><i class="bi bi-gear"></i> Pengaturan</h1>';
                    echo '</div>';
                }
            }
        }
    }
    
?>
