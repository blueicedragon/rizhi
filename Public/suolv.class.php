<?php
/**
* @name thum    缩略图函数
* @param    sting   $img_name   图片路径
* @param    int     $max_width  略图最大宽度
* @param    int     $max_height 略图最大高度
* @param    sting   $suffix 略图后缀(如"img_x.jpg"代表小图,"img_m.jpg"代表中图,"img_l.jpg"代表大图)
* @return   void
*/ 
function thum($img_name,$max_width,$max_height,$suffix){ 
        $img_infos=getimagesize($img_name); 
        $img_height=$img_infos[0];//图片高 
        $img_width=$img_infos[1];//图片宽 
        $img_extension='';//图片后缀名 
        switch($img_infos[2]){ 
            case 1: 
                $img_extension='gif'; 
                break; 
            case 2: 
                $img_extension='jpeg'; 
                break; 
            case 3: 
                $img_extension='png'; 
                break; 
            default: 
                $img_extension='jpeg'; 
                break; 
            } 
        $new_img_size=get_thum_size($img_width,$img_height,$max_width,$max_height);//新的图片尺寸 
         
         
        //print_r($new_img_size); 
        //die('test'); 
        $img_func='';//函数名称 
        $img_handle='';//图片句柄 
        $thum_handle='';//略图图片句柄 
        switch($img_extension){ 
            case 'jpg': 
                $img_handle=imagecreatefromjpeg($img_name); 
                $img_func='imagejpeg'; 
                break; 
            case 'jpeg': 
                $img_handle=imagecreatefromjpeg($img_name); 
                $img_func='imagejpeg'; 
                break; 
            case 'png': 
                $img_handle=imagecreatefrompng($img_name); 
                $img_func='imagepng'; 
                break; 
            case 'gif': 
                $img_handle=imagecreatefromgif($img_name); 
                $img_func='imagegif'; 
                break; 
            default: 
                $img_handle=imagecreatefromjpeg($img_name); 
                $img_func='imagejpeg'; 
                break; 
            } 
        /****/   
        $quality=100;//图片质量 
        if($img_func==='imagepng' && (str_replace('.', '', PHP_VERSION)>= 512)){//针对php版本大于5.12参数变化后的处理情况 
            $quality=9; 
            }  
        /****/ 
        $thum_handle=imagecreatetruecolor($new_img_size['height'],$new_img_size['width']); 
        if(function_exists('imagecopyresampled')){ 
            imagecopyresampled($thum_handle,$img_handle, 0, 0, 0, 0,$new_img_size['height'],$new_img_size['width'],$img_height,$img_width); 
            }else{ 
                imagecopyresized($thum_handle,$img_handle, 0, 0, 0, 0,$new_img_size['height'],$new_img_size['width'],$img_height,$img_width); 
            } 
        call_user_func_array($img_func,array($thum_handle,get_thum_name($img_name,$suffix),$quality)); 
        imagedestroy($thum_handle);//清除句柄 
        imagedestroy($img_handle);//清除句柄 
    } 
 
/**
* @name get_thum_size 获得缩略图的尺寸
* @param    $width  图片宽
* @param    $height 图片高
* @param    $max_width 最大宽度
* @param    $maxHeight 最大高度
* @param    array $size;
*/ 
function get_thum_size($width,$height,$max_width,$max_height){ 
    $now_width=$width;//现在的宽度 
    $now_height=$height;//现在的高度 
    $size=array(); 
    if($now_width>$max_width){//如果现在宽度大于最大宽度 
        $now_height*=number_format($max_width/$width,4); 
        $now_width= $max_width; 
        } 
    if($now_height>$max_height){//如果现在高度大于最大高度 
        $now_width*=number_format($max_height/$now_height,4); 
        $now_height=$max_height; 
        } 
    $size['width']=floor($now_width); 
    $size['height']=floor($now_height); 
    return $size; 
    } 
 
/**
*@ name     get_thum_name 获得略图的名称(在大图基础加_x)
 www.2cto.com
*/   
function get_thum_name($img_name,$suffix){ 
        $str=explode('#',$img_name); 
        $str1=explode('.',$str[1]); 
        return $str[0].'_'.$suffix.'.'.$str1[1]; 
    } 
