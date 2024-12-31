<?php
session_start(); // 启动 session

// 模拟课程数据数组
$courses = [
    [
        "id" => 1, // 新增課程 ID
        "title" => "科技管理概論(企管三/管理碩)",
        "teacher" => "張老師",
        "views" => 1234,
        "isPublic" => true,
        "img" => "./img/course01.jpg"
    ],
    [
        "id" => 2, // 新增課程 ID
        "title" => "行銷管理入門",
        "teacher" => "李老師",
        "views" => 987,
        "isPublic" => false,
        "img" => "./img/course02.jpg"
    ],
    // 添加更多课程...
];
?>

<!DOCTYPE html>
<html lang="zh">
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
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a class="logo" href="index.php">
                        <img src="./img/logo.png" alt="logo">
                    </a>
                </div>
                <button class="navbar-toggle">
                    <span></span>
                </button>
            </div>

            <nav id="nav">
                <ul class="main-menu nav navbar-nav navbar-right">
                    <li><a href="student_home.php">首頁</a></li>
                    <li><a href="student_course.php">課程</a></li>

                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                        <li><a href="logout.php">登出</a></li>
                    <?php else: ?>
                        <li><a href="#">註冊</a></li>
                        <li><a href="login.php">登入</a></li>
                    <?php endif; ?>
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
                        <li><a href="student_home.php">首頁</a></li>
                        <li>課程</li>
                    </ul>
                    <h1 class="white-text">課程</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses -->
    <div id="courses" class="section">
        <div class="container">
            <div class="row">
                <div class="section-header text-center">
                    <h2>我的課程</h2>
                </div>
            </div>

            <div id="courses-wrapper">
                <div class="row">
                    <?php foreach ($courses as $course): ?>
                        <!-- single course -->
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="course" style="position: relative;">
                                <!-- 將課程圖片添加超連結，指向詳細頁面 -->
                                <a href="video_detail.php?id=<?php echo $course['id']; ?>" class="course-img">
                                    <img src="<?php echo $course['img']; ?>" alt="">
                                    <i class="course-link-icon fa fa-link"></i>
                                </a>
                                <!-- 將課程標題添加超連結，指向詳細頁面 -->
                                <a href="video_detail.php?id=<?php echo $course['id']; ?>" class="course-title">
                                    <?php echo $course['title']; ?>
                                </a>
                                <p class="course-teacher">教師: <?php echo $course['teacher']; ?></p>
                                <div class="course-details">
                                    <span class="course-views">
                                        <i class="fa fa-eye"></i> <?php echo $course['views']; ?> Views
                                    </span>
                                    <span class="course-status" style="position: absolute; right: 10px;">
                                        <?php if ($course['isPublic']): ?>
                                            <i class="fa fa-unlock" aria-hidden="true" style="color: green;"></i> 公開
                                        <?php else: ?>
                                            <i class="fa fa-lock" aria-hidden="true" style="color: red;"></i> 不公開
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /single course -->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /Courses -->

    <!-- Footer -->
    <footer id="footer" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-logo">
                        <a class="logo" href="index.php">
                            <img src="./img/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="footer-nav">
                        <li><a href="index.php">首頁</a></li>
                        <li><a href="#">關於我們</a></li>
                        <li><a href="#">課程</a></li>
                        <li><a href="blog.html">活動</a></li>
                        <li><a href="contact.html">聯絡</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
