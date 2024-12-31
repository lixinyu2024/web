<?php
session_start(); // 啟動 session

// 獲取使用者輸入
$account = $_POST['account'] ?? '';
$password = $_POST['password'] ?? '';

// 定義不同角色的假帳號和密碼
$users = [
    'student' => ['account' => 'student123', 'password' => 'studentpass', 'role' => 'general'],
    'teacher' => ['account' => 'teacher123', 'password' => 'teacherpass', 'role' => 'teacher'],
    'admin' => ['account' => 'admin123', 'password' => 'adminpass', 'role' => 'admin']
];

// 檢查使用者輸入的帳號和密碼
$loginSuccess = false;
foreach ($users as $user) {
    if ($account === $user['account'] && $password === $user['password']) {
        // 登入成功
        $_SESSION['loggedin'] = true;        // 設定登入狀態
        $_SESSION['user_id'] = $account;     // 儲存使用者帳號
        $_SESSION['role'] = $user['role'];   // 設定角色
        
        // 根據角色重定向
        switch ($user['role']) {
            case 'general':
                header("Location: student_home.php");
                break;
            case 'teacher':
                header("Location: teacher_home.php");
                break;
            case 'admin':
                header("Location: admin_dashboard.php");
                break;
        }
        $loginSuccess = true;
        exit;
    }
}

// 如果登入失敗，返回登入頁並顯示錯誤訊息
if (!$loginSuccess) {
    header("Location: login.php?msg=帳號密碼錯誤"); // 傳遞錯誤訊息
    exit;
}
?>
