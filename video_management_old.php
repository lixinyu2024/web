<?php
session_start(); // 启动 session
$upload_dir = "uploads/";

// 处理上传文件
if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] == UPLOAD_ERR_OK) {
    $uploaded_file = $_FILES['video_file'];
    $file_name = basename($uploaded_file['name']);
    $target_file = $upload_dir . $file_name;

    if (move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
        echo "<script>alert('影片已成功上傳！');</script>";
    } else {
        echo "<script>alert('影片上傳失敗！');</script>";
    }
}

// 删除视频文件的逻辑
if (isset($_POST['delete_file'])) {
    $file_to_delete = $upload_dir . basename($_POST['delete_file']);
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
        echo "<script>alert('影片已被刪除！');</script>";
    } else {
        echo "<script>alert('找不到該影片文件！');</script>";
    }
}

// 获取文件列表
$videos = array_diff(scandir($upload_dir), array('.', '..'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML Education Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <style>
        .notification {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            display: none;
            z-index: 1000;
        }

        .notification-content {
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            text-align: center;
            position: relative; 
            width: 800px;
            height: auto;
        }

        .notification-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .notification-content i {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .notification-content button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }
        
        .close {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 10px;
            font-size: 50px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a class="logo" href="video_management.php">
                        <img src="./img/logo.png" alt="logo">
                    </a>
                </div>
                <!-- Mobile toggle -->
                <button class="navbar-toggle">
                    <span></span>
                </button>
            </div>

            <!-- Navigation -->
            <nav id="nav">
                <ul class="main-menu nav navbar-nav navbar-right">
                    <li><a href="teacher_home.php">首頁</a></li>
                    <li><a href="video_management.php">影片管理</a></li>                    
                    <li><a href="logout.php">登出</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero-area -->
    <div class="hero-area section">
        <div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="teacher_home.php">首頁</a></li>
                        <li>影片管理</li>
                    </ul>
                    <h1 class="white-text">影片管理</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog -->
    <div id="blog" class="section">
        <div class="container">
            <div class="row">

                <!-- aside blog -->
                <div id="aside" class="col-md-3">
                    <!-- profile widget -->
                    <div class="widget profile-widget text-center">
                        <i class="fa fa-user-circle" style="font-size: 100px; color: #ccc; margin-bottom: 10px;"></i>
                        <h4>李老師</h4>
                    </div>

                    <!-- category widget -->
                    <div class="widget category-widget">
                        <h3>我的影片</h3>
                        <a class="category" href="#">Web <span>12</span></a>
                        <a class="category" href="#">Css <span>5</span></a>
                        <a class="category" href="#">Wordpress <span>24</span></a>
                        <a class="category" href="#">Html <span>78</span></a>
                        <a class="category" href="#">Business <span>36</span></a>
                    </div>
                </div>
                <!-- /aside blog -->

                <!-- main blog -->
                <div id="main" class="col-md-9">
                    <!-- Upload Video Button -->
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6">
                            <button onclick="uploadVideo()" class="btn btn-primary">
                                <i class="fa fa-plus"></i> 上傳影片
                            </button>
                        </div>

                        <div class="col-md-6">
                            <div class="widget search-widget">
                                <form>
                                    <input class="input" type="text" name="search">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Upload Video Button and Search Widget -->

                    <!-- Notification window -->
                    <div id="notification" class="notification">
                        <div class="notification-content">
                            <span class="close" onclick="closeNotification()">&times;</span>
                            <h2 class="upload-title">上傳影片</h2>
                            <form action="" method="post" enctype="multipart/form-data">
                                <p>將你要上傳的影片檔案點擊選擇檔案。</p>
                                <input type="file" name="video_file" required>
                                <button type="submit" class="btn btn-primary">確認上傳</button>
                            </form>
                        </div>
                    </div>

                    <!-- Video List -->
                    <div class="row">
                        <?php foreach ($videos as $video): ?>
                        <div class="col-md-6">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="<?php echo $upload_dir . $video; ?>">
                                        <img src="./img/course02.jpg" alt="">
                                    </a>
                                </div>
                                <h4><a href="<?php echo $upload_dir . $video; ?>"><?php echo $video; ?></a></h4>
                                <div class="blog-meta">
                                    <span class="course-views">
                                        <i class="fa fa-eye"></i> 觀看次數: <?php echo $video_views[$video]['views'] ?? 1; ?> <!-- 您可以在这里动态更改观看次数 -->
                                    </span>
                                    <div class="pull-right">
                                        <!-- Delete button -->
                                        <form method="post" style="display:inline;">
                                            <input type="hidden" name="delete_file" value="<?php echo $video; ?>">
                                            <button type="submit" class="delete-btn" style="background: none; border: none; cursor: pointer;">
                                                <i class="fa fa-trash"></i> 刪除
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- /Video List -->
                </div>
                <!-- /main blog -->

            </div>
        </div>
    </div>
    <!-- /Blog -->

    <!-- Footer -->
    <footer id="footer" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-logo">
                        <a class="logo" href="video_management.php">
                            <img src="./img/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function uploadVideo() {
            document.getElementById("notification").style.display = "flex";
        }

        function closeNotification() {
            document.getElementById("notification").style.display = "none";
        }
    </script>
</body>
</html>
