<?php
class LogAction extends CommonAction {
	
	public $title_name;
	
	function __construct() { 
		parent::__construct(); 
		$title_name ='日志';
		$this->title_name = $title_name;
		$this->assign('title_name',$title_name);
		$this->assign('Left_m','./Tpl/Datas/left.html');	
	}

    /**日志首页**/
	public function index(){
		$this->assign("top_nav",'log');///主导航
		//侧导航
        $this->display();
    }

    /**登录日志**/
    public function log_login(){
		$log_login = M('log_login');
		import("@.ORG.Page"); //导入分页类
		
		//设定默认多少条记录分页
		$PageNum= $_REQUEST['num'] > 0 ? $_REQUEST['num'] : 20;
		$this->assign("num",$PageNum);

        if (!empty($_REQUEST['starttime'])&&!empty($_REQUEST['endtime'])) {
            $t1 = strtotime($_REQUEST['starttime']);
            $t2 = strtotime($_REQUEST['endtime']);
            $data['loginDate'] = array(array('egt', $t1),array('elt', $t2),'and');
        }
		if(!empty($_REQUEST['name'])){
            $data['loginName'] = array('like', "%".$_REQUEST['name']."%");
		}
        if(!empty($_REQUEST['ip'])){
            $data['loginIp'] = array('like', "%".$_REQUEST['ip']."%");
        }
        $arr['name']=$_REQUEST['name'];
        $arr['ip']=$_REQUEST['ip'];
        $arr["starttime"]=$_REQUEST['starttime'];
        $arr["endtime"]=$_REQUEST['endtime'];
        $this->assign( "arr", $arr );
		$count = $log_login->where($data)->count();
	    $p =	new Page ( $count,$PageNum);
		$log_login_info = $log_login->where($data)->order('id desc')->limit($p->firstRow.','.$p->listRows)->select();
		
		$this->assign('list',$log_login_info);
		//echo "<pre>";var_dump($log_login_info);exit();
	
		$page = $p->show ();
		$this->assign( "page", $page );//分页
		$this->assign( "count", $count );
		
		$this->assign("top_nav",'log');///主导航
		$this->assign("left_nav",'log_login');///主导航//侧导航
        $this->display("v20/Tpl/Log/log_login");
    }

    /**登录日志删除**/
	public function log_login_del(){
		$data = $_REQUEST['did'] ? $_REQUEST['did'] : $_REQUEST['id'];
		$log_login = M('log_login');
		$del = $log_login->delete($data);
		if ($del) {
			$count = $log_login->count();
			if($count < 1){
			    $log_login->query('TRUNCATE TABLE '.C('DB_PREFIX').'log_login');
			}
            $this->success('删除成功');
        }
        else {
            $this->error('删除失败');
        }
	}

    /**操作日志列表**/
	public function log_action(){
		$log_action = M('log_action');
		import("@.ORG.Page"); //导入分页类

		//设定默认多少条记录分页
		$PageNum= $_REQUEST['num'] > 0 ? $_REQUEST['num'] : 20;
		$this->assign("num",$PageNum);

        if (!empty($_REQUEST['starttime'])&&!empty($_REQUEST['endtime'])) {
            $t1 = strtotime($_REQUEST['starttime']);
            $t2 = strtotime($_REQUEST['endtime']);
            $data['loginDate'] = array(array('egt', $t1),array('elt', $t2),'and');
        }
        if(!empty($_REQUEST['name'])){
            $data['loginName'] = array('like', "%".$_REQUEST['name']."%");
        }
        if(!empty($_REQUEST['ip'])){
            $data['loginIp'] = array('like', "%".$_REQUEST['ip']."%");
        }
        $arr['name']=$_REQUEST['name'];
        $arr["starttime"]=$_REQUEST['starttime'];
        $arr["endtime"]=$_REQUEST['endtime'];
        $this->assign( "arr", $arr );
		
		$count = $log_action->where($data)->count();
	    $p =	new Page ( $count, $PageNum );
		
		$log_action_info = $log_action->where($data)->order('id desc')->limit($p->firstRow.','.$p->listRows)->select();
		$this->assign('list',$log_action_info);
	
		$page = $p->show ();
		$this->assign( "page", $page );//分页
		$this->assign( "count", $count );
		$this->assign("top_nav",'log');///主导航
		$this->assign("left_nav",'log_action');///主导航//侧导航
        $this->display("v20/Tpl/Log/log_action");
    }

    /**删除操作日志**/
    public function log_action_del(){
		$data = $_REQUEST['did'] ? $_REQUEST['did'] : $_REQUEST['id'];
		$log_action = M('log_action');
		$del = $log_action->delete($data);
		if($del){
			$count = $log_action->count();
			if($count < 1){
				$log_action->query('TRUNCATE TABLE '.C('DB_PREFIX').'log_action');
			}
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	
		
	}

    /**清除3个月前操作日志**/
	function clear()
	{
		$model=M('login');
		$bool=$model->where(array('time'=>array('lt',strtotime("-3 month"))))->delete();
		if($bool!==false)
		{
			$this->success('清除三个月前的日志成功！');
		}
		else
		{
			$this->success('清除三个月前的日志失败！');
		}
	}
}