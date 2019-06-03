<html>
<center>
<head>
  <?php
    session_start();
    $user_name = $_SESSION['user_name'];
    echo "使用者名稱:".$user_name;
    echo "<BR/>歡迎使用本系統";
  ?>
  <title>統計模擬</title>
  <link rel="stylesheet" type="text/css" href="css/sta_style.css"></link>
</head>
<body>
  <div class="container">
  <form action="staproject1.php" enctype="multipart/form-data" method=post>
    <p class="p">統計模擬：</p>
    <div class="form-input">
      Project Name:<input type="text" name="proj_name" placeholder="請輸入專案名稱"></BR>
      CKT File(請選擇.mt檔):<input type="file" name="ckt"></BR></BR>
      Command File(請選擇inpfile):<input type="file" name="command"></BR></BR>
    </div>
    <div>
      <input type="submit" value="提交" class="btn_go">
    </div>
  </form>
  <form action="mainpage.php" method=post>
    <input type="submit" value="回上一頁" class="btn_goback">
  </form>
  <form action="logout.php" method=post>
    <input type="submit" value="登出" class="btn_logout">
  </form>
  </div>
</body>
</center>
</html>
