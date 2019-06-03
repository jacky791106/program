<?php
  ini_set('max_execution_time', '0');
	    function getmicrotime()
	    {
	        list($usec, $sec) = explode(" ",microtime());
	        return ($usec + $sec);
	    }

	    //例子

	    //開始
	    $time_start = getmicrotime();
	    shell_exec('C:\Users\LAB805\Desktop\test0622\alu8\smain.bat');
	    //這裡放你的代碼

	    //結束
	    $time_end = getmicrotime();
	    $time = $time_end - $time_start;


      echo "有使用平行運算的時間"."<BR>";
      echo "遠端電腦加本機電腦共4台電腦同時進行運算"."<BR>";
	    echo "程式執行時間一共 $time 秒鐘"; //輸出總運行時間
	?>
