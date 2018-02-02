<?php
class IndexAction extends CommonAction {
	
	public $title_name;
	
	function __construct(){
		parent::__construct(); 
		$title_name ='配置';
		$this->title_name = $title_name;
		$this->assign('title_name',$title_name);
		$this->assign('Left_m','./Tpl/v20/Tpl/Index/left.html');
 	}

    /**后台首页**/
	public function index(){

        //$Public = A("Public");
        //$Public->log_action_data('1', '管理员首页', '加载成功'); //
        $this->display('v20/Tpl/Index/index');
    }

    /**清理缓存**/
	public function cache(){	
		////前台用ajax get方式进行提交的，这里是先判断一下
        $Public = A("Public");
        $Public->log_action_data('1', '缓存信息', '清理成功'); //

        $data[] = RUNTIME_PATH;
		$data[] = RUNTIME_PATH.'Cache/';
		$data[] = RUNTIME_PATH.'Data/';
		$data[] = RUNTIME_PATH.'Logs/';
		$data[] = RUNTIME_PATH.'Temp/';
	
		$runtime= RUNTIME_PATH.'~runtime.php';
		if(file_exists($runtime))//判断 文件是否存在
		{
		 unlink($runtime);//进行文件删除
		}
		
		foreach($data as $value) {
			$this->rmFile($value); 
		}
	   	//给出提示信息
	   	$this->ajaxReturn(1,'清除成功',1);

    }

    /**删除缓存文件**/
	public function rmFile($cachedir){//删除执行的方法
		 if($dh = opendir($cachedir)){//打开Cache文件夹;
			while(($file = readdir($dh))!==false){//遍历Cache目录,
				unlink($cachedir.$file);//删除遍历到的每一个文件;
			}
			closedir($dh);
		}
	}

	
}