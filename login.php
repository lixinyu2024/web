<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="3; url=index.php">
  <title>Document</title>
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
  <link type="text/css" rel="stylesheet" href="css/style.css"/>
 </head>
 <body>
 <?php
session_start();
// 檢查是否有傳送 POST 請求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 取得表單傳來的帳號和密碼
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    // Step 1: 連接到 MySQL 資料庫
    $link = mysqli_connect('localhost', 'root', '', 'school');
    // 檢查是否成功連接到資料庫
    if (!$link) {
        die("資料庫連接失敗: " . mysqli_connect_error());
    }
    // Step 2: 防止 SQL 注入，使用準備語句
    $stmt = $link->prepare("SELECT * FROM account WHERE id = ? AND password = ?");
    $stmt->bind_param("ss", $id, $password);  // "ss" 表示帳號和密碼都是字串型別
    $stmt->execute();  // 執行查詢
    // Step 3: 獲取查詢結果
    $result = $stmt->get_result();
    // Step 4: 檢查是否有匹配的帳號和密碼
    if ($row = $result->fetch_assoc()) {
        // 登入成功，將用戶資料存入 Session
        $_SESSION['name'] = $row['name'];
        $_SESSION['level'] = $row['level'];
        // 根據角色導向不同頁面
        if ($_SESSION['level'] == 'admin') {
            header("Location: admin_dashboard.php");
        } elseif ($_SESSION['level'] == 'user') {
            header("Location: student_home.php");
        } elseif ($_SESSION['level'] == 'teacher') {
            header("Location: teacher_home.php");
        } else {
            // 如果角色不在這些範圍內，導回首頁
            header("Location: index.php");
        }
        exit(); // 終止腳本執行，避免後續的內容被顯示
    } else {
        // 登入失敗，顯示錯誤訊息
        echo "<center><h1>登入失敗，請確認帳號密碼!!</h1></center>";
        // 3秒後跳轉回登入頁面
        header("refresh:3;url=index.php");
    }
    // Step 5: 關閉資料庫連接
    $stmt->close();
    $link->close();
}
?>
 </body>
</html>