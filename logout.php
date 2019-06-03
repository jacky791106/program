<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<center>
<head>
  <title>登出中...</title>
  <link rel="stylesheet" type="text/css" href="css/logout_style.css"></link>
</head>
<body>
  <p class="p">登出中...</p>
</body>
</center>
</html>
<?php
session_start();


$id = $_POST['id'];
$fold_name = $_SESSION['fold_name'];
$time_end = $_SESSION['time_end'];
$time_start = $_SESSION['time_start'];
$time_end = time(true);
$time = $time_end - $time_start;
echo "使用時間".$time."秒"."<BR/>";
//echo("cloudstasim/$user_name/accounting/$file_name");
$file_name = "time.txt"; //檔案名稱
  $file = @file("cloudstasim/$fold_name/accounting/$file_name"); //讀取檔案
  $open = @fopen("cloudstasim/$fold_name/accounting/$file_name","a+"); //開啟檔案，要是沒有檔案將建立一份

  @fwrite($open,"\r\n".$time."秒");
  fclose($open); //關閉檔案
  if(file_exists("cloudstasim/$fold_name/accounting")){
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
      }else{
         mkdir(cloudstasim."/".$fold_name."/".accounting,0777);
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
     }



$time=$_POST['time'];

$txtFile = fopen("C:/AppServ/www/cloudstasim/$fold_name/accounting/time.txt","r");
if ($txtFile)
{
  while (!feof($txtFile))
  {
      $time = fgets($txtFile);
      //echo $info;
      //echo "<br />";
  }

  fclose($txtFile);

  if(!($database = mysql_connect("localhost","root","A3141121"))){
  die("Can not connect database! <br />");
  }

  if(!mysql_select_db("count",$database)){
  die("Can not open course database! <br />");
  }
  // $info=$_POST['info'];

  $txtFile = fopen("C:/AppServ/www/cloudstasim/$fold_name/accounting/time.txt","r");
  if ($txtFile){
  while (!feof($txtFile))
        {
        $time_count = fgets($txtFile);
        }
        $str="INSERT INTO time (time_count) values ('$time_count')";
        $res=mysql_query($str);
  fclose($txtFile);
  }else{
  echo "error";
  }

}
unset($_SESSION['user_name']);
//echo '登出中......';
echo '<meta http-equiv=REFRESH CONTENT=1;url=login.html>';
?>
