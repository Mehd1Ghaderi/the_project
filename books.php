<!DOCTYPE html>
<html>
<head>
    <style>
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: bottom;
            padding: 10px 0;
        }
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
<body>

    <table class="booktable">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>نام کتاب</th>
                <th>نویسنده</th>
                <th>قیمت</th>
                <th>موضوع</th>
                <th><a class="insert" href="insert-book.php">افزودن کتاب</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $page_title = "لیست کتاب ها";
            include('pheader.php');
            include('config.php');
            $result = mysqli_query($link, "SELECT * FROM books");
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['writer'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['subject'] ?></td>
                    <td>
                        <a class="editedel" href="delete-book.php?id=<?= $row['id'] ?>">حذف</a> | <a class="editedel" href="edite-books.php?id=<?= $row['id'] ?>">ویرایش</a>
                    </td>
                </tr>
            <?php } ?>
            <form action="book-search.php" method="post">

    <div class="row">

        <div class="col-sm-1">عبارت</div>

        <div class="col-sm-3">

            <input type="text" name="srch" value="" class="form-control">

        </div>
        
        <div class="col-sm-1">قیمت از</div>

        <div class="col-sm-2">

            <input type="text" name="price1" value="" class="form-control" />

        </div>

        <div class="col-sm-1">قیمت تا</div>
        <input type="text" name="price2" value="" class="form-control" />

        <div class="col-sm-2">

            <input type="radio" name="amaliat" value="1" class="form-control" />ارزان

        </div>

        <div class="col-sm-2">

            <input type="radio" name="amaliat" value="2" class="form-control" />گران

        </div>

        <div class="col-sm-2">

            <input type="radio" name="amaliat" value="3" class="form-control" />تازه

        </div>

        <div class="col-sm-2">

            <input type="radio" name="amaliat" value="4" class="form-control" />قدیمی

        </div>

        <div class="col-sm-2">

            <input type="submit" value="جستجو" class="btn btn-info" />
            
        </div>
    </div>
</form>
<footer>
     
</footer>
</html>