<html>
<center>
<head>
  <?php
    session_start();
    $user_name = $_SESSION['user_name'];
    echo "使用者名稱:".$user_name;
    echo "<BR/>歡迎使用本系統";
  ?>
  <title>下載歷史專案結果</title>
  <link rel="stylesheet" type="text/css" href="css/history_style.css"></link>
</head>
<body>
  <div class="container">
  <form action="search.php" enctype="multipart/form-data" method=post>
    <p class="p">下載歷史結果：</p>
    <div class="form-input">
      請輸入要下載之專案名稱:<input type="text" name="history_proj_name" placeholder="請輸入完整專案名稱"></BR>
    </div>
    <div>
      <input type="submit" value="提交" class="btn_gosearch">
    </div>
  </form>
<form action="mainpage.php" mrthod=post>
  <input type="submit" value="回上一頁" class="btn_goback">
</form>
</div>
</body>
</center>
</html>
