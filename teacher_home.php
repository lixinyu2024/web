<?php
session_start(); // 启动 session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
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
    <header id="header" class="transparent-nav">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a class="logo" href="teacher_home.php">
                        <img src="./img/logo.png" alt="logo">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Mobile toggle -->
                <button class="navbar-toggle">
                    <span></span>
                </button>
                <!-- /Mobile toggle -->
            </div>

            <!-- Navigation -->
            <nav id="nav">
                <ul class="main-menu nav navbar-nav navbar-right">
                    <li><a href="teacher_home.php">首頁</a></li>
                    <li><a href="video_management.php">影片管理</a></li>
                    <li><a href="logout.php">登出</a></li>
                </ul>
            </nav>
            <!-- /Navigation -->

        </div>
    </header>
    <!-- /Header -->

    <!-- Hero-area -->
    <div class="hero-area section">
        <div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1 class="white-text">歡迎來到數位教學平台</h1>
                    <p class="lead white-text">探索我們的課程並享受學習的樂趣</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Hero-area -->

    <!-- About -->
    <div id="about" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="section-header">
                        <h2>最新公告</h2>
                    </div>

                    <!-- feature -->
                    <div class="feature">
                        <i class="feature-icon fa fa-flask"></i>
                        <div class="feature-content">
                            <h4>學生帳號密碼問題 </h4>
                            <p>學生帳號皆設定為學號，密碼則由系統自動寄發至學生信箱(學號@m365.fju.edu.tw)。</p>
                        </div>
                    </div>
                    <!-- /feature -->

                    <!-- feature -->
                    <div class="feature">
                        <i class="feature-icon fa fa-users"></i>
                        <div class="feature-content">
                            <h4>停機公告</h4>
                            <p>配合學校高壓變電站定期清潔檢驗停電，預計時間為113年8月2日(五)22:00  至 113年8月5日(一)18:00
                                造成不便，敬請見諒。</p>
                        </div>
                    </div>
                    <!-- /feature -->

                    <!-- feature -->
                    <div class="feature">
                        <i class="feature-icon fa fa-comments"></i>
                        <div class="feature-content">
                            <h4>尊重及保護智慧財產權</h4>
                            <p>請各位若未經取得出版社授權，請勿將教科書附件教師資源光碟內容上傳至MOODLE平台，或錄製於開放式課程內供學生自由複製或自由使用。
                                請尊重與保護智慧財產權，切莫觸法！</p>
                        </div>
                    </div>
                    <!-- /feature -->

                    <!-- Courses Section -->
                    <div id="courses-wrapper" class="section">
                        <div class="container">
                            <div class="section-header">
                                <h2>上傳的課程</h2>
                                <p>探索不同領域的熱門課程</p>
                            </div>

                            <div class="row">
                                <?php
                                // Step 1: Connect to the database
                                $link = mysqli_connect('localhost', 'root', '', 'school');

                                // 確認連接
                                if (!$link) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Step 2: Query to fetch course data
                                $sql = "SELECT * FROM course";
                                $result = mysqli_query($link, $sql);

                                // Step 3: Display account list
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<div class="col-md-3 col-sm-6 col-xs-6">';
                                        echo '    <div class="course">';
                                        // 圖片連結
                                        echo '        <a href="video_player.php?file=' . urlencode($row['file']) . '" class="course-link">';
                                        echo '            <div class="course-img">';
                                        echo '                <img src="./img/course02.jpg" alt="課程封面">';
                                        echo '                <i class="course-link-icon fa fa-play"></i>';
                                        echo '            </div>';
                                        echo '        </a>';
                                        echo '        <div class="course-content">';
                                        echo '            <h4>' . htmlspecialchars($row['title']) . '</h4>';
                                        echo '            <p class="coursename">教師: ' . htmlspecialchars($row['coursename']) . '</p>';
                                        echo '            <div class="course-details">';
                                        echo '                <span class="course-views">';
                                        echo '                    <i class="fa fa-eye"></i> 觀看次數: ' . htmlspecialchars($row['views']) . ' 次';
                                        echo '                </span>';
                                        echo '                <span class="course-status" style="position: absolute; right: 10px;">';
                                        echo '                    <i class="fa fa-unlock" aria-hidden="true" style="color: green;"></i> 公開';
                                        echo '                </span>';
                                        echo '            </div>';
                                        echo '        </div>';
                                        echo '    </div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo '<p>目前尚無課程。</p>';
                                }
                                $link->close();
                                ?>
                            </div>
                        </div>
                    </div>
                     <!-- /Courses Section -->
                </div>
                    

                <div class="col-md-6">
                    <div class="about-img">
                        <img src="./img/about.png" alt="">
                    </div>
                </div>

            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /About -->

    <!-- Contact CTA -->
    <div id="contact-cta" class="section">
        <!-- Background Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url(./img/cta2-background.jpg)"></div>
        <!-- Background Image -->

        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="white-text">聯絡資訊</h2>
                    <p class="lead white-text"> 管理學院 <br></p>
                    <ul class="contact-details lead white-text">
                        <li><i class="fa fa-phone"></i> 02-2905-2651</li>
                        <li><i class="fa fa-envelope"></i> 057572@mail.fju.edu.tw</li>
                        <li><i class="fa fa-map-marker"></i> 242062 新北市新莊區中正路510號</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Contact CTA -->

    <!-- Footer -->
    <footer id="footer" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- footer logo -->
                <div class="col-md-6">
                    <div class="footer-logo">
                        <a class="logo" href="teacher_home.php">
                            <img src="./img/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- footer logo -->
            </div>
            <!-- /row -->
            <!-- row -->
            <div id="bottom-footer" class="row">
            </div>
            <!-- row -->
        </div>
        <!-- /container -->
    </footer>
    <!-- /Footer -->

    <!-- preloader -->
    <div id='preloader'><div class='preloader'></div></div>
    <!-- /preloader -->

    <!-- jQuery Plugins -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>
</html>
