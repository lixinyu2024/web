<?php
session_start();

// 模擬課程數據，您可以根據課程 ID 從資料庫中獲取這些資訊
$courses = [
    1 => [
        "title" => "科技管理概論(企管三/管理碩)",
        "teachers" => ["徐挺洋", "教育部 委員", "王凱傑", "顏孟賢"],
        "mainTeacher" => "顏孟賢 (Raymond Yen)",
        "img" => "./img/course01.jpg",
        "description" => [
            "Develop an understanding on issues and concepts for managing technological innovation to firms.",
            "Understand the structure and dynamics of high-tech businesses, including foundations of technological innovation, acquisition and application of technology, technological innovation strategy, high-tech industry development and entrepreneurship, and etc."
        ]
    ],
    2 => [
        "title" => "行銷管理入門",
        "teachers" => ["李老師", "商學院 教授"],
        "mainTeacher" => "李老師",
        "img" => "./img/course02.jpg",
        "description" => [
            "Introduction to marketing management principles and practices.",
            "Focus on customer orientation, brand strategy, and the impact of digital transformation on marketing."
        ]
    ],
];

// 從 URL 參數中獲取課程 ID
$courseId = $_GET['id'] ?? 1;
$course = $courses[$courseId] ?? null;

if (!$course) {
    echo "找不到該課程的詳細信息。";
    exit;
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $course['title']; ?></title>

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
    <div class="container">
        <h2 class="text-primary">選課的選項</h2>
        
        <div class="row">
            <!-- 課程資訊 -->
            <div class="col-md-6">
                <h3><?php echo $course['title']; ?></h3>
                <img src="<?php echo $course['img']; ?>" alt="課程圖片" class="img-responsive" style="width: 100%; max-width: 300px;">
                <div class="course-teachers">
                    <?php foreach ($course['teachers'] as $teacher): ?>
                        <p>教師: <?php echo $teacher; ?></p>
                    <?php endforeach; ?>
                </div>
                <p>授課教師:<br><?php echo $course['mainTeacher']; ?></p>
            </div>

            <!-- 課程目標與描述 -->
            <div class="col-md-6">
                <h4>The purpose of the course is to:</h4>
                <ul>
                    <?php foreach ($course['description'] as $point): ?>
                        <li><?php echo $point; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
