<?php
$id = $_GET['id'];
include('config.php');

$sql = "DELETE FROM users WHERE id = $id";
$res = mysqli_query($link, $sql);

if ($res) {
    header("location: users.php");
} else {
    echo "خطا در حذف کاربر: " . mysqli_error($link);
}
?>