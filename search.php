<?php
  session_start();
  $user_name = $_SESSION['user_name'];
  mysql_connect('localhost','root','A3141121');
  mysql_select_db('login');
  mysql_set_charset('utf8');
  $result = mysql_query("select * from `users` where `user_name`= '$user_name'");
  while($row_result=@mysql_fetch_assoc($result))
  {
    $fold_name = $row_result["fold_name"];
    $_SESSION['fold_name'] = $fold_name;
  }

  $history_proj_name = $_POST['history_proj_name'];
  $_SESSION['history_proj_name'] = $history_proj_name;
  /*echo $fold_name;
  echo $proj_name;
  echo "./cloudstasim/$fold_name/$proj_name/result/";*/
  $searchfile = "./cloudstasim/$fold_name/$history_proj_name/result/";
  //echo "<BR/>下載".$proj_name."的結果檔";

  if(file_exists($searchfile)){
    echo '<script language="javascript">
    alert("即將開始下載資料！");
    window.location.replace("history_download.php");
    </script>';

  }
  else{
    echo '<script language="javascript">
    alert("查無資料，請重新輸入！");
    window.location.replace("history_result.php");
    </script>';
  }
?>
