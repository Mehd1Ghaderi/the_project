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
                <th>نام کتاب</th>
                <th>نویسنده</th>
                <th>قیمت</th>
                <th>موضوع</th>
            </tr>
            <?php
            $page_title = "ویرایش کتاب";
            include('pheader.php');
            $key = $_GET['id'];
            include('config.php');
            $sql = "SELECT * FROM books WHERE id = ?";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "i", $key);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            if (isset($_POST['submit'])) {
                $name = mysqli_real_escape_string($link, $_POST['name']);
                $writer = mysqli_real_escape_string($link, $_POST['writer']);
                $price = $_POST['price'];
                $subject = mysqli_real_escape_string($link, $_POST['subject']);

                $sql = "UPDATE books SET name=?, writer=?, price=?, subject=? WHERE id=?";
                $stmt = mysqli_prepare($link, $sql);
                mysqli_stmt_bind_param($stmt, "ssisi", $name, $writer, $price, $subject, $key);
                mysqli_stmt_execute($stmt);
                if (mysqli_affected_rows($link) > 0) {
                    header("location: books.php");

                } else {
                    echo "خطا در ویرایش کتاب: " . mysqli_error($link);
                }
            }
            ?>
            <form method="post">
                <tr style="text-align: center;">
                    <td><input class="form-input" name="name" type="text" value="<?= $row['name'] ?>"></td>
                    <td><input class="form-input" name="writer" type="text" value="<?= $row['writer'] ?>"></td>
                    <td><input class="form-input" name="price" type="number" value="<?= $row['price'] ?>"></td>
                    <td>
                        <select class="form-input" name="subject">
                            <?php
                            $subjects = "SELECT sname from subjects";
                            $results = mysqli_query($link, $subjects);
                            while ($row = mysqli_fetch_assoc($results)) {
                            ?>
                                <option value="<?= $row['sname'] ?>"><?= $row["sname"] ?></option>
                            <?php } ?>
                        </select>
                    </td>
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
