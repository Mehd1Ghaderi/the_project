<html>
<table class="booktable" width="40%" border="1">
    <tbody>
    <tr>
    <th>نام کاربر</th>
    <th>رمز عبور</th>
    <th>سن</th>
    <th>نقش</th>
    </tr> 
<?php
include('config.php');
 $page_title="افزودن کاربر";
 include('pheader.php') ;
 if(isset($_POST['submit'])){
$name=$_POST['name'];
$password=$_POST['password'];
$age=$_POST['age'];
$role=$_POST['role'];
if($name==""){
    die("اطلاعات کامل وارد نشده");
}
if($password==""){
    die("اطلاعات کامل وارد نشده");
}
if($age==""){
    die("اطلاعات کامل وارد نشده");
}
$insert= "insert into users (name,password,age,role) value('$name','$password',$age,'$role')" ;
$res=mysqli_query( $link , $insert );
if ( $res ){
    header("location:users.php");
}
else {
    echo mysqli_error($link);
}
 }
?>
</tbody>
<form method="post">
    <tr style="text-align: center;">
    <td><input style="font-size: 20px;" name="name" type="text"></td>
    <td><input style="font-size: 20px;" name="password" type="text"></td>
    <td><input style="font-size: 20px;" name="age" type="number"></td>
    <td><select style="font-size: 20px;" name="role">
        <option value="---">---</option>
        <option value="1">مدیر</option>
        <option value="0">کاربر</option>
    </select></td>
    </tr>

</table>
<table>
    <tr>
    <td>
    <input style="font-size: 20px; width: 140px;height: 50px;background-color:#32ffa6;" name="submit" type="submit" value="ثبت">
    </td>
    </tr>
    </table>
    </form>
</html>