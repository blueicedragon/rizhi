<?php

class ProjectAction extends CommonAction
{

    public $title_name;

    function __construct()
    {
        parent::__construct();
        $title_name = '项目管理';
        $this->title_name = $title_name;
        $this->assign('title_name', $title_name);
    }

    /**项目添加**/
    public function add()
    {
        //$Public = A("Public");
        //$Public->log_action_data('1', '项目信息', '项目添加'); //

        $this->assign("left_nav_div", 'Project');
        $this->assign("left_nav", 'Project-add');
        $this->display("v20/Tpl/Project/add");
    }

    /**项目信息添加**/
    public function insert()
    {
        $project = M('project');
        $data['title'] = $_POST['title'];
        $data['regtime']=time();
        $result = $project->add($data);
        //$Public = A("Public");
        if ($result) {
            //$Public->log_action_data('1', '渠道信息', '添加成功'); //
            $this->success('添加成功','./index.php?m=Project&a=lists');
        } else {
            //$Public->log_action_data('2', '渠道信息', '添加失败'); //
            $this->error('添加失败');
        }
    }

    /**项目列表**/
    public function lists()
    {
        $agent = M('project');
        import("@.ORG.Page"); //导入分页类
        //设定默认多少条记录分页
        $PageNum = $_REQUEST['num'] > 0 ? $_REQUEST['num'] : 20;
        $this->assign("num", $PageNum);
        if (!empty($_REQUEST['starttime'])&&!empty($_REQUEST['endtime'])) {
            $t1 = strtotime($_REQUEST['starttime']);
            $t2 = strtotime($_REQUEST['endtime']);
            $data["regtime"] = array(array('egt', $t1),array('elt', $t2),'and');
        }
        if (!empty($_REQUEST['title'])) {
            $data["title"] = array("like", "%" . $_REQUEST['title'] . "%");
        }
        $map["starttime"]=$_REQUEST['starttime'];
        $map["endtime"]=$_REQUEST['endtime'];
        $map["title"]=$_REQUEST['title'];

        $count = $agent->where($data)
            ->table(C('DB_PREFIX').'project A')
            ->count();
        $p = new Page ($count, $PageNum);

        $agent_info	 = 	$agent->where($data)
            ->table(C('DB_PREFIX').'project A')
            ->order('regtime desc')
            ->limit($p->firstRow.','.$p->listRows)->select();

        $this->assign('list', $agent_info);
        $this->assign("map",$map);
        $this->assign("count", $count);
        $page = $p->show();
        $this->assign("page", $page);//分页

        //$Public = A("Public");
        //$Public->log_action_data('1', '一级渠道列表信息', '查询成功'); //


        $this->assign("left_nav_div", 'Project');
        $this->assign("left_nav", 'Project-lists');
        $this->display("v20/Tpl/Project/lists");
    }

    /**项目修改**/
    public function edit()
    {
        $data = $_GET['id'];
        $agent = M('project');
        $show = $agent->where('id=' . $data)->field()->find();
        $this->assign("show", $show);
        //var_dump($show);exit();

        //$Public = A("Public");
        //$Public->log_action_data('1', '渠道信息', '渠道修改'); //

        $this->assign("left_nav_div", 'Project');
        $this->assign("left_nav", 'Project-lists');
        $this->display("v20/Tpl/Project/edit");
    }

    /**项目信息修改保存**/
    public function save()
    {
        $agent = M('project');
        $data['id'] = $_POST['id'];
        $data['title'] = $_POST['title'];
        $data['regtime']=time();


        $result = $agent->save($data);
        //$Public = A("Public");
        if ($result) {

            //$Public->log_action_data('1', '渠道信息', '修改成功'); //
            $this->success('修改成功', './index.php?m=Project&a=lists');
        }
        else {
            //$Public->log_action_data('2', '渠道信息', '修改失败'); //
            $this->error('修改失败');
        }
    }

    /**项目详细**/
    public function detail()
    {
        $data = $_GET['id'];
        $agent = M('project');
        $show = $agent->where('id=' . $data)->field()->find();
        $this->assign("show", $show);

        //$Public = A("Public");
        //$Public->log_action_data('1', '渠道详细信息', '查询成功');

        $this->assign("left_nav_div", 'Project');
        $this->assign("left_nav", 'Project-lists');
        $this->display("v20/Tpl/Project/detail");
    }

    /**项目信息删除**/
    /*public function delete(){
        $data = $_REQUEST['did'] ? $_REQUEST['did'] : $_REQUEST['id'];
        $project = M('project');
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

    }*/



}

?>