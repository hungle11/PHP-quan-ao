<?php
    include_once 'db.php';
    if (isset($_GET['id'])){
        $id_pro=$_GET['id'];
        $sql_delete="delete from tintuc where new_id =$id_pro";
        $objDelete=$conn->prepare($sql_delete);

        if($objDelete->execute()){
            header("Location:show_all_tintuc.php");
        }
        else{
            echo"thất bại";
        }
    }
?>