<?php
include('config.php');

if(isset($_GET['sname'])) {
    $sname = mysqli_real_escape_string($link, $_GET['sname']);
    $sql_books = "DELETE FROM books WHERE subject = '$sname'";
    $res_books = mysqli_query($link, $sql_books);
    if (!$res_books) {
        echo "خطا در حذف کتاب: " . mysqli_error($link);
        exit;
    }
    $sql_subject = "DELETE FROM subjects WHERE sname = '$sname'";
    $res_subject = mysqli_query($link, $sql_subject);
    if ($res_subject) {
        header("location: subjects.php");
        exit;
    } else {
        echo "خطا در حذف موضوع: " . mysqli_error($link);
        exit;
    }
} else {
    echo "خطا: پارامتر sname ارسال نشده است!";
    exit;
}
?>