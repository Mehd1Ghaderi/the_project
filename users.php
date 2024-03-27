<html>
<table class="booktable" width="60%" border="1">
    <tbody>
    <tr>
    <th>شناسه</th>
    <th>نام کاربر</th>
    <th>رمز عبور</th>
    <th>سن</th>
    <th>نقش</th>
    <th><a class="insert" href="insert-user.php">افزودن کاربر</a></th>
    </tr> 
<?php
 $page_title="لیست کاربرها";
 include('pheader.php') ;
 include('config.php') ;
$result=mysqli_query($link,"select * from users");
while($row=mysqli_fetch_assoc($result)){ ?>
    
    <tr>
    <td><?=$row['id'] ?></td>
    <td><?=$row['name'] ?></td>
    <td><?=$row['password'] ?></td>
    <td><?=$row['age'] ?></td>
    <?php if($row['role']==1){
        ?>
    <td><?= "مدیر" ?></td>
    <?php }
    elseif($row['role']==0){ 
        ?>
    <td><?= "کاربر" ?></td>
    <?php } ?>
    <th><a class="editedel" href="delete-user.php?id=<?=$row['id']?>">حذف  </a>|<a class="editedel" href="edite-user.php?id=<?=$row['id']?>"> ویرایش</a></th>
    </tr>
    <?php } ?>
</tbody>
</table>
</html>