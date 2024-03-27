<!DOCTYPE html>
<html>
<head>
    <style>
        .booktable {
            width: 40%;
            border-collapse: collapse;
        }
        
        .booktable th, .booktable td {
            border: 1px solid black;
            padding: 8px;
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
                <th>نام کاربر</th>
                <th>رمز عبور</th>
                <th>سن</th>
                <th>نقش</th>
            </tr> 
            <?php
            $page_title = "ویرایش کاربر";
            include('pheader.php');
            $key = $_GET['id'];
            include('config.php');
            $result = mysqli_query($link, "SELECT * FROM users WHERE id = $key");
            $row = mysqli_fetch_assoc($result);
            
            if (isset($_POST['submit'])) {
                $name = mysqli_real_escape_string($link, $_POST['name']);
                $password = mysqli_real_escape_string($link, $_POST['password']);
                $age = $_POST['age'];
                $role = mysqli_real_escape_string($link, $_POST['role']);
                
                $sql = "UPDATE users SET name='$name', password='$password', age=$age, role='$role' WHERE id=$key";
                $res = mysqli_query($link, $sql);
                
                if ($res) {
                    header("location: users.php");
                } else {
                    echo "خطا در ویرایش کاربر: " . mysqli_error($link);
                }
            }
            ?>
        </tbody>
        <form method="post">
            <tr style="text-align: center;">
                <td><input class="form-input" name="name" type="text" value="<?= $row['name'] ?>"></td>
                <td><input class="form-input" name="password" type="text" value="<?= $row['password'] ?>"></td>
                <td><input class="form-input" name="age" type="number" value="<?= $row['age'] ?>"></td>
                <td>
                    <select class="form-input" name="role">
                        <?php 
                        if($row['role']==1){
                            ?>
                        <option value="1">مدیر</option>
                        <option value="0">کاربر</option>
                        <?php }
                        else {?>
                        <option value="0">کاربر</option>
                        <option value="1">مدیر</option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="submit-button" name="submit" type="submit" value="ثبت">
                </td>
            </tr>
        </form>
    </table>
</body>
</html>