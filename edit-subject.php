<?php 
$page_title = "ویرایش موضوع"; 
include('pheader.php'); 
include('config.php'); 
 
if(isset($_GET['sname'])) { 
    $key = mysqli_real_escape_string($link, $_GET['sname']); 
    $result = mysqli_query($link, "SELECT * FROM subjects WHERE sname = '$key'"); 
    if($result && mysqli_num_rows($result) > 0) { 
        $row = mysqli_fetch_assoc($result); 
 
        if (isset($_POST['submit'])) { 
            $name = mysqli_real_escape_string($link, $_POST['name']); 
            $sql = "UPDATE subjects SET sname='$name' WHERE sname = '$key'"; 
            $res = mysqli_query($link, $sql); 
            if ($res) { 
                $sqli = "UPDATE books SET subject='$name' WHERE subject = '$key'"; 
                $result = mysqli_query($link, $sqli); 
                if ($result) { 
                    header("location: subjects.php"); 
                    exit; 
                } else { 
                    echo "خطا در به‌روزرسانی کتاب‌ها: " . mysqli_error($link); 
                } 
            } else { 
                echo "خطا در موضوع ویرایش: " . mysqli_error($link); 
            } 
        } 
    } else { 
        echo "خطا: موضوع مورد نظر پیدا نشد!"; 
        exit; 
    } 
} else { 
    echo "خطا: پارامتر sname ارسال نشده است!"; 
    exit; 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <style> 
        .booktable { 
            width: 45%; 
            border-collapse: collapse; 
        } 
         
        .booktable th, .booktable td { 
            border: 1px solid black; 
            padding: 10px; 
        } 
         
        .form-input { 
            font-size: 20px; 
        } 
         
        .submit-button { 
            font-size: 20px; 
            width: 140px; 
            height: 50px; 
            background-color: #32ffa6; 
        } 
    </style> 
</head> 
<body> 
    <table class="booktable"> 
        <tbody> 
            <tr> 
                <th>نام موضوع</th> 
            </tr>  
            <form method="post"> 
                <tr style="text-align: center;"> 
                    <td><input class="form-input" name="name" type="text" value="<?= $row['sname'] ?>">موضوع</td> 
                </tr> 
                <tr> 
                    <td> 
                        <input class="submit-button" name="submit" type="submit" value="ثبت"> 
                    </td> 
                </tr> 
            </form> 
        </tbody> 
    </table> 
</body> 
</html>