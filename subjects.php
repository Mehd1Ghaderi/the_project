<!DOCTYPE html>
<html>
<head>
 
</head>
<?php
include('config.php');
include('pheader.php');
?>
<table class="text-[#30374A] text-[18px] w-[900px]">
        <thead>
            <tr class="border-b border-[#8B5CFB]">
                <th class="py-3 text-right font-light w-1/4">شناسه</th>
                <th class="py-3 text-right font-light w-1/4">موضوعات</th>
                <th class="py-3 text-right font-light w-1/4"><a class="insert" href="insert-subject.php">افزودن موضوع</a></th>
                <th class="py-3 text-right font-light w-1/4"><a class="insert" href="books.php">کتاب ها</a></th>
            </tr>
        </thead>
<?php
$result = mysqli_query($link, "SELECT * FROM subjects");
while ($row = mysqli_fetch_assoc($result)){
?>
<tr class="border-b border-[#D3D8E4]">
                <td class="py-4 w-1/4 p-4"><?= $row['sid'] ?></td>
                <td class="py-4 w-1/4"><?= $row['sname'] ?></td>
                <td class="py-4 w-1/4">
                <div class="flex items-center gap-2 ">
    <a class="text-[#8B5CFB]" href="delete-subject.php?sname=<?= $row['sname'] ?>"> <i class="fa-solid fa-trash p-1 rounded-[8px] shadow bg-[white]"></i>  </a>
    <a class="text-[#8B5CFB]" href="edit-subject.php?sname=<?= $row['sname'] ?>"> <i class="fa-solid fa-pen-to-square p-1 rounded-[8px] shadow bg-[white]"></i></a>
    </div> 
            </td>
                </tr>
            <?php } ?>
            