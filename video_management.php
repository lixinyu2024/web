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
                        <h4>王翠蘭</h4>
                    </div>

                    <!-- category widget -->
                    <div class="widget category-widget">
                        <h3>我的影片</h3>
                        <a class="category" href="#">應用統計 <span>1</span></a>
                        <a class="category" href="#">應用統計-網 <span>1</span></a> 
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
                            <form action="cr_insert.php" method="POST" enctype="multipart/form-data">
                                
                                <!-- 課程編號 -->
                                <div class="mb-3">
                                    <label for="courseid" class="form-label">課程編號</label>
                                    <input type="text" class="form-control" id="courseid" name="courseid" required>
                                </div>
                                
                                <!-- 課程標題 -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">課程標題</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                
                                <!-- 課程檔案 -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">課程檔案</label>
                                    <input type="file" class="form-control" id="file" name="file" required>
                                </div>
                                
                                <!-- 修改時間 -->
                                <div class="mb-3">
                                    <label for="coursedate" class="form-label">修改時間</label>
                                    <input type="date" class="form-control" id="coursedate" name="coursedate" required>
                                </div>
                                
                                <!-- 修改者 -->
                                <div class="mb-3">
                                    <label for="coursename" class="form-label">修改者</label>
                                    <input type="text" class="form-control" id="coursename" name="coursename" required>
                                </div>
                                
                                <!-- 確認上傳按鈕 -->
                                <button type="submit" class="btn btn-primary">確認上傳</button>
                                <button type="reset" class="btn btn-secondary">重設</button>
                            </form>
                        </div>
                    </div>


                    <!-- Video List -->
                    <div class="row">
                        <?php 
                        $link = mysqli_connect('localhost', 'root', '', 'school');
                        if (!$link) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        // Step 2: Query to fetch course data
                        $sql = "SELECT * FROM course";
                        $result = mysqli_query($link, $sql);
                        // Step 3: Display course list
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='col-md-6'>
                                        <div class='single-blog'>
                                            <div class='blog-img'>
                                                <a href='video_player.php?file=" . urlencode($row['file']) . "' class='blog-link'>
                                                    <img src='./img/course02.jpg' alt=''>
                                                </a>
                                            </div>
                                            <h4>{$row['title']}</h4>
                                            <div class='blog-meta'>
                                                <span class='course-views'>
                                                    <i class='fa fa-eye'></i> 觀看次數: {$row['views']}
                                                </span>
                                                <div class='pull-right'>
                                                    <a href='cr_dblink.php?courseid={$row['courseid']}&method=delete' class='btn btn-danger btn-sm' onclick='return confirm(\"確定要刪除嗎？\");'>刪除</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                            }
                        } else {
                            echo "<div class='col-md-12'><p>沒有課程影片紀錄。</p></div>";
                        }
                        // Step 4: Close the database connection
                        mysqli_close($link);
                        ?>
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
