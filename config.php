<?php
$link=mysqli_connect("localhost:3306","root","","bookshop");
if(!$link){
    die("خطا در ارتباط پایگاه داده");
}
mysqli_query($link , "set names utf8"); 
?>