<html>
<table class="booktable" width="40%" border="1">
    <tbody>
    <tr>
    <th>نام موضوع</th>
    </tr> 
<?php
include('config.php');
 $page_title="افزودن موضوع";
 include('pheader.php') ;
 if(isset($_POST['submit'])){
$sname=$_POST['sname'];
if($sname==""){
    die("اطلاعات کامل وارد نشده");
}
$insert= "insert into subjects (sname) value('$sname')" ;
$res=mysqli_query( $link , $insert );
if ( $res ){
    header("location:subjects.php");
}
else {
    echo mysqli_error($link);

}
}
?>
</tbody>
<form method="post">
    <tr style="text-align: center;">
    <td><input style="font-size: 20px;" name="sname" type="text"></td>
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