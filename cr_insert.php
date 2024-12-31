<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="3; url=video_management.php">
  <title>新增課程</title>
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
        $courseid = $_POST['courseid'] ?? '';
        $title = $_POST['title'] ?? '';
        $coursedate = $_POST['coursedate'] ?? '';
        $coursename = $_POST['coursename'] ?? '';
        $file_name = '';

        // Step 1: 数据库连接
        $link = mysqli_connect('localhost', 'root', '', 'school');

        // 检查数据库连接
        if (!$link) {
            die("数据库连接失败: " . mysqli_connect_error());
        }

        // Step 2: 检查是否已存在相同的課程編號
        $sql_check = "SELECT courseid FROM course WHERE courseid = '$courseid'";
        $result_check = mysqli_query($link, $sql_check);

        if (mysqli_num_rows($result_check) > 0) {
            // 如果已存在相同的课程编号，显示提示信息
            echo "<script>alert('課程編號已存在，請使用其他編號！'); window.history.back();</script>";
        } else {
            // Step 3: 處理檔案上傳
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_name = basename($_FILES['file']['name']);
                $upload_dir = 'uploads/';

                // 確保 uploads 資料夾存在
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // 移動檔案到 uploads 資料夾
                if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                    echo "檔案上傳成功：$file_name<br>";
                } else {
                    echo "檔案上傳失敗！<br>";
                }
            } else {
                echo "未接收到檔案或檔案上傳失敗！<br>";
            }

            // Step 4: 插入数据的 SQL 语句
            $sql = "INSERT INTO course (courseid, title, file, coursedate ,coursename) 
                    VALUES ('$courseid', '$title', '$file_name', '$coursedate', '$coursename')";

            // Step 5: 执行插入操作
            if (mysqli_query($link, $sql)) {
                echo "新增完成";
            } else {
                echo "新增失败: " . mysqli_error($link);
            }
        }

        // Step 6: 关闭数据库连接
        mysqli_close($link);
        ?>
    </p>
</body>
</html>
