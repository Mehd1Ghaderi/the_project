<!DOCTYPE html>
<html>
<head>
    <style>
        .booktable {
            width: 60%;
            border-collapse: collapse;
        }
        
        .booktable th, .booktable td {
            border: 1px solid black;
            padding: 8px;
        }
        
        .booktable th {
            background-color: #a30b87;
            color: #fff;
        }
        
        .insert, .editedel {
            color: #10ead4;
            text-decoration: none;
        }
        
        .editedel:first-child {
            margin-right: 5px;
        }
    </style>
</head>
<?php
include('config.php');
include('pheader.php');
?>
<table class="booktable">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>موضوعات</th>
                <th><a class="insert" href="insert-subject.php">افزودن موضوع</a></th>
                <th><a class="insert" href="books.php">کتاب ها</a></th>
            </tr>
        </thead>
<?php
$result = mysqli_query($link, "SELECT * FROM subjects");
while ($row = mysqli_fetch_assoc($result)){
?>
<tr>
                <td><?= $row['sid'] ?></td>
                <td><?= $row['sname'] ?></td>
                <td><a class="editedel" href="delete-subject.php?sname=<?= $row['sname'] ?>">حذف</a> |
                 <a class="editedel" href="edit-subject.php?sname=<?= $row['sname'] ?>">ویرایش</a>
</td>
                </tr>
            <?php } ?>
            