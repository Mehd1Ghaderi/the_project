<html>
<table  class="text-[#30374A] text-[18px]" width="60%" border="1">
    <tbody>
    <tr class="border-b border-[#8B5CFB]">
              <th class="py-3 text-right font-light w-1/4">شناسه</th>
              <th class="py-3 text-right font-light w-1/4">نام</th>
              <th class="py-3 text-right font-light w-1/4 sm:pr-3">رنگ اصلی</th>
              <th class="py-3 text-right font-light w-1/4"></th>
            </tr>
    </tr> 
<?php
 $page_title="لیست کاربرها";
 include('pheader.php') ;
 include('config.php') ;
$result=mysqli_query($link,"select * from users");
while($row=mysqli_fetch_assoc($result)){ ?>
    
    <tr  class="border-b border-[#D3D8E4]">
    <td class="py-4 w-1/4 p-4"><?=$row['id'] ?></td>
    <td class="py-4 w-1/4"><?=$row['name'] ?></td>
    <td class="py-4 w-1/4"><?=$row['password'] ?></td>
    <td class="py-4 w-1/4"><?=$row['age'] ?></td>
    <?php if($row['role']==1){
        ?>
    <td><?= "مدیر" ?></td>
    <?php }
    elseif($row['role']==0){ 
        ?>
    <td><?= "کاربر" ?></td>
    <?php } ?>
    <th class="py-4 w-1/4"> 
    <div class="flex items-center gap-2 justify-end">
    <a class="text-[#8B5CFB]" href="delete-user.php?id=<?=$row['id']?>"> <i class="fa-solid fa-trash p-1 rounded-[8px] shadow bg-[white]"></i>  </a>
    <a class="text-[#8B5CFB]" href="edite-user.php?id=<?=$row['id']?>"> <i class="fa-solid fa-pen-to-square p-1 rounded-[8px] shadow bg-[white]"></i></a>
    </div>

    </th>
    </tr>
    <?php } ?>
</tbody>
</table>
</html>