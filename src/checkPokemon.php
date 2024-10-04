<?php
if(isset($_GET['answer']) && $_GET['answer'] != null){
    if(strtolower($_GET['name']) == strtolower($_GET['answer'])){
        echo "<div class='alert alert-success mt-3'>Correcto.</div>";
    }else{
        echo "<div class='alert alert-danger mt-3'> Incorrecto. Su nombre es <strong>" . $_GET['name'] .  "</strong></div>";
    }
}else{
    echo "<div class='alert alert-warning mt-3'>Escribe una repuesta.</div>";
}
?>