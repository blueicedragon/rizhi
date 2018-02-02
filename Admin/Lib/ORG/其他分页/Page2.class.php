<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id: Page.class.php 2712 2012-02-06 10:12:49Z liu21st $

class Page {
    // 分页栏每页显示的页数
    public $rollPage = 5;
    // 页数跳转时要带的参数
    public $parameter  ;
    // 默认列表每页显示行数
    public $listRows = 20;
    // 起始行数
    public $firstRow	;
    // 分页总页面数
    protected $totalPages  ;
    // 总行数
    protected $totalRows  ;
    // 当前页数
    protected $nowPage    ;
    // 分页的栏的总页数
    protected $coolPages   ;
    // 分页显示定制
    protected $config  =	array('header'=>'条记录','prev'=>'上一页','next'=>'下一页','first'=>'第一页','last'=>'最后一页','theme'=>'%first% %prePage% %upPage% %linkPage% %downPage% %nextPage% %end% <em> 共 %totalRow% %header% (%nowPage%/%totalPage%)</em>');
    // 默认分页变量名
    protected $varPage;

    /**
     +----------------------------------------------------------
     * 架构函数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param array $totalRows  总的记录数
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     +----------------------------------------------------------
     */
    public function __construct($totalRows,$listRows='',$parameter='') {
        $this->totalRows = $totalRows;
        $this->parameter = $parameter;
        $this->varPage = C('VAR_PAGE') ? C('VAR_PAGE') : 'p' ;
        if(!empty($listRows)) {
            $this->listRows = intval($listRows);
        }
        $this->totalPages = ceil($this->totalRows/$this->listRows);     //总页数
        $this->coolPages  = ceil($this->totalPages/$this->rollPage);
        $this->nowPage  = !empty($_GET[$this->varPage])?intval($_GET[$this->varPage]):1;
        if(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage = $this->totalPages;
        }
        $this->firstRow = $this->listRows*($this->nowPage-1);
    }

    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }
	
	public function setVarPage($var) {
		$this->varPage = $var;
	}

    /**
     +----------------------------------------------------------
     * 分页显示输出
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     */
    public function show() {
        if(0 == $this->totalRows) return '';
        $p = $this->varPage;
        $nowCoolPage      = ceil($this->nowPage/$this->rollPage);
        // 参数构建
        $params = $_GET;
        unset($params[$p],$params[C('TOKEN_NAME')],$params["_URL_"]);
        parse_str($this->parameter,$paramsDiy);
        if (is_array($paramsDiy)) {
            $params = array_merge($params,$paramsDiy);
        }
        /*
        $url  =  $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?").$this->parameter;
        $parse = parse_url($url);
        if(isset($parse['query'])) {
            parse_str($parse['query'],$params);
            unset($params[$p]);
            $url   =  $parse['path'].'?'.http_build_query($params);
        }
        */
        // 上一页
        $upRow   = $this->nowPage-1;
        $downRow = $this->nowPage+1;
        if ($upRow>0){
            $params[$p] = $upRow;
            $upPage="<a class='page_prev' href='".U('?'.http_build_query($params))."'>".$this->config['prev']."</a>";
        }else{
            $upPage="";
        }
        // 下一页
        if ($downRow <= $this->totalPages){
            $params[$p] = $downRow;
            $downPage="<a class='page_next' href='".U('?'.http_build_query($params))."'>".$this->config['next']."</a>";
        }else{
            $downPage="";
        }
        // 首页和上X页
        if($nowCoolPage == 1){
            $theFirst = "";
            $prePage = "";
        }else{
            $preRow =  $this->nowPage - $this->rollPage;
            $params[$p] = $preRow;
            $prePage = "<a class='page_prev_switch' href='".U('?'.http_build_query($params))."' >上".$this->rollPage."页</a>";
            
            $params[$p] = 1;
            $theFirst = "<a class='page_first' href='".U('?'.http_build_query($params))."' >".$this->config['first']."</a>";
        }
        // 下X页和末页
        if($nowCoolPage == $this->coolPages){
            $nextPage = "";
            $theEnd="";
        }else{
            $nextRow = $this->nowPage+$this->rollPage;
            if ($nextRow > $this->totalPages) {
                $nextPage = "";
            } else {
                $params[$p] = $nextRow;
                $nextPage = "<a class='page_next_switch' href='".U('?'.http_build_query($params))."' >下".$this->rollPage."页</a>";
            }
            $theEndRow = $this->totalPages;
            $params[$p] = $theEndRow;
            $theEnd = "<a class='page_end' href='".U('?'.http_build_query($params))."' >".$this->config['last']."</a>";
        }
        // 页码
        $linkPage = "";
        for($i=1;$i<=$this->rollPage;$i++){
            $page=($nowCoolPage-1)*$this->rollPage+$i;
            if($page!=$this->nowPage){
                if($page<=$this->totalPages){
                    $params[$p] = $page;
                    $linkPage .= "&nbsp;<a class='page_page' href='".U('?'.http_build_query($params))."'>&nbsp;".$page."&nbsp;</a>";
                }else{
                    break;
                }
            }else{
                if($this->totalPages != 1){
                    $linkPage .= "&nbsp;<span class='page_current'>".$page."</span>";
                }
            }
        }
        $pageStr = strtr($this->config['theme'], array(
            '%header%' => $this->config['header'],
            '%nowPage%' => $this->nowPage,
            '%totalRow%' => $this->totalRows,
            '%totalPage%' => $this->totalPages,
            '%upPage%' => $upPage,
            '%downPage%' => $downPage,
            '%first%' => $theFirst,
            '%prePage%' => $prePage,
            '%linkPage%' => $linkPage,
            '%nextPage%' => $nextPage,
            '%end%' => $theEnd
        ));
        return $pageStr;
    }

}