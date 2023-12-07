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
        }
    }
    
?>
