<html>
<center>
<head>
  <title>上傳中...</title>
  <link rel="stylesheet" type="text/css" href="css/sta1_style.css"></link>
</head>
<body>
  <p class="p">上傳中</p>


<?php
     session_start();
?>

<?php

  $ckt = $_POST['ckt'];
  $command = $_POST['command'];
  $user_name = $_SESSION['user_name'];
  $proj_name =$_POST['proj_name'];


  $filename = $_FILES["ckt"]["name"];

  $_SESSION['filename']= $filename;

  mysql_connect('localhost','root','A3141121');
  mysql_select_db('login');
  mysql_set_charset('utf8');

  include_once"include/tool.inc.php";
  $result = mysql_query("select * from `users` where `user_name`= '$user_name'");
  while($row_result=@mysql_fetch_assoc($result))
  {
     $fold_name = $row_result["fold_name"];
     $_SESSION['fold_name'] = $fold_name;
  }

  $fold_name=$_SESSION['fold_name'];

  if($proj_name!=null && $_FILES['ckt']['error'] === UPLOAD_ERR_OK)
  {

    $proj_name = "Project ".$_POST['proj_name'];
    $_SESSION['proj_name']= $proj_name;
    $proj_dir = "./cloudstasim/$fold_name/$proj_name";

    if(is_dir($proj_dir))
		{
      echo '<script language="javascript">
      alert("專案名稱已存在，請重新輸入！");
      window.location.replace("staproject.php");
      </script>';
		}else{


         echo "STAPROJECT： ".$proj_name."<HR/>";
         if(isset($_FILES["ckt"]))
         {
            echo"上傳檔案資訊：<BR/>";
            echo"檔案名稱：".$_FILES["ckt"]["name"]."<BR/>";
            echo"暫存檔名：".$_FILES["ckt"]["tmp_name"]."<BR/>";
            echo"檔案大小：".$_FILES["ckt"]["size"]."<BR/>";
            echo"檔案類型：".$_FILES["ckt"]["type"]."<BR/><HR/>";

            echo"MT檔上傳成功<BR/>";

            if(file_exists(cloudstasim))
            {
               @mkdir(cloudstasim."/".$fold_name,0777);
               @mkdir(cloudstasim."/".$fold_name."/".$proj_name,0777);
               @mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".mt,0777);
               @mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".result,0777);
               //copy($_FILES["ckt"]["tmp_name"][$i],"cloudstasim/$fold_name/$name_session/mt/".$_FILES["ckt"]["name"][$i]);
               //move_uploaded_file($_FILES["ckt"]["tmp_name"][$i],"cloudstasim/$user_name/".$name."/mt/".$_FILES["ckt"]["name"][$i]);
            }
            else
            {
               mkdir(cloudstasim,0777);
               mkdir(cloudstasim."/".$fold_name,0777);
               mkdir(cloudstasim."/".$fold_name."/".$proj_name,0777);
               mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".mt,0777);
               mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".result,0777);
               //move_uploaded_file($_FILES["ckt"]["tmp_name"][$i],"cloudstasim/$user_name/".$name."/mt/".$_FILES["ckt"]["name"][$i]);
            }
          }

         $filename = $_FILES["ckt"]["tmp_name"];
         $str = "";
         if(file_exists($filename))
         {
            $file = fopen($filename, "r");
            if($file != NULL)
            {
               while (!feof($file))
               {
                  $str .= fgets($file);
               }
               fclose($file);
            }
         }

         $str2=$_FILES["ckt"]["tmp_name"];
         $file = fopen($str2,"a+");
         fclose($file);
         copy ($_FILES["ckt"]["tmp_name"],"cloudstasim/$fold_name/".$proj_name."/mt/".$_FILES["ckt"]["name"]);
         copy ("cloudstasim/$fold_name/".$proj_name."/mt/".$_FILES["ckt"]["name"],"C:\Appserv\www\mt/".$_FILES["ckt"]["name"]);
         @copy ($_FILES["ckt"]["tmp_name"],"cloudstasim/$fold_name/".$proj_name."/smain/".$_FILES["ckt"]["name"]);

         if($_FILES['command']['error'] === UPLOAD_ERR_OK)
         {
           echo "STAPROJECT： ".$proj_name."<HR/>";
           //$fold_name = $_SESSION['fold_name'];
           if(isset($_FILES["command"]))
           {
             echo"上傳檔案資訊：<BR/>";
             echo"檔案名稱：".$_FILES["command"]["name"]."<BR/>";
             echo"暫存檔名：".$_FILES["command"]["tmp_name"]."<BR/>";
             echo"檔案大小：".$_FILES["command"]["size"]."<BR/>";
             echo"檔案類型：".$_FILES["command"]["type"]."<BR/><HR/>";

             echo"inpfile上傳成功<BR/>";
             if(file_exists(cloudstasim))
             {
               @mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".sta,0777);
               //move_uploaded_file($_FILES["command"]["tmp_name"][$i],"cloudstasim/$user_name/".$name."/sta/".$_FILES["command"]["name"][$i]);
             }
             else
             {
               mkdir(cloudstasim,0777);
               mkdir(cloudstasim."/".$fold_name,0777);
               mkdir(cloudstasim."/".$fold_name."/".$proj_name,0777);
               mkdir(cloudstasim."/".$fold_name."/".$proj_name."/".sta,0777);
               //move_uploaded_file($_FILES["command"]["tmp_name"][$i],"cloudstasim/$user_name/".$name."/sta/".$_FILES["command"]["name"][$i]);
             }
           }
           $filename2 = $_FILES["command"]["tmp_name"];
           $str = "";
           if(file_exists($filename2))
           {
             $file = fopen($filename2, "r");
             if($file != NULL)
             {
                while (!feof($file))
                {
                    $str .= fgets($file);
                }
                fclose($file);
             }
           }

           $str3=$_FILES["command"]["tmp_name"];
           $file = fopen($str3,"a+");
           fclose($file);
           copy ($_FILES["command"]["tmp_name"],"cloudstasim/$fold_name/".$proj_name."/sta/".$_FILES["command"]["name"]);
           copy ("cloudstasim/$fold_name/".$proj_name."/sta/".$_FILES["command"]["name"],"C:\Appserv\www\smain/".$_FILES["command"]["name"]);

           echo "轉址中....請稍後";
           echo '<meta http-equiv=REFRESH CONTENT=5;url=check.php>';
         }
      }
    }
    else
    {
      echo '<script language="javascript">
      alert("資訊未填寫完整，請重新填寫！");
      window.location.replace("staproject.php");
      </script>';
    }


?>

</body>
</center>
</html>
