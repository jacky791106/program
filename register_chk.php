<?php
$user_name=$_POST['user_name'];
$user_passwd=$_POST['user_passwd'];
$email=$_POST['email'];

mysql_connect('localhost','root','A3141121');
mysql_select_db('login');
mysql_set_charset('utf8');

include_once"include/tool.inc.php";
if($user_name!=null && $user_passwd!=null && $email!=null){
  $sql = "SELECT * FROM users where user_name = '$user_name'";
  $result = mysql_query($sql);
  $row = @mysql_fetch_row($result);
  if ( $row[1] == $user_name)
  {
    echo '<script language="javascript">
    alert("此帳號已註冊過，請重新輸入或直接登入");
    window.location.replace("register.html");
    </script>';
  }
  else{
    $str = "SELECT fold_name FROM users WHERE user_name = '$user_name'";
    $res = mysql_query($str);
    $num = mysql_num_rows($res);

    if($num>0)   {redir('register.html');}

    $str=
         "INSERT INTO users(".
         " user_name, user_passwd, email".
         ")values(".
         "'$user_name','$user_passwd','$email'".
         ")";
    $res=mysql_query($str);
    redir('register2.html');
  }
}
else{
  echo '<script language="javascript">
  alert("帳號或密碼或E-mail不得為空白");
  window.location.replace("register.html");
  </script>';
}

/*
$sql = "SELECT * FROM users where user_name = '$user_name'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);
if ( $row[1] == $user_name)
{
  echo '<script language="javascript">
  alert("帳號已有人使用,請重新輸入或直接登入");
  window.location.replace("register.html");
  </script>';
}

else if($user_name!=null && $user_passwd!=null && $email!=null){
  $str = "SELECT fold_name FROM users WHERE user_name = '$user_name'";
  $res = mysql_query($str);
  $num = mysql_num_rows($res);

  if($num>0)   {redir('register.html');}

  $str=
       "INSERT INTO users(".
       " user_name, user_passwd, email".
       ")values(".
       "'$user_name','$user_passwd','$email'".
       ")";
  $res=mysql_query($str);
  redir('register2.html');
}
else{
  echo '<script language="javascript">
  alert("帳號或密碼或E-mail不得為空白");
  window.location.replace("register.html");
  </script>';
}*/
?>
