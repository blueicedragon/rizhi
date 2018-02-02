<?php
header("Content-Type: text/html; charset=UTF-8");
//循环删除目录和文件函数
function delDirAndFile( $dirName ){
	if($handle = opendir( "$dirName" )){
	   while (false !== ( $item = readdir( $handle ) ) ) {
		   if ( $item != "." && $item != ".." ) {
			   if (is_dir( "$dirName/$item" ) ){
					delDirAndFile( "$dirName/$item" );
			   }
				else{
					if( unlink( "$dirName/$item" ) )echo "成功删除文件： $dirName/$item<br />\n";
				}
		   }
	   }
	  
	}
}
delDirAndFile( './Runtime');

$myfile = fopen("./Runtime/index.html", "a+") or die("Unable to open file!");
fwrite($myfile, "禁止访问");
fclose($myfile);
echo ('清理完毕！');//做模板语言

?>
