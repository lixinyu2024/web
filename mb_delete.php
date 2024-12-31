<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3; url=admin_dashboard.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google 字体 -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <!-- Bootstrap 样式 -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <!-- Font Awesome 图标 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <p align="center">
        <?php
        // 获取會員编号
        $id = $_GET['id'] ?? '';

        // 检查是否提供了會員编号
        if (empty($id)) {
            echo "會員編號未提供，無法刪除會員。";
            exit;
        }

        // 数据库连接
        $link = mysqli_connect('localhost', 'root', '', 'school');

        // 检查数据库连接
        if (!$link) {
            die("資料庫連接失敗: " . mysqli_connect_error());
        }

        // 删除會員的 SQL 语句
        $sql = "DELETE FROM account WHERE id = '$id'";

        // 执行删除操作
        if (mysqli_query($link, $sql)) {
            echo "會員刪除成功！";
        } else {
            echo "會員刪除失敗: " . mysqli_error($link);
        }

        // 关闭数据库连接
        mysqli_close($link);
        ?>
    </p>
</body>
</html>
