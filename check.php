<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<center>
  <head>
    <title>排隊中...</title>

    <link rel="stylesheet" type="text/css" href="css/check_style.css"></link>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css"></link>
  </head>
<body>
  <p class="p">執行中 請稍等</p>

<?php

  session_start();
  $user_name = $_SESSION['user_name'];
  $fold_name = $_SESSION['fold_name'];
  $proj_name = $_SESSION['proj_name'];

  //echo $file;
  mysql_connect('localhost','root','A3141121');
  mysql_select_db('login');
  mysql_set_charset('utf8');

  $sql = "SELECT * FROM qu ORDER BY id DESC limit 1";
  $result = mysql_query($sql);
  $row = @mysql_fetch_row($result);
  if($row[0]==null)
  {
    $num=1;
    $sql = "INSERT INTO qu VALUES ('$num','$user_name','$proj_name')";
    if($result = mysql_query($sql))
    {
      echo "執行中...";
      echo "<form id=\"form1\" method=\"post\" action=\"mt1.php\" hidden>";
      //echo "<input type=\"text\" value=\"$proj_name\" name=\"proj_name\">";
      echo "<input type=\"text\" value=\"$num\" name=\"id\">";
      //echo "<input type=\"text\" value=\"$user_name\" name=\"user_name\">";
      echo "<input type=\"submit\">";
      echo "</form>";
      echo "<script type=\"text/javascript\">form1.submit();</script>";
      ?>
      <script event="onbeforeunload" for="window">
　    if(event.clientX > document.body.clientWidth)
　     {
　　    if (confirm("Are You Sure?"))
　　    {
　　　   ///**按了確定作的事情**///
　　    }
　　    else
　　    {
      ///**按了取消作的事情**///
　　　   event.returnValue=false;
　　   }
　    }
      </script>
      <?php
      exit;
    }
    else
    {
      GOTO error;
    }

  }
  else
  {
    $num=$row[0];
    error:
    $num++;
    $sql = "INSERT INTO qu VALUES ('$num','$user_name','$proj_name')";
    if($result = mysql_query($sql))
    {
      echo "<input type='text' id='num' value='$num' hidden>";
      echo "<form id=\"form1\" method=\"post\" action=\"mt1.php\" hidden>";
      //echo "<input type=\"text\" value=\"$proj_name\" name=\"proj_name\">";
      echo "<input type=\"text\" value=\"$num\" name=\"id\">";//排隊編號 不可刪
      //echo "<input type=\"text\" value=\"$user_name\" name=\"user_name\">";
      echo "<input type=\"submit\">";
      echo "</form>";
      echo "<label id='state'>排隊中...</label><br>";
      echo "您的號碼牌為 $num 號.<br>";
      echo "現在正在執行 <label id='number'></label>號 請稍候...";
      ?>
        <iframe src='qu.php' width='500px' height='500px' frameborder='0' scrolling='auto' hidden>

        </iframe>
      <?php
    }
    else
    {
      GOTO error;
    }
  }
//}
?>

</body>
</center>
</html>
