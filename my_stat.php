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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        /* 改善的內容樣式 */
        .main-content {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .video-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .video-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        .video-item img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .video-info {
            flex: 1;
        }
        .video-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .video-description {
            font-size: 1.4rem;
            color: #666;
        }
        .video-stats {
            font-size: 1.4rem;
            color: #666;
            margin-top: 5px;
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
                    <a class="logo" href="my_stat.php">
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
                    <li><a href="student_home.php">首頁</a></li>
                    <li><a href="my_stat.php">學習分析</a></li>                    
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
                        <li><a href="student_home.php">首頁</a></li>
                        <li>學習分析</li>
                    </ul>
                    <h1 class="white-text">學習分析</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- 主內容區 -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-content">
                <h3>觀看影片數據</h3>
                <p>學生各課程影片觀看情況 : </p>

                <?php 
                // Step 1: Connect to the database
                $link = mysqli_connect('localhost', 'root', '', 'school');
                // Check connection
                if (!$link) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                // Step 2: Query to fetch data
                $sql = "SELECT * FROM view_history";
                $result = mysqli_query($link, $sql);
                // Step 3: Display list
                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="video-list">';
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Fetch video data from the row
                        $video_title = $row['courseid'];  // 假設欄位名稱為courseid
                        $visit_count = $row['view_duration'];  // 假設欄位名稱為view_duration
                        $stay_time = $row['view_duration'];  // 假設欄位名稱為view_duration
                        // Format stay time to hours, minutes, seconds (assuming stay_time is in seconds)
                        $hours = floor($stay_time / 3600);
                        $minutes = floor(($stay_time % 3600) / 60);
                        $seconds = $stay_time % 60;
                        echo '
                        <div class="video-item">
                            <img src="./img/course02.jpg" alt="影片封面">
                            <div class="video-info">
                                <p class="video-title">課程：' . htmlspecialchars($video_title) . '</p>
                                <p class="video-description">造訪次數: ' . htmlspecialchars($visit_count) . ' 次</p>
                                <p class="video-stats">停留時長: ' . $hours . ' 小時 ' . $minutes . ' 分鐘 ' . $seconds . ' 秒</p>
                            </div>
                        </div>';
                    }
                    echo '</div>';
                } else {
                    echo '<p>沒有找到任何觀看資料。</p>';
                }
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-logo">
                        <a class="logo" href="my_stat.php">
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
