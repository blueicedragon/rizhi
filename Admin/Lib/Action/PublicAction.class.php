<?php
if (!isset($_SESSION['adminInfo'])){
			exit;
}
class PublicAction extends Action{

    /**写入日志**/
	public function log_action_data($status,$mName,$aName){
		$log_action = M('log_action');
		$data['addTime']=time();
		$data['status']=$status;
		$data['adminName'] = $_SESSION['adminInfo']["admin_name"];
		$data['mName']=$mName;
		$data['aName']=$aName;
		$data['type']=1;//管理员操作标识
		//$log_action = $log_action ->add($data);
	}

}
?>