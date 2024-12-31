<!doctype html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="3; url=admin_video.php">
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
        // 刪除資料程式碼
        $courseid = $_GET['courseid'];

        // 数据库连接
        $link = mysqli_connect('localhost', 'root', '', 'school');
        if (!$link) {
            die("数据库连接失败：" . mysqli_connect_error());
        }

        // 删除语句
        $sql = "DELETE FROM course WHERE courseid='$courseid'";
        if (mysqli_query($link, $sql)) {
            echo "删除完成，Check it out~~";
        } else {
            echo "删除失败: " . mysqli_error($link);
        }

        mysqli_close($link);
    ?>
    </p>
</body>
</html>
