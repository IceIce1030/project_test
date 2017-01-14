<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
</head>
<body>
<?php
switch( $_FILES["upFile"]["error"]){
	case 0:

		$from = $_FILES["upFile"]["tmp_name"];
		//檢查資料夾或檔案是否存在
		if( file_exists("images")==false){ //不存在
			//建立資料夾 make directory
	        mkdir("images");
		}
        //原始檔名(utf-8)
        $fileName = $_FILES["upFile"]["name"];

        //設定好資料夾,並轉碼為big5
		$to = "images/". mb_convert_encoding($fileName, "Big5","UTF-8");
		
		if(copy( $from, $to) ){
			echo "上傳成功<br>";
		}else{
			echo "error<br>";
		}
		break;
	case 1:
	    echo "檔案不得超過", ini_get("upload_max_filesize") ,"<br>";
		break;
	case 2:
		echo "檔案不得超過", $_REQUEST["MAX_FILE_SIZE"] ,"<br>";
		break;
	case 3:
		echo "上傳檔案不完整<br>";
		break;
	case 4:
	    echo "檔案没送<br>";
	     break;
	default : 
	    echo "錯誤代碼:" , $_FILES["upFile"]["error"],"請通知系統人員<br>";
	     break;

}



// echo "<hr>";
// echo "error : " , $_FILES["upFile"]["error"] , "<br>";
// echo "name : " , $_FILES["upFile"]["name"] , "<br>";
// echo "tmp_name : " , $_FILES["upFile"]["tmp_name"] , "<br>";
// echo "type : " , $_FILES["upFile"]["type"] , "<br>";
// echo "size : " , $_FILES["upFile"]["size"] , "<br>";
?>    
</body>
</html>