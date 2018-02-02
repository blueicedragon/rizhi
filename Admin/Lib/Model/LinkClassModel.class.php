<?php

class LinkClassModel extends Model {
	// 自动验证设置
	
	protected $_validate	 =	 array(
		array('name','require','标题必须！',1),
		array('description','require','类别描述不能为空！',1),
		//array('email','email','邮箱格式错误！',2),
		//array('content','require','内容必须',1),
		array('name','','标题已经存在',0,'unique',1),
		);
	

}
?>