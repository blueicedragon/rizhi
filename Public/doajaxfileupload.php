<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
/*if($_SESSION['adminId']==""){
	echo json_encode(array('error'=>'没有管理权限','msg'=>$msg,'imgSize'=>$imgSize));
	exit;
}*/

function uploadfile($inputname)
{
	$attachdir='Upload';//上传文件保存路径，结尾不要带/
	$dirtype=1;//1:按天存入目录 2:按月存入目录 3:按扩展名存目录  建议使用按天存
	$maxattachsize=20971520;//最大上传大小，默认是2M
	$upext='jpg,jpeg,gif,png,rar,zip';//上传扩展名
	$error = "";
	$msg = "";
	
	$upfile=$_FILES[$inputname];
	if(!empty($upfile['error']))
	{
		switch($upfile['error'])
		{
			case '1':
				$error = '文件大小超过了php.ini定义的upload_max_filesize值';
				break;
			case '2':
				$error = '文件大小超过了HTML定义的MAX_FILE_SIZE值';
				break;
			case '3':
				$error = '文件上传不完全';
				break;
			case '4':
				$error = '无文件上传';
				break;
			case '6':
				$error = '缺少临时文件夹';
				break;
			case '7':
				$error = '写文件失败';
				break;
			case '8':
				$error = '上传被其它扩展中断';
				break;
			case '999':
			default:
				$error = '无有效错误代码';
		}
	}
	elseif(empty($upfile['tmp_name']) || $upfile['tmp_name'] == 'none')$error = '无文件上传';
	else
	{
			$temppath=$upfile['tmp_name'];
			$fileinfo=pathinfo($upfile['name']);
			$extension=$fileinfo['extension'];
			if(preg_match('/'.str_replace(',','|',$upext).'/i',$extension))
			{
				$filesize=filesize($temppath);
				if($filesize <= $maxattachsize)
				{
					switch($dirtype)
					{
						case 1: $attach_subdir = 'day_'.date('ymd'); break;
						case 2: $attach_subdir = 'month_'.date('ym'); break;
						case 3: $attach_subdir = 'ext_'.$extension; break;
					}
					$attach_dir = $attachdir.'/'.$attach_subdir;
					if(!is_dir($attach_dir))
					{
						@mkdir($attach_dir, 0777);
						@fclose(fopen($attach_dir.'/index.htm', 'w'));
					}
					PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
					$filename=date("YmdHis").mt_rand(1000,9999).'.'.$extension;
					$target = $attach_dir.'/'.$filename;

					$imgSize = @filesize($upfile['tmp_name']);
					
					move_uploaded_file($upfile['tmp_name'],$target);
					$msg=''.$target;
				}
				else $error='文件大小超过'.$maxattachsize.'字节';
			}
			else $error='上传文件扩展名必需为：'.$upext;

			@unlink("../".$temppath);
	}
	//require('./suolv.class.php');
	//thum($msg,400,300,'img_x.jpg');
	//require('./suolv1.class.php');
	//$thumbnail = new ImageResize();
	//$thumbnail->resizeimage($msg, 220, 165, 1, $msg.'m.jpg');
	return array('error'=>$error,'msg'=>$msg,'imgSize'=>$imgSize);

	
}

$state=uploadfile($_GET["name"]);
echo json_encode($state);

?>