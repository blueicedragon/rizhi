<?php

class WorkAction extends CommonAction
{

    public $title_name;

    function __construct()
    {
        parent::__construct();
        $title_name = '工作管理';
        $this->title_name = $title_name;
        $this->assign('title_name', $title_name);
    }

    /**日志添加**/
    public function addlog()
    {
        $project=M('project');
        $list=$project->where()->select();
        $this->assign("list", $list);

        //$Public = A("Public");
        //$Public->log_action_data('1', '公告信息', '公告添加'); //

        $this->assign("left_nav_div", 'Work');
        $this->assign("left_nav", 'Work-addlog');
        $this->display("v20/Tpl/Work/addlog");
    }

    /**日志信息添加**/
    public function insertlog()
    {
        $work = M('log_work');
        $data['title'] = $_POST['title'];
        $data['projectid'] = $_POST['projectid'];
        $data['userid'] = $_SESSION['adminInfo']['adminId'];
        $data['worktime'] = floatval($_POST['worktime']);
        $data['content'] = stripslashes($_POST['content']);
        if(!empty($_POST['regtime'])){
            $data['regtime'] = strtotime($_POST['regtime']);
        }else{
            $data['regtime'] = time();
        }

        $result = $work->add($data);
        //$Public = A("Public");
        if ($result) {
            //$Public->log_action_data('1', '公告信息', '添加成功'); //
            $this->success('添加成功','./index.php?m=Work&a=listlog');
        } else {
            //$Public->log_action_data('2', '公告信息', '添加失败'); //
            $this->error('添加失败');
        }
    }

    /**日志信息列表**/
    public function listlog()
    {
        $project=M('project');
        $plist=$project->where()->select();
        $this->assign("plist", $plist);

        $work = M('log_work');
        import("@.ORG.Page"); //导入分页类
        //设定默认多少条记录分页
        $PageNum = $_REQUEST['num'] > 0 ? $_REQUEST['num'] : 15;
        $this->assign("num", $PageNum);

        if (!empty($_REQUEST['starttime'])&&!empty($_REQUEST['endtime'])) {
            $t1 = strtotime($_REQUEST['starttime']);
            $t2 = strtotime($_REQUEST['endtime']);
            $data["A.regtime"] = array(array('egt', $t1),array('elt', $t2),'and');
        }
        if (!empty($_REQUEST['title'])) {
            $data["A.title"] = array("like", "%" . $_REQUEST['title'] . "%");
        }
        if (!empty($_REQUEST['projectid'])) {
            $data["A.projectid"] = $_REQUEST['projectid'];
        }

        $map["starttime"]=$_REQUEST['starttime'];
        $map["endtime"]=$_REQUEST['endtime'];
        $map["title"]=$_REQUEST['title'];
        $map["projectid"]=$_REQUEST['projectid'];

        //var_dump($map);exit;

        if($_SESSION['adminInfo']['adminId']!=1){
            $data["A.userid"] = $_SESSION['adminInfo']['adminId'];
        }

        $count = $work->where($data)
            ->table(C('DB_PREFIX').'log_work A')
            ->join(C('DB_PREFIX').'project B on A.projectid=B.id')
            ->join(C('DB_PREFIX').'user C on A.userid=C.id')
            ->count();
        $p = new Page ($count, $PageNum);

        $list	 = 	$work->where($data)
            ->table(C('DB_PREFIX').'log_work A')
            ->join(C('DB_PREFIX').'project B on A.projectid=B.id')
            ->join(C('DB_PREFIX').'user C on A.userid=C.id')
            ->field('A.*,B.title as pname,C.name as cname')
            ->order('regtime desc')
            ->limit($p->firstRow.','.$p->listRows)->select();
        //var_dump($work->getLastSql());exit;
        $this->assign('list', $list);
        $this->assign("map",$map);
        $this->assign("projectid",$map["projectid"]);
        $this->assign("count", $count);
        $page = $p->show();
        $this->assign("page", $page);//分页

        //$Public = A("Public");
        //$Public->log_action_data('1', '公告信息', '查询成功'); //

        $this->assign("left_nav_div", 'Work');
        $this->assign("left_nav", 'Work-listlog');
        $this->display("v20/Tpl/Work/listlog");
    }

    /**日志修改**/
    public function editlog()
    {
        $project=M('project');
        $list=$project->where()->select();
        $this->assign("list", $list);

        $data = $_GET['id'];
        $work = M('log_work');
        $workinfo = $work->where('id=' . $data)->field()->find();
        $this->assign("show", $workinfo);
        //var_dump($articleinfo);exit();

        //$Public = A("Public");
        //$Public->log_action_data('1', '公告信息', '公告修改'); //

        $this->assign("left_nav_div", 'Work');
        $this->assign("left_nav", 'Work-listlog');
        $this->display("v20/Tpl/Work/editlog");
    }

    /**日志信息修改**/
    public function savelog()
    {
        $work = M('log_work');
        $data['id'] = $_POST['id'];
        $data['title'] = $_POST['title'];
        $data['projectid'] = $_POST['projectid'];
        $data['userid'] = $_SESSION['adminInfo']['adminId'];
        $data['worktime'] = floatval($_POST['worktime']);
        $data['content'] = stripslashes($_POST['content']);
        //$data['regtime'] = time();
        $workinfo = $work->save($data);
        //$Public = A("Public");
        if ($workinfo) {
            //$Public->log_action_data('1', '公告信息', '修改成功'); //
            $this->success('修改成功','./index.php?m=Work&a=listlog');
        } else {
            //$Public->log_action_data('2', '公告信息', '修改失败'); //
            $this->error('修改失败');
        }
    }

    /**日志信息详细**/
    public function detaillog()
    {
        $data = $_GET['id'];
        $work = M('log_work');
        $show = $work->where('A.id=' . $data)
            ->table(C('DB_PREFIX').'log_work A')
            ->join(C('DB_PREFIX').'project B on A.projectid=B.id')
            ->join(C('DB_PREFIX').'user C on A.userid=C.id')
            ->field('A.*,B.title as pname,C.name as cname')
            ->find();
        //var_dump($work->getLastSql());exit;
        $this->assign("show", $show);

        //$Public = A("Public");
        //$Public->log_action_data('1', '渠道详细信息', '查询成功');

        $this->assign("left_nav_div", 'Work');
        $this->assign("left_nav", 'Work-listlog');
        $this->display("v20/Tpl/Work/detaillog");
    }

    /**日志信息删除**/
    /*public function deletelog(){
        $data = $_REQUEST['did'] ? $_REQUEST['did'] : $_REQUEST['id'];
        $work = M('log_work');
        $del = $work->delete($data);
        //$Public = A("Public");
        if ($del) {
            $count = $work->count();
            if($count < 1){
                $work->query('TRUNCATE TABLE '.C('DB_PREFIX').'log_work');
            }
            //$Public->log_action_data('1', '公告信息', '删除成功'); //
            $this->success('删除成功');
        }else {
            //$Public->log_action_data('2', '公告信息', '删除失败'); //
            $this->error('删除失败');
        }

    }*/

    /**工时信息列表**/
    public function listtime()
    {
        $user=M('user');
        $ulist=$user->where("id != 1")->select();
        $this->assign("ulist", $ulist);
        //echo "<pre>";var_dump($ulist);exit;

        $work = M('log_work');
        import("@.ORG.Page"); //导入分页类
        //设定默认多少条记录分页
        $PageNum = $_REQUEST['num'] > 0 ? $_REQUEST['num'] : 20;
        $this->assign("num", $PageNum);

        if (!empty($_REQUEST['starttime'])&&!empty($_REQUEST['endtime'])) {
            $t1 = strtotime($_REQUEST['starttime']);
            $t2 = strtotime($_REQUEST['endtime']);
            $data['A.regtime'] = array(array('egt', $t1),array('elt', $t2),'and');
        }
        if (!empty($_REQUEST['userid'])) {
            $data["A.userid"] = $_REQUEST['userid'];
        }
        $map["starttime"]=$_REQUEST['starttime'];
        $map["endtime"]=$_REQUEST['endtime'];
        $map["userid"]=$_REQUEST['userid'];

        if($_SESSION['adminInfo']['adminId']==1){

            $list = $work->where($data)
                ->table(C('DB_PREFIX').'log_work A')
                ->join(C('DB_PREFIX').'project B on A.projectid=B.id')
                ->join(C('DB_PREFIX').'user C on A.userid=C.id')
                ->field('sum(A.worktime) as wtime,B.title as pname,C.name as cname')
                ->group('A.projectid')
                ->select();
            //var_dump($work->getLastSql());exit;
        }else{
            $data["A.userid"]=$_SESSION['adminInfo']['adminId'];
            $list = $work->where($data)
                ->table(C('DB_PREFIX').'log_work A')
                ->join(C('DB_PREFIX').'project B on A.projectid=B.id')
                ->join(C('DB_PREFIX').'user C on A.userid=C.id')
                ->field('sum(A.worktime) as wtime,B.title as pname,C.name as cname')
                ->group('A.projectid')
                ->select();
        }

        //var_dump($work->getLastSql());exit;
        $this->assign('list', $list);
        $this->assign("map",$map);

        //$Public = A("Public");
        //$Public->log_action_data('1', '公告信息', '查询成功'); //

        $this->assign("left_nav_div", 'Work');
        $this->assign("left_nav", 'Work-listtime');
        $this->display("v20/Tpl/Work/listtime");
    }

}

?>