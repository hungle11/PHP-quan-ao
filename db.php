<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=lap56;charset=utf8","root",""); 

    }catch(\Throwable $th){
        echo "lỗi kết nối";
    }
?>