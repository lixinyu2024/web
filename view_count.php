<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        .sidebar {
            background-color: #f0f4f8;
            height: 100vh;
            padding: 20px;
            border-radius: 10px;
        }
        .sidebar h3 {
            font-size: 2.5rem;
            color: #2a2a2a;
            margin-bottom: 1rem;
            font-weight: bold;
        }
        .nav-link {
            font-size: 2rem;
            color: #333;
            background-color: #e9f1fa;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.2s, color 0.2s;
        }
        .nav-link:hover {
            background-color: #cde0f2;
            color: #0056b3;
        }
        .nav-link i {
            margin-right: 10px;
            color: #0056b3;
        }
        .main-content {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
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
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <!-- Header  -->
    <header id="header">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a class="logo" href="view_count.php.php">
                        <img src="./img/logo.png" alt="logo">
                    </a>
                </div>
                <button class="navbar-toggle">
                    <span></span>
                </button>
            </div>
            <nav id="nav">
                <ul class="main-menu nav navbar-nav navbar-right">
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
                        <li><a href="admin_dashboard.php">首頁</a></li>
                        <li>後臺管理</li>
                    </ul>
                    <h1 class="white-text">後臺管理</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- 左側導航欄 -->
            <nav class="col-md-3 sidebar">
                <h3>管理選單</h3>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_dashboard.php"><i class="fa fa-user"></i> 會員管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_video.php"><i class="fa fa-film"></i> 影片管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_count.php"><i class="fa fa-chart-bar"></i> 觀看影片數據</a>
                    </li>
                </ul>
            </nav>

            <!-- 右側主要內容區 -->
            <div class="col-md-9 main-content">
                <h3>觀看影片數據</h3>
                <h4 class="mt-4">各課程影片觀看學生數量</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>課程標題 </th>
                            <th>課程檔案 </th>
                            <th>觀看人數</th>
                        </tr>

                        <?php
                            // Step 1: Connect to the database
                            $link = mysqli_connect('localhost', 'root', '', 'school');

                            // Check connection
                            if (!$link) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Step 2: Query to fetch account data
                            $sql = "SELECT * FROM course";
                            $result = mysqli_query($link, $sql);

                            // Step 3: Display account list
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>{$row['title']}</td>
                                            <td>{$row['file']}</td>
                                            <td>{$row['views']}</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>沒有紀錄。</td></tr>";
                            }

                            // Step 4: Close the database connection
                            mysqli_close($link);
                        ?>    
                        
                    </thead>
                </table>

                <!-- <h4 class="mt-4">每位學生各課程影片觀看時數</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>學生 </th>
                            <th>課程檔案 </th>
                            <th>觀看時數</th>
                        </tr>

                        
                    </thead>
                    <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td> 分鐘</td>
                                </tr>
                    </tbody>
                </table>-->
            </div>
        </div>
    </div>

</body>
</html>
