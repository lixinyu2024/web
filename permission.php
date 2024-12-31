<?php
session_start();

// 模擬的帳號資料及其權限（無需數據庫）
if (!isset($_SESSION['accounts'])) {
    $_SESSION['accounts'] = [
        'user1' => '一般',
        'user2' => '教師',
        'user3' => '管理者'
    ];
}

// 更新權限
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['account']) && isset($_POST['role'])) {
    $account = $_POST['account'];
    $role = $_POST['role'];
    if (isset($_SESSION['accounts'][$account])) {
        $_SESSION['accounts'][$account] = $role;
        $message = "帳號 {$account} 的權限已更新為 {$role}。";
    } else {
        $message = "帳號不存在。";
    }
}

$roles = ['一般', '教師', '管理者'];
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>權限管理</title>
</head>
<body>
    <h1>權限管理</h1>
    
    <!-- 權限更新表單 -->
    <form method="POST">
        <label for="account">選擇帳號：</label>
        <select name="account" id="account">
            <?php foreach ($_SESSION['accounts'] as $account => $role): ?>
                <option value="<?php echo $account; ?>"><?php echo $account; ?></option>
            <?php endforeach; ?>
        </select>
        
        <label for="role">選擇權限：</label>
        <select name="role" id="role">
            <?php foreach ($roles as $role): ?>
                <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit">更新權限</button>
    </form>

    <!-- 更新訊息 -->
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <!-- 當前帳號權限顯示 -->
    <h2>當前帳號權限</h2>
    <ul>
        <?php foreach ($_SESSION['accounts'] as $account => $role): ?>
            <li><?php echo $account; ?>：<?php echo $role; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
