<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>新增會員</title>
  <meta http-equiv="refresh" content="3; url=admin_dashboard.php">
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
        // 获取表单提交的数据
        $id = $_POST['id'] ?? '';
        $password = $_POST['password'] ?? '';
        $name = $_POST['name'] ?? '';
        $level = $_POST['level'] ?? '';

        // Step 1: 数据库连接
        $link = mysqli_connect('localhost', 'root', '', 'school');
        // 检查数据库连接
        if (!$link) {
            die("数据库连接失败: " . mysqli_connect_error());
        }
        // Step 2: 检查是否已存在相同的 ID
        $sql_check = "SELECT id FROM account WHERE id = '$id'";
        $result_check = mysqli_query($link, $sql_check);

        if (mysqli_num_rows($result_check) > 0) {
            // 如果已存在相同的 ID，显示提示信息
            echo "<script>alert('會員編號已存在，請使用其他編號！'); window.history.back();</script>";
        } else {

            // Step 2: 插入数据的 SQL 语句
            $sql = "INSERT INTO account (id, password, name, level) 
                    VALUES ('$id', '$password', '$name', '$level')";

            // Step 3: 执行插入操作
            if (mysqli_query($link, $sql)) {
                echo "新增完成";
            } else {
                echo "新增失败: " . mysqli_error($link);
            }
        }
        
        // Step 4: 关闭数据库连接
        mysqli_close($link);
        ?>
    </p>
</body>
</html>