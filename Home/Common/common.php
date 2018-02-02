<?php
	//判断是否手机，调用手机专用模板
	function ismobile() {
				// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
				if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
					return true;
				
				//此条摘自TPM智能切换模板引擎，适合TPM开发
				if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
					return true;
				//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
				if (isset ($_SERVER['HTTP_VIA']))
					//找不到为flase,否则为true
					return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
				//判断手机发送的客户端标志,兼容性有待提高
				if (isset ($_SERVER['HTTP_USER_AGENT'])) {
					$clientkeywords = array(
						'nokia',
						'sony',
						'ericsson',
						'mot',
						'samsung',
						'htc',
						'sgh',
						'lg',
						'sharp',
						'sie-',
						'philips',
						'panasonic',
						'alcatel',
						'lenovo',
						'iphone',
						'ipod',
						'blackberry',
						'meizu',
						'android',
						'netfront',
						'symbian',
						'ucweb',
						'windowsce',
						'palm',
						'operamini',
						'operamobi',
						'openwave',
						'nexusone',
						'cldc',
						'midp',
						'wap',
						'mobile'
					);
					//从HTTP_USER_AGENT中查找手机浏览器的关键字
					if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
						return true;
					}
				}
				//协议法，因为有可能不准确，放到最后判断
				if (isset ($_SERVER['HTTP_ACCEPT'])) {
					// 如果只支持wml并且不支持html那一定是移动设备
					// 如果支持wml和html但是wml在html之前则是移动设备
					if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
						return true;
					}
				}
				return false;
			}
	////////////////////////////////////
	////////////////////////////////////
	////////////////////////////////////
	//另一个判断是否手机访问
	function sp_is_mobile() {
		static $sp_is_mobile;
	
		if ( isset($sp_is_mobile) )
			return $sp_is_mobile;
	
		if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
			$sp_is_mobile = false;
		} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
			$sp_is_mobile = true;
		} else {
			$sp_is_mobile = false;
		}
	
		return $sp_is_mobile;
	}
	/////////////////////////////////////////////
	function is_mobile_request(){  
	 $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';  
	 $mobile_browser = '0';  
	 if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))  
	  $mobile_browser++;  
	 if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))  
	  $mobile_browser++;  
	 if(isset($_SERVER['HTTP_X_WAP_PROFILE']))  
	  $mobile_browser++;  
	 if(isset($_SERVER['HTTP_PROFILE']))  
	  $mobile_browser++;  
	 $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));  
	 $mobile_agents = array(  
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',  
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',  
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',  
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',  
		'newt','noki','oper','palm','pana','pant','phil','play','port','prox',  
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',  
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',  
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',  
		'wapr','webc','winw','winw','xda','xda-'
		);  
	 if(in_array($mobile_ua, $mobile_agents))  
	  $mobile_browser++;  
	 if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)  
	  $mobile_browser++;  
	 // Pre-final check to reset everything if the user is on Windows  
	 if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)  
	  $mobile_browser=0;  
	 // But WP7 is also Windows, with a slightly different characteristic  
	 if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)  
	  $mobile_browser++;  
	 if($mobile_browser>0)  
	  return true;  
	 else
	  return false;
	}

?>