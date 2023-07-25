<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="trangthem1.php">Thêm tin tức</a>
<a href=""></a>
    <table border=1>
        <tr>
            <td>stt</td>
            <td>title</td>
            <td>image</td>
            <td>intro</td>
            <td>detail</td>
            <td>status</td>
            <td>sửa</td>
            <td>xóa</td>
        </tr>
   
    <?php
           include_once "db.php";
            $sql="select * from tintuc";
            $objNews=$conn->query($sql);
            foreach($objNews as $row){
        ?>
        <tr>
            <td><?php echo $row['new_id'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><img src="./img/<?php echo $row['img'] ?>"  alt=""></td>
            <td><?php echo $row['intro'] ?></td>
            <td><?php echo $row['detail']?></td>
            <td><?php echo $row['status']?></td>
            <td><a href="./update1.php?id=<?php echo $row['new_id'] ?>">sửa</a></td>
            <td><a onclick="return confirm('Bạn có muốn xóa không')" href="./delete1.php?id=<?php echo $row['new_id'] ?>">xóa</a></td>
        </tr>


            <?php
            }

        ?>
     </table>
</body>
</html>