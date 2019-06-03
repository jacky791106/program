<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<center>
<head>
  <?php
    session_start();
    $user_name = $_SESSION['user_name'];
    echo "使用者名稱:".$user_name;
    echo "<BR/>歡迎使用本系統";
  ?>
  <title>請選擇服務項目</title>
  <link rel="stylesheet" type="text/css" href="css/mainpage_style.css"></link>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css"></link>
</head>
<body>
  <div class="container">
    <form action="staproject.php" method="post">
      <p class="p">請選擇服務項目</p>
      <div>
        <input type="submit" name="gostaproject" value="執行統計模擬" class="btn_gostaproject"></BR></BR>
      </div>
    </form>
    <form action="history_result.php" method="post">
      <div>
        <input type="submit" name="download_history_result" value="下載歷史結果檔" class="btn_download_history_result"></BR></BR>
      </div>
    </form>
    <form action="logout.php" mrthod=post>
      <input type="submit" value="登出" class="btn_logout">
    </form>
  </div>
</body>
</center>
</html>
