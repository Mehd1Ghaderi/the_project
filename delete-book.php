<?php
$id = $_GET['id'];
include('config.php');

$sql = "DELETE FROM books WHERE id = $id";
$res = mysqli_query($link, $sql);

if ($res) {
    header("location: books.php");
} else {
    echo "خطا در حذف کتاب: " . mysqli_error($link);
}
?>