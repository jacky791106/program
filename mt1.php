<html>
<center>
<head>
  <title>執行中...</title>
  <link rel="stylesheet" type="text/css" href="css/mt_style.css"></link>
</head>
<body>
  <p class="p">執行中 請稍等</p>



<?php
session_start();
$name_session = $_SESSION['name'];
$user_name = $_SESSION['user_name'];
$fold_name = $_SESSION['fold_name'];
$proj_name = $_SESSION['proj_name'];
$filename = $_SESSION['filename'];
$id = $_POST['id'];
$filename_v = explode(".", $filename)[0] .".v";
$_SESSION['filename_v'] = $filename_v;

$file_name = $proj_name."_mt".".bat";

$open = @fopen("mt/$file_name","w+");
@fwrite($open,"cd C:\AppServ\www\mt"."\r\n"."mt.exe  ".$filename."\r\n"."pause");
  fclose($open);
  if(file_exists("mt")){
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
      }else{
         mkdir(mt,0777);
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
     }

//exec("cmd /c C:\AppServ\www\mt/".$file_name);

shell_exec('C:\AppServ\www\mt/'.$file_name);

copy("C:\AppServ\www\mt/".$filename_v, "cloudstasim/$fold_name/$proj_name/result/".$filename_v);

echo"MT執行成功";
echo"<BR/>即將執行SMAIN";


if(file_exists("result")){
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
      }else{
         mkdir(result,0777);
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
     }

copy("C:\AppServ\www\mt/".$filename_v, "cloudstasim/$fold_name/$proj_name/result/".$filename_v);
copy("C:\AppServ\www\mt/".$filename_v, "C:\AppServ\www\smain/".$filename_v);
copy("C:\AppServ\www\mt/".$filename_v, "C:\AppServ\www\wp/".$filename_v);


mysql_connect('localhost','root','A3141121');
mysql_select_db('count');
mysql_set_charset('utf8');


session_start();
//$user_name =$_SESSION['user_name'];
$user_name =$_POST['user_name'];
$name = "Project ".$_POST['name'];
$file_name = "mt_count.txt";
$file = @file("cloudstasim/$fold_name/accounting/$file_name");
$open = @fopen("cloudstasim/$fold_name/accounting/$file_name","w+");

@fwrite($open,$file[0]+1);
fclose($open);
echo "<BR/>執行次數：";
echo @$file[0]+1;
echo "次<BR/>";


$mt_count=$_POST['mt_count'];

$txtFile = fopen("C:/AppServ/www/cloudstasim/$fold_name/accounting/mt_count.txt","r");
if ($txtFile)
{
  while (!feof($txtFile))
  {
      $mt_count = fgets($txtFile);
  }

  fclose($txtFile);

  if(!($database = mysql_connect("localhost","root","A3141121"))){
  die("Can not connect database! <br />");
  }

  if(!mysql_select_db("count",$database)){
  die("Can not open course database! <br />");
  }

  $txtFile = fopen("C:/AppServ/www/cloudstasim/$fold_name/accounting/mt_count.txt","r");
  if ($txtFile){
  while (!feof($txtFile))
        {
  $mt_count = fgets($txtFile);
  $str="INSERT INTO mt (mt_count) values ('$mt_count')";
  $res=mysql_query($str);
        }
  fclose($txtFile);
  }else{
  echo "error";
  }
}
if(file_exists("cloudstasim/$fold_name/accounting")){
  //copy($file,"cloudstasim/$user_name/accounting/".$file);
}else{
  mkdir(cloudstasim."/".$fold_name."/".accounting,0777);
  //copy($file,"cloudstasim/$fold_name/accounting/".$file);
}



?>
<?php
  echo "<form id=\"form1\" method=\"post\" action=\"smain.php\" hidden>";
  echo "<input type=\"text\" value=\"$id\" name=\"id\">";
  echo "<input type=\"submit\">";
  echo "</form>";
  echo "<script type=\"text/javascript\">form1.submit();</script>";

?>


</body>
</center>
</html>
