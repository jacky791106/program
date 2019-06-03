<html>
<center>
<head>
  <title>執行中...</title>
  <link rel="stylesheet" type="text/css" href="css/smain_style.css"></link>
</head>
<body>


<?php
ini_set('max_execution_time', '0');
set_time_limit(0);
session_start();
$name_session=$_SESSION['name'];
$name = "Project ".$_SESSION['name'];
$user_name = $_SESSION['user_name'];
$fold_name = $_SESSION['fold_name'];
$proj_name = $_SESSION['proj_name'];
$_SESSION['filename1']= $filename3;
$id = $_POST['id'];
$filename2 = $_SESSION['filename'];
$filename2_sta1 = explode(".", $filename2)[0] .".sta1";
$_SESSION['filename2_sta1'] = $filename2_sta1;
$filename2_sta2 = explode(".", $filename2)[0] .".sta2";
$_SESSION['filename2_sta2'] = $filename2_sta2;





$file_name1 = $proj_name."_smain".".bat"; //檔案名稱
  //$file = @file("mt/$file_name"); //讀取檔案
  $open = @fopen("smain/$file_name1","w+"); //開啟檔案，要是沒有檔案將建立一份

  @fwrite($open,"cd C:\AppServ\www\smain"."\r\n"."smain.exe  "."pause");
  fclose($open);
  if(file_exists("smain")){
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
    }else{
         mkdir(smain,0777);
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
    }

//exec("cmd /c C:\AppServ\www\smain/".$file_name1);
shell_exec('C:\AppServ\www\smain/'.$file_name1);

copy("C:\AppServ\www\smain/".$filename2_sta1, "cloudstasim/$fold_name/$proj_name/result/$filename2_sta1");
copy("C:\AppServ\www\smain/".$filename2_sta2, "cloudstasim/$fold_name/$proj_name/result/$filename2_sta2");


echo"SMAIN執行成功";


if(file_exists("result")){
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
    }else{
       mkdir(result,0777);
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
  }


?>

<?php
session_start();
  $user_name = $_SESSION['user_name'];
  $fold_name = $_SESSION['fold_name'];
  $proj_name = $_SESSION['proj_name'];
  //$name = "Project ".$_POST['name'];
  $file_name = "smain_count.txt";
  $file = @file("cloudstasim/$fold_name/accounting/$file_name");
  $open = @fopen("cloudstasim/$fold_name/accounting/$file_name","w+");

  @fwrite($open,$file[0]+1);
  fclose($open);
  echo "<BR/>執行次數：";
  echo @$file[0]+1;
  echo "次<BR/>";
  if(file_exists("cloudstasim/$fold_name/accounting")){
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
      }else{
         mkdir(cloudstasim."/".$fold_name."/".accounting,0777);
         //copy($file,"cloudstasim/$user_name/accounting/".$file);
     }

$smain_count=$_POST['smain_count'];

$txtFile = fopen("C:/AppServ/www/cloudstasim/$fold_name/accounting/smain_count.txt","r");
if ($txtFile)
{
  while (!feof($txtFile))
  {
      $smain_count = fgets($txtFile);
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

  $txtFile = fopen("C:/AppServ/www/cloudstasim/$fold_name/accounting/smain_count.txt","r");
  if ($txtFile){
  while (!feof($txtFile))
        {
  $smain_count = fgets($txtFile);
  $str="INSERT INTO smain (smain_count) values ('$smain_count')";
  $res=mysql_query($str);
        }
  fclose($txtFile);
  }else{
  echo "error";
  }

}





?>
<?php
mysql_connect('localhost','root','A3141121');
mysql_select_db('login');
mysql_set_charset('utf8');

$str = "DELETE FROM qu WHERE id = '$id';";
$res = mysql_query($str);
?>
<meta http-equiv=REFRESH CONTENT=3;url=result.php>

</body>
</center>
</html>
