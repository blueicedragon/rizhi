<?php
class CommonAction extends Action {

    /**验证是否登录**/
	function _initialize(){
		
		if (!isset($_SESSION['adminInfo'])){
			redirect('./index.php?m=Login&a=index');//没有登录返回登录页 
			exit;
   		}else{
			//类库位置应该位于ThinkPHP\Extend\Library\ORG\Util\
		   	import('@.ORG.Auth');//加载类库
		   	$auth=new Auth();
		 	//这里需要判断一个超级管理员组别
			$admin_id = $_SESSION['adminInfo']['adminId'];
			/*if($admin_id==1){

			}else{
				if(!$auth->check(MODULE_NAME.'/'.ACTION_NAME,$_SESSION['adminInfo']['adminId'])){
            		$this->error('你没有该功能的权限');
       			}
			}*/
            //echo $admin_id;exit;
            if($admin_id==1){
                $leftnav="left1";
                $this->assign("leftnav",$leftnav);
            }else{
                $leftnav="left2";
                $this->assign("leftnav",$leftnav);
            }
			
			//已经登录
			$admin = M('user');
			$adminInfo = $admin->where('id='.$_SESSION['adminInfo']['adminId'])->field()->find();
			//var_dump($adminInfo);exit;
			$session_id = session_id();
			if($adminInfo['session_id'] != $session_id){
				unset($_SESSION['adminInfo']);
				$this->error('有其他人用该账户从别处登录',U('Login/index'));
			}
			$this->assign('adminInfo',$adminInfo);

			}
		
		
	}

    /**导出Excel方法**/
    public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $_SESSION['account'].date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        //vendor('PHPExcel.PHPExcel');
        import("@.ORG.Excel.PHPExcel");


        $objPHPExcel = new PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

}
?>