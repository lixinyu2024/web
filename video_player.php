<?php
if (isset($_GET['file'])) {
    $file = urldecode($_GET['file']); // 確保檔案名稱正確解碼
    $file_path = './uploads/' . $file; // 假設影片存放在 ./uploads/ 資料夾中

    // 檢查影片檔案是否存在
    if (file_exists($file_path)) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>課程影片</title>
        </head>
        <body>
            <h1>正在播放: <?php echo htmlspecialchars($file); ?></h1>
            <video controls width="80%">
                <source src="<?php echo htmlspecialchars($file_path); ?>" type="video/mp4">
                您的瀏覽器不支援播放影片。
            </video>
        </body>
        </html>
        <?php
    } else {
        echo "<p>影片檔案不存在。</p>";
    }
} else {
    echo "<p>未提供影片檔案名稱。</p>";
}
?>
