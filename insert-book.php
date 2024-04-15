<html>
<table class="booktable" width="40%" border="1">
    <tbody>
    <tr>
    <th>نام کتاب</th>
    <th>نویسنده</th>
    <th>قیمت</th>
    <th>موضوع</th>
    </tr> 
<?php
include('config.php');
 $page_title="افزودن کتاب";
 include('pheader.php') ;
 if(isset($_POST['submit'])){
$name=$_POST['name'];
$writer=$_POST['writer'];
$price=$_POST['price'];
$subject=$_POST['subject'];
if($name==""){
    die("اطلاعات کامل وارد نشده");
}
if($writer==""){
    die("اطلاعات کامل وارد نشده");
}
if($price==""){
    die("اطلاعات کامل وارد نشده");
}
$insert= "INSERT into books (name,writer,price,subject) values('$name','$writer',$price,'$subject')" ;
$res=mysqli_query( $link , $insert );
if ( $res ){
    header("location:books.php");
}
else {
    echo mysqli_error($link);
}
 }

?>
</tbody>
<form method="post">
    <tr style="text-align: center;">
    <td><input class="bg-[#F1F2FF] py-1 px-2 rounded-[8px] border border-[#CECFFF] outline-none" style="font-size: 20px;" name="name" type="text"></td>
    <td><input class="bg-[#F1F2FF] py-1 px-2 rounded-[8px] border border-[#CECFFF] outline-none" style="font-size: 20px;" name="writer" type="text"></td>
    <td><input class="bg-[#F1F2FF] py-1 px-2 rounded-[8px] border border-[#CECFFF] outline-none" style="font-size: 20px;" name="price" type="number"></td>
    <td><select style="font-size: 20px;" name="subject">
<?php
    $subjects= "SELECT sname from subjects";
$result= mysqli_query( $link , $subjects );
while($row= mysqli_fetch_assoc($result)){
    ?>
        <option value="<?= $row['sname'] ?>"><?= $row['sname'] ?></option>
<?php }  ?>
    </select></td>
    </tr>

</table>
<table>
    <tr>
    <td>
    <input style="font-size: 20px; width: 100px;height: 50px;background-color:#CECFFF;" class="rounded-[8px]" name="submit" type="submit" value="ثبت">
    </td>
    </tr>
    </table>
    </form>
</html>