<?php
    include_once "db.php";
    if (isset($_GET["id"])){
        $id_pro=$_GET['id'];
        $sql_onepro="select * from tintuc where new_id =$id_pro";
        $objOne= $conn ->query($sql_onepro)->fetch();

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Sửa tin tức</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $objOne['new_id'] ?>">
        <p>Title</p> <input type="text" name="title" value="<?php echo $objOne['title'] ?>" >
        <p>Ảnh tin tức</p> <img src="./img/<?php echo $objOne['img'] ?>"  alt=""> 
        <input type="file" name="image" >
        <input type="hidden" name="thumb_img" value="<?php echo $objOne['img'] ?>">
        <p>intro</p> <input type="text" name="intro" value="<?php echo $objOne['intro'] ?>">
        <p>deltail</p> <input type="text" name="detail" value="<?php echo $objOne['detail']?>">
        <p>status</p> <input type="text" name="status" value="<?php echo $objOne['status']?>">
        <p>Danh mục</p> 
        <select name="cate_id" id="">
            <option value="1">Kinh tế</option>
            <option value="2">Xã hộihội</option>
            <input type="submit" name="btn_insert1" value="sửa tin tức">
        </select>

    </form>
    <?php
    if(isset($_POST['btn_insert1'])){
        $id=$_POST['id'];
        $title = $_POST['title'];
        $intro = $_POST['intro'];
        $detail = $_POST['detail'];
        $status = $_POST['status'];

        $thumb_img=$_POST['thumb_img'];
        $image=$_FILES['image']['name'];
        $img_test="";
        if(!$image){
            $img_test= $thumb_img;
        }
        else{
            $tmp=$_FILES['image']['tmp_name'];
            move_uploaded_file($tmp,"img/".$image);
            $img_test=$image;
        }

        $cate_id =$_POST['cate_id'];
        $sql_update="update tintuc set title='$title',img='$img_test',intro='$intro',detail='$detail',status='$status' where new_id=$id";
        $objUpdate=$conn->prepare($sql_update);
        if($objUpdate->execute()){
            header("Location:show_all_tintuc.php");
        }
        else{
            echo"thất bại";
        }
    }
    ?>
</body>
</html>