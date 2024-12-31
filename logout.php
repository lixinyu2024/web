<?php
session_start(); // 启动 session
session_destroy(); // 清除 session
header("Location: index.php"); // 重定向到首页
exit;
?>
