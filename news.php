<?php 
session_start(); // 启动 session
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理後台</title>
    <!-- Google 字体 -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

    <!-- Bootstrap 样式 -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Font Awesome 图标 -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <style>
        /* 左側導航欄樣式 */
        .sidebar {
            background-color: #f0f4f8; /* 淡藍色背景 */
            height: 120vh;
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
            font-size: 1.5rem;
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
        
        /* 右側主要內容區樣式 */
        .main-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }
        .feature {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 1rem;
        }
        .feature h4 {
            font-size: 1.25rem;
            color: #2a2a2a;
        }
        .feature p {
            color: #555;
        }
    </style>
</head>
<body>

    <!-- Header  -->
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
        

            <!-- Navigation -->
            <nav id="nav">
                <ul class="main-menu nav navbar-nav navbar-right">
                    <li><a href="logout.php">登出</a></li>
                </ul>
            </nav>
        </div>
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
    <!-- /Hero-area -->

    <div class="container-fluid">
        <div class="row">
            <!-- 左側導航欄 -->
            <nav class="col-md-3 sidebar">
                <h3>管理選單</h3>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-th-large"></i> 公告區</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> 會員管理</a>
                    </li>
                </ul>
            </nav>

            <!-- 右側主要內容區 -->
            <main class="col-md-9 main-content">
                <h3>最新消息</h3>

                <!-- feature 區塊 -->
                <div class="feature">
                    <h4>學生帳號密碼問題</h4>
                    <p>酒店二樓上庭酒廊推出的四款充滿秋意紅酒調製，包含經典雞尾酒、蘋果微醺情調，每杯480元起。此外現場加碼提供火燄現切服務學生帳號皆設定為學號，密碼則由系統自動寄發至學生信箱(學號@m365.fju.edu.tw)。</p>
                </div>

                <div class="feature">
                    <h4>停機公告</h4>
                    <p>配合學校高壓變電站定期清潔檢驗停電，預計時間為113年8月2日(五)22:00  至 113年8月5日(一)18:00
                    造成不便，敬請見諒。</p>
                </div>

                <div class="feature">
                    <h4>尊重及保護智慧財產權</h4>
                    <p>請勿將教科書附件教師資源光碟內容上傳至平台，請尊重與保護智慧財產權，切莫觸法！</p>
                </div>

                <!-- 新增/修改公告區塊 -->
                <div class="card mt-4">
                    <div class="card-header">
                        新增/修改公告
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="announcement-title" class="form-label">標題</label>
                                <input type="text" class="form-control" id="announcement-title" placeholder="輸入標題">
                            </div>
                            <div class="mb-3">
                                <label for="announcement-content" class="form-label">內容</label>
                                <textarea class="form-control" id="announcement-content" rows="4" placeholder="輸入內容"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">提交</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
