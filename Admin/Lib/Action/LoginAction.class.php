<?php
class LoginAction extends Action {

    public function browser(){
        $this->display('v20/Tpl/Login/browser');
    }

    /**登录页面**/
    public function index(){
		if(!isset($_SESSION['adminInfo'])){
            $this->display('v20/Tpl/Login/index');
		}else{
			redirect('./index.php?&m=Index&a=index');
		}
	}

    /**登录验证**/
	public function checkLogin(){
		
		if(!$_POST){
			$this->error('非法提交');
		}
		$admin	=	M("user");
		if(isset($_SESSION['adminInfo'])){
            redirect('./index.php?&m=Index&a=index');
		}
		
		//日志方式
        function login_log($action, $name)
        {
            $loginlog = M("log_login");
            $data['loginIp'] = $_SERVER['REMOTE_ADDR'];
            $data['loginDate'] = time();
            $data['loginName'] = $name;
            $data['loginStatus'] = $action;

            $loginlog_info = $loginlog->add($data);

            return $data;
        }

        if (empty($_POST['name'])) {
			$this->error(L('Login_name_Cannot_none'));
			exit();
		}elseif (empty($_POST['password'])){
			$this->error(L('Login_password_Cannot_none！'));
			exit();
		}else{//如果都填写了
			import("@.ORG.Verify");
			$verify = new Verify();
       		$name = I("post.name");
			$Verify_name = $verify->isNames($name); //验证传递过来用户名合法性
			if($Verify_name == false)$this->error('用户名不合法');
			//第2步验证该用户名是否存在
			
			//传条件
			$condition['username']	=	array('eq',$name);

            //取出符合用户名参数
			$adminInfo = $admin->where($condition)->field()->find();

			if(!$adminInfo){
				login_log(1,$_POST['name']);
				
				$this->error(L('Login_name_Error'));
				
				exit();
				}
			//查看是否限制使用
			
			
			//第3步对该用户及密码进行验证，验证密码是否正确
			$password = MD5(trim($_POST['password']));
			
			if($adminInfo['password'] != $password) {
				login_log(2,$_POST['name']);
            	$this->error(L('Login_password_Error'));
				exit();
            }
			
			$session_id = session_id();
			
			//记录登录日期等资料
			//条件
			$ipdata = login_log(3,$_POST['name']);

			$condition['id'] = $adminInfo['id'];//取出当前登录用户id
			//更新数据
			$data['lastlogin_ip'] = $_SERVER['REMOTE_ADDR'];//更新IP
			$data['logins']  = $adminInfo['logins']+1;//更新登录次数
			$data['oldlogintime'] = $adminInfo['lastlogintime']; //记录上次登录时间
			$data['oldlogin_ip'] = $adminInfo['lastlogin_ip'];//上次登录ip
			$data['lastlogintime'] =time();//更新最后登录时间
			$data['session_id'] = $session_id;
			$admin->where($condition)->data($data)->save();
			
			//写入SESSION
			$_SESSION['adminInfo']["adminId"] = $adminInfo['id'];
			$_SESSION['adminInfo']["admin_name"] = $adminInfo['name'];
			//SESSION信息写入数据库
			
			$this->success(L('Login_success'));
		}
	}

    /**退出登录**/
    public function logout(){
		if(isset($_SESSION['adminInfo'])){
			$admin = M ('user');
			$adminInfo = $admin->where('id= '.$_SESSION['adminInfo']['adminId'])->field()->find();

			$admin_session = M ('admin_session');
            $admin_session->where('session_id = '.$adminInfo['session_id'])->delete();
			unset($_SESSION['adminInfo']);
		
			$this->assign("jumpUrl",U('Login/index'));
        	$this->success(L('Logout_success'));
        }else {  
			$this->assign('jumpUrl',U('Login/index'));
			$this->error(L('Logout_lose'));
        }
    }
}