<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>期末作業</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Header  -->
    <header id="header">
        <div class="container">
            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a class="logo" href="index.php">
                        <img src="./img/logo.png" alt="logo">
                    </a>
                </div>
                <!-- Mobile toggle -->
                <button class="navbar-toggle"></button>
            </div>

            <!-- Navigation -->
            <nav id="nav">
                <ul class="main-menu nav navbar-nav navbar-right">
                    <li><a href="index.php">首頁</a></li>
                    <li><a href="login.htm">登入</a></li>
                </ul>
            </nav>
            <!-- /Navigation -->
        </div>
    </header>
    <!-- /Header  -->

    <!-- Home -->
    <div id="home" class="hero-area">
        <!-- Background Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url(./img/home-background.jpg)"></div>
        <!-- /Background Image -->

        <div class="home-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="white-text">遠距教學影片管理系統</h1>
                        <p class="lead white-text"></p>
                        <a class="main-button icon-button" href="login.htm">現在開始!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Home -->

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
                            <p>配合學校高壓變電站定期清潔檢驗停電，預計時間為113年8月2日(五)22:00  至 113年8月5日(一)18:00 造成不便，敬請見諒。</p>
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
                        <a class="logo" href="index.php">
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
     
</body>
</html>
