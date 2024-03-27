<!DOCTYPE html>
<html>
<head>
    <style>
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
<?php
$page_title = 'کتاب‌ها جستجوی';
include('pheader.php');

$srch = '';
$price1 = '';
$price2 = '';
$amaliat = '';

if (isset($_POST['srch'])) {
    $srch = $_POST['srch'];
    $price1 = $_POST['price1'];
    $price2 = $_POST['price2'];
    $amaliat = $_POST['amaliat'];
}

$sql = "SELECT * FROM books WHERE 1=1 ";

if ($price1 != '') $sql .= " AND price >= '$price1' ";
if ($price2 != '') $sql .= " AND price <= '$price2' ";
if ($srch != '') $sql .= " AND name LIKE '%$srch%' ";

if ($amaliat == '1') $sql .= " ORDER BY price ";
elseif ($amaliat == '2') $sql .= " ORDER BY price DESC ";
elseif ($amaliat == '3') $sql .= " ORDER BY id DESC";
elseif ($amaliat == '4') $sql .= " ORDER BY id  ";

include('config.php');
$result = mysqli_query($link, $sql);
?>

<table class="booktable">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>نام کتاب</th>
            <th>نویسنده</th>
            <th>قیمت</th>
            <th>موضوع</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['writer'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['subject'] ?></td>
                 
            </tr>
        <?php } ?>
    </tbody>
</table>


</body>
</html>