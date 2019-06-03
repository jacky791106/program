<html>
<center>
<?php
session_start();
$fold_name=$_SESSION['fold_name'];
$proj_name=$_SESSION['proj_name'];
$file_jpg = $_SESSION['filename_jpg'];
$print_file_jpg="cloudstasim/$fold_name/$proj_name/result/$file_jpg";
echo "<img src=$file_jpg>";
?>
</center>
</html>

<html>
<center>
<head>
  <title>Delay Time</title>
  <link rel="stylesheet" type="text/css" href="css/drawps_style.css"></link>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css"></link>
</head>
<body>
  <form action="result.php" method="post">
    <div>
      <input type="submit" name="backresult" value="回到下載頁" class="btn_backresult"></BR></BR>
    </div>
  </form>
</body>
</center>
</html>
