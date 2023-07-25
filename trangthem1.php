<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Them tin tức</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>Title</p> <input type="text" name="title">
        <p>Ảnh tin tức</p> <input type="file" name="image">
        <p>intro</p> <input type="text" name="intro">
        <p>deltail</p> <input type="text" name="detail">
        <p>status</p> <input type="text" name="status">
        <p>Danh mục</p> 
        <select name="cate_id" id="">
            <option value="1">Kinh tế</option>
            <option value="2">Xã hộihội</option>
            <input type="submit" name="btn_insert1" value="them tin tức">
        </select>

    </form>
    <?php
    include_once "db.php";
    if(isset($_POST['btn_insert1'])){
        $title = $_POST['title'];

        $img=$_FILES['image']['name'];
        $tmp=$_FILES['image']['tmp_name'];
        move_uploaded_file($tmp,"img/".$img);

        $intro=$_POST['intro'];
        $detail=$_POST['detail'];
        $status=$_POST['status'];
        $cate_id =$_POST['cate_id'];


       

        $sql_insert="insert into tintuc values(null,'$title','$img','$intro','$detail','$status','$cate_id')";
        $objInsert=$conn->prepare($sql_insert);
        if($objInsert->execute()){
            header("Location:show_all_tintuc.php");
        }
        else{
            echo"thất bại";
        }
    }
        ?>
</body>
</html>