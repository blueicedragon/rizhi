<?php
class UserAction extends CommonAction {
	
	public $title_name;
	   
    function __construct() { 
		parent::__construct(); 
		$title_name ='用户';
		$this->title_name = $title_name;
		$this->assign('title_name',$title_name);
		$this->assign('Left_m','./Tpl/v20/Tpl/User/left.html');
	}

    /**修改密码**/
    public function admin_edit(){
        $data = $_SESSION['adminInfo']['adminId'];
        $admin = M('user');
        $show = $admin->where('id='.$data)->field()->find();

        $this->assign('show',$show);

        $Public = A("Public");
        $Public->log_action_data('1', '管理员密码信息', '修改密码'); //

        $this->assign("left_nav_div",'User');///主导航
        $this->assign("left_nav",'admin_edit');///主导航
        $this->display('./Tpl/v20/Tpl/User/admin_edit.html');
    }

    /**修改密码信息**/
    public function admin_password(){
        $data1 = $_SESSION['adminInfo']['adminId'];
        if(!$_POST['oldPassword']){
            $this->error('旧密码不能为空');
        }
        if(!$_POST['newPassword']){
            $this->error('新密码不能为空');
        }
        if(!$_POST['password']){
            $this->error('确认新密码不能为空');
        }

        if($_POST['newPassword']!=$_POST['password']){
            $this->error('两次输入的新密码不一致');
        }
        $admin = M('user');
        $show = $admin->where('id='.$data1)->field()->find();
        //dump($_POST);
        $password = MD5(trim($_POST['oldPassword']));

        if($password != $show['password']){
            $this->error('旧密码不正确');
        }
        $admin->create();
        $data['id'] = $_SESSION['adminInfo']['adminId'];
        $data['password'] =  MD5(trim($_POST['password']));

        //echo $data['id'];
        //判断旧密码是不是对的
        $save = $admin->save($data);

        //$Public = A("Public");
        if ($save){
            //$Public->log_action_data('1','修改管理员密码','修改成功'); //
            unset($_SESSION['adminInfo']);
            $this->success('修改成功,3秒后跳转到登陆页面');
        }else{
            //$Public->log_action_data('2','修改管理员密码','修改失败'); //
            $this->error('修改失败');
        }
    }

    /**新增用户**/
    public function add(){


        $this->assign("left_nav_div",'User');///主导航
        $this->assign("left_nav",'User-add');///主导航
        $this->display('./Tpl/v20/Tpl/User/add.html');
    }

    /**用户信息添加**/
    public function insert()
    {
        $project = M('user');
        $data['name'] = $_POST['name'];
        $data['username'] = $_POST['username'];
        $data['password'] = md5($_POST['password']);
        $data['regtime']=time();
        $result = $project->add($data);
        //$Public = A("Public");
        if ($result) {
            //$Public->log_action_data('1', '渠道信息', '添加成功'); //
            $this->success('添加成功','./index.php?m=User&a=lists');
        } else {
            //$Public->log_action_data('2', '渠道信息', '添加失败'); //
            $this->error('添加失败');
        }
    }

    /**用户列表**/
    public function lists()
    {
        $user = M('user');
        import("@.ORG.Page"); //导入分页类
        //设定默认多少条记录分页
        $PageNum = $_REQUEST['num'] > 0 ? $_REQUEST['num'] : 20;
        $this->assign("num", $PageNum);
        if (!empty($_REQUEST['starttime'])&&!empty($_REQUEST['endtime'])) {
            $t1 = strtotime($_REQUEST['starttime']);
            $t2 = strtotime($_REQUEST['endtime']);
            $data["regtime"] = array(array('egt', $t1),array('elt', $t2),'and');
        }
        if (!empty($_REQUEST['name'])) {
            $data["name"] = array("like", "%" . $_REQUEST['name'] . "%");
        }
        $data["_string"] ="id != 1";
        $map["starttime"]=$_REQUEST['starttime'];
        $map["endtime"]=$_REQUEST['endtime'];
        $map["name"]=$_REQUEST['name'];

        $count = $user->where($data)
            ->table(C('DB_PREFIX').'user A')
            ->count();
        $p = new Page ($count, $PageNum);

        $list	 = 	$user->where($data)
            ->table(C('DB_PREFIX').'user A')
            ->order('regtime desc')
            ->limit($p->firstRow.','.$p->listRows)->select();

        $this->assign('list', $list);
        $this->assign("map",$map);
        $this->assign("count", $count);
        $page = $p->show();
        $this->assign("page", $page);//分页

        //$Public = A("Public");
        //$Public->log_action_data('1', '一级渠道列表信息', '查询成功'); //


        $this->assign("left_nav_div", 'User');
        $this->assign("left_nav", 'User-lists');
        $this->display("v20/Tpl/User/lists");
    }

    /**用户修改**/
    public function edit()
    {
        $data = $_GET['id'];
        $user = M('user');
        $show = $user->where('id=' . $data)->field()->find();
        $this->assign("show", $show);
        //var_dump($show);exit();

        //$Public = A("Public");
        //$Public->log_action_data('1', '渠道信息', '渠道修改'); //

        $this->assign("left_nav_div", 'User');
        $this->assign("left_nav", 'User-lists');
        $this->display("v20/Tpl/User/edit");
    }

    /**用户信息修改保存**/
    public function save()
    {
        $user = M('user');
        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['regtime']=time();


        $result = $user->save($data);
        //$Public = A("Public");
        if ($result) {

            //$Public->log_action_data('1', '渠道信息', '修改成功'); //
            $this->success('修改成功', './index.php?m=User&a=lists');
        }
        else {
            //$Public->log_action_data('2', '渠道信息', '修改失败'); //
            $this->error('修改失败');
        }
    }

    /**用户详细**/
    public function detail()
    {
        $data = $_GET['id'];
        $user = M('user');
        $show = $user->where('id=' . $data)->field()->find();
        $this->assign("show", $show);

        //$Public = A("Public");
        //$Public->log_action_data('1', '渠道详细信息', '查询成功');

        $this->assign("left_nav_div", 'User');
        $this->assign("left_nav", 'User-lists');
        $this->display("v20/Tpl/User/detail");
    }

    /**用户信息删除**/
    public function delete(){
        $data = $_REQUEST['did'] ? $_REQUEST['did'] : $_REQUEST['id'];
        $project = M('user');
        $del = $project->delete($data);
        //$Public = A("Public");
        if ($del) {
            $count = $project->count();
            if($count < 1){
                $project->query('TRUNCATE TABLE '.C('DB_PREFIX').'project');
            }
            //$Public->log_action_data('1', '公告信息', '删除成功'); //
            $this->success('删除成功');
        }else {
            //$Public->log_action_data('2', '公告信息', '删除失败'); //
            $this->error('删除失败');
        }

    }

}