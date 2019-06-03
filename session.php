<html>
<center>
<head>
  <title>認證中...</title>
  <link rel="stylesheet" type="text/css" href="css/session_style.css"></link>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css"></link>
</head>
<body>
  <p class="p">認證中</p>
</body>
</center>
</html>
<?php
     session_start();
?>

<?php
mysql_connect('localhost','root','A3141121');
mysql_select_db('login');
mysql_set_charset('utf8');

//include_once"include/tool.inc.php"

$user_name = $_POST['user_name'];
$user_passwd = $_POST['user_passwd'];
$time_start = time(true);
$name1 =  $_POST['name'];

$sql = "SELECT * FROM users where user_name = '$user_name'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

if($user_name != null && $user_passwd != null && $row[1] == $user_name && $row[2] == $user_passwd)
{

        $_SESSION['user_name'] = $user_name;
        $_SESSION['time_start']= $time_start;
        $_SESSION['proj_name']= $proj_name;
        $_SESSION['filename']= $filename;
        $_SESSION['filename2']= $filename2;
        $_SESSION['filename3']= $filename3;
        $_SESSION['filename_v']= $filename_v;
        $_SESSION['filename2_sta1']= $filename2_sta1;
        $_SESSION['filename2_sta2']= $filename2_sta2;
        $_SESSION['fold_name']= $fold_name;
        $_SESSION['id'] = $id;
        $_SESSION['queue_front'] = $queue_front;
        $_SESSION['queue_front1'] = $queue_front1;
        $_SESSION['history_proj_name'] = $history_proj_name;
        $_SESSION['file_sta2'] = $file_sta2;
        $_SESSION['file_sta1'] = $file_sta1;
        $_SESSION['file_v'] = $file_v;
        $_SESSION['filename_jpg']=$filename_jpg;


        if(file_exists(cloudstasim)){
          @mkdir(cloudstasim."/".$fold_name,0777);
          @mkdir(cloudstasim."/".$fold_name."/".accounting,0777);
          @mkdir(cloudstasim."/".$fold_name."/".$proj_name,0777);
          @mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".mt,0777);
          @mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".sta,0777);
          @mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".result,0777);
        }else{
          mkdir(cloudstasim,0777);
          mkdir(cloudstasim."/".$fold_name,0777);
          mkdir(cloudstasim."/".$fold_name."/".accounting,0777);
          mkdir(cloudstasim."/".$fold_name."/".$proj_name,0777);
          mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".mt,0777);
          mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".sta,0777);
          mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".result,0777);
        }

        echo '<script language="javascript">
        alert("登入成功");
        window.location.replace("mainpage.php");
        </script>';
}
else
{
        echo '<script language="javascript">
        alert("登入失敗");
        window.location.replace("login.html");
        </script>';
}
?>
