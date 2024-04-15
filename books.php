<!DOCTYPE html>
<html>
<head>
 
</head>
<body>

    <table class="text-[#30374A] text-[18px] w-[900px]">
        <thead>
            <tr class="border-b border-[#8B5CFB]">
                <th class="py-3 text-right font-light w-1/4">شناسه</th>
                <th class="py-3 text-right font-light w-1/4">نام کتاب</th>
                <th class="py-3 text-right font-light w-1/4">نویسنده</th>
                <th class="py-3 text-right font-light w-1/4">قیمت</th>
                <th class="py-3 text-right font-light w-1/4">موضوع</th>
                <th class="py-3 text-right font-light w-1/4"><a class="insert" href="insert-book.php">افزودن کتاب</a></th>
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
                <tr  class="border-b border-[#D3D8E4]">
                    <td class="py-4 w-1/4 p-4"><?= $row['id'] ?></td>
                    <td class="py-4 w-1/4"><?= $row['name'] ?></td>
                    <td class="py-4 w-1/4"><?= $row['writer'] ?></td>
                    <td class="py-4 w-1/4"><?= $row['price'] ?></td>
                    <td class="py-4 w-1/4"><?= $row['subject'] ?></td>
                    <td class="py-4 w-1/4">
                    <div class="flex items-center gap-2 justify-end">
    <a class="text-[#8B5CFB]" href="delete-book.php?id=<?= $row['id'] ?>"> <i class="fa-solid fa-trash p-1 rounded-[8px] shadow bg-[white]"></i>  </a>
    <a class="text-[#8B5CFB]" href="edite-books.php?id=<?= $row['id'] ?>"> <i class="fa-solid fa-pen-to-square p-1 rounded-[8px] shadow bg-[white]"></i></a>
    </div>
                        <!-- <a class="editedel" href="delete-book.php?id=<?= $row['id'] ?>">حذف</a> | <a class="editedel" href="edite-books.php?id=<?= $row['id'] ?>">ویرایش</a> -->
                    </td>
                </tr>
            <?php } ?>
            <form action="book-search.php" method="post">

    <div class="row">

        <div class="col-sm-1">عبارت</div>

        <div class="col-sm-3">

            <input type="text" name="srch" value="" class="form-control bg-[#F1F2FF] py-1 px-2 rounded-[8px] border border-[#CECFFF] outline-none " >

        </div>
        
        <div class="col-sm-1">قیمت از</div>

        <div class="col-sm-2">

            <input type="text" name="price1" value="" class="form-control bg-[#F1F2FF] py-1 px-2 rounded-[8px] border border-[#CECFFF] outline-none " />

        </div>

        <div class="col-sm-1">قیمت تا</div>
        <input type="text" name="price2" value="" class="form-control bg-[#F1F2FF] py-1 px-2 rounded-[8px] border border-[#CECFFF] outline-none " />

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

            <input type="submit" value="جستجو" class="btn btn-info bg-[#F1F2FF] py-1 px-2 rounded-[8px] border border-[#CECFFF] outline-none " />
            
        </div>
    </div>
</form>
<footer>
     
</footer>
</html>