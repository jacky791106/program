<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<center>
<head>
  <title>下載歷史結果</title>
  <link rel="stylesheet" type="text/css" href="css/result_style.css"></link>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css"></link>
</head>
<body>
  <div class="container">
    <form action="download_history_file_v.php" method="post">
      <p class="p">下載歷史結果</p>
      <div>
        <input type="submit" name="downloadfile_v" value="下載.v檔" class="btn_download_v"></BR></BR>
      </div>
    </form>
    <form action="download_history_file_sta1.php" method="post">
      <div>
        <input type="submit" name="downloadfile_sta1" value="下載.sta1檔" class="btn_download_sta1"></BR></BR>
      </div>
    </form>
    <form action="download_history_file_sta2.php" method="post">
      <div>
        <input type="submit" name="downloadfile_sta2" value="下載.sta2檔" class="btn_download_sta2"></BR></BR>
      </div>
    </form>
    <form action="mainpage.php" method=post>
      <div>
        <input type="submit" name="backhome" value="回到主畫面" class="btn_backhome"></BR></BR>
      </div>
    </form>
  </div>
</body>
</center>
</html>
