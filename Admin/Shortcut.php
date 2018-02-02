<?php

		header("Content-type: charset=utf-8");
		$furl = $_POST['furl'];
        $content = '[InternetShortcut]
        URL='.$furl.'
        IDList=[{000214A0-0000-0000-C000-000000000046}]
        Prop3=19,2
        ';
        header("Content-type: application/octet-stream");
        
        /** 兼容各个浏览器 **/
        $filename = $_POST['fname'].'.url';
        $encoded_filename = urlencode($filename);
        $encoded_filename = str_replace("+", "%20", $encoded_filename);

        if (preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT']) ) 
        {
            header('Content-Disposition:  attachment; filename="' . $encoded_filename . '"');
        }
        elseif (preg_match("/Firefox/", $_SERVER['HTTP_USER_AGENT']))
        {
            header('Content-Disposition: attachment; filename*="utf8' .  $filename . '"');
        }
        else 
        {
            header('Content-Disposition: attachment; filename="' .  $filename . '"');
        }
        /** end **/

        echo $content;        






?> 
