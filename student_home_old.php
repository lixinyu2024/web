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
                    <a class="logo" href="student_home.php">
                        <img src="./img/logo.png" alt="logo">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Mobile toggle -->
                <button class="navbar-toggle"></button>
                <!-- /Mobile toggle -->
            </div>

            <!-- Navigation -->
            <nav id="nav">
                <ul class="main-menu nav navbar-nav navbar-right">
                    <li><a href="student_home.php">首頁</a></li>
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
                        <h2>公告區</h2>
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
                                <h2>我的課程</h2>
                                <p>探索不同領域的熱門課程</p>
                            </div>

                            <div class="row">
                                <?php
                                // 連接資料庫
                                $conn = new mysqli('localhost', 'root', '', 'school');

                                // 確認連接
                                if ($conn->connect_error) {
                                    die("資料庫連接失敗: " . $conn->connect_error);
                                }

                                // 查詢課程資料
                                $sql = "SELECT * FROM course"; // 假設你的課程表為 course
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="col-md-3 col-sm-6 col-xs-6">';
                                        echo '    <div class="course">';
                                        echo '        <div class="course-img">';
                                        // 封面圖片
                                        echo '            <img src="./img/course02.jpg" alt="課程封面">';
                                        // 影片連結
                                        echo '            <a href="video_player.php?file=' . urlencode($row['file']) . '" class="course-link">';
                                        echo '                <i class="course-link-icon fa fa-play"></i>';
                                        echo '            </a>';
                                        echo '        </div>';
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

                                $conn->close();
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
                        <a class="logo" href="student_home.php">
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
