<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<center>
<head>
  <title>下載執行結果</title>
  <link rel="stylesheet" type="text/css" href="css/result_style.css"></link>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css"></link>
</head>
<body>
  <div class="container">
    <form action="downloadfile_v.php" method="post">
      <p class="p">下載執行結果</p>
      <div>
        <input type="submit" name="downloadfile_v" value="下載.v檔" class="btn_download_v"></BR></BR>
      </div>
    </form>
    <form action="downloadfile_sta1.php" method="post">
      <div>
        <input type="submit" name="downloadfile_sta1" value="下載.sta1檔" class="btn_download_sta1"></BR></BR>
      </div>
    </form>
    <form action="downloadfile_sta2.php" method="post">
      <div>
        <input type="submit" name="downloadfile_sta2" value="下載.sta2檔" class="btn_download_sta2"></BR></BR>
      </div>
    </form>
    <form action="wp.php" method=post>
      <div>
        <input type="submit" name="wp" value="產生.ps檔並下載" class="btn_download_ps"></BR></BR>
      </div>
    </form>
    <form action="drawps.php" method=post>
      <div>
        <input type="submit" name="drawps" value="查看波形圖(請先執行上方的產生.ps檔)" class="btn_drawps"></BR></BR>
      </div>
    </form>
    <form action="staproject.php" method=post>
      <div>
        <input type="submit" name="backhome" value="回到主畫面" class="btn_backhome"></BR></BR>
      </div>
    </form>
  </div>
</body>
</center>
</html>
