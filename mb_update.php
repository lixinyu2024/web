<!doctype html>
<html lang="en">
 <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google 字体 -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <!-- Bootstrap 样式 -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <!-- Font Awesome 图标 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </head>
 <body>
    <style>
        #level {
          width: 100%; /* 设置宽度为容器宽度 */
          max-width: 600px; /* 设置最大宽度 */
          margin: 0 auto; /* 居中 */
        }
        .spacing-between {
          margin-top: 20px; /* 调整间距大小 */
        }
      </style>
   <?php
   $id = $_GET['id'] ?? '';
   $link = mysqli_connect('localhost', 'root', '', 'school');
   $sql = "select distinct * from account where id='$id'";
   $result = mysqli_query($link, $sql);

   if ($row = mysqli_fetch_assoc($result)){
    //
    $password = $row['password'];
    $name = $row['name'];
    $level = $row['level'];
   }
  ?>

   <div class="container" style="max-width: 600px; margin-top: 50px;">
    <h2 class="text-center">修改會員</h2>
    
     <form action="mb_dblink.php" method="post">
     <input type="hidden" name="method" value="update">
      <div class="mb-3">
        <label for="id" class="form-label">會員編碼 (ID)</label>
        <input type="id" class="form-control"  name="id" value="<?php echo $id; ?>" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">會員密碼 (Password)</label>
        <input type="password" class="form-control"  name="password" value="<?php echo $password; ?>" required>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">會員姓名 (Name)</label>
        <input type="text" class="form-control"  name="name" value="<?php echo $name; ?>" required>
      </div>
      <div class="mb-3">
        <label for="level" class="form-label">會員級別 (Level)</label>
        <select class="form-select"  name="level" value="<?php echo $level; ?>" required>
          <option value="admin">管理者</option>
          <option value="teacher">教師</option>
          <option value="user">一般</option>
        </select>
      </div>
      <div class="text-center spacing-between">
        <button type="submit" class="btn btn-primary">提交</button>
        <button type="reset" class="btn btn-secondary">重設</button>
      </div>
     </form>
   </div>
 </body>
</html>
