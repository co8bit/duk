<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller 
{
	protected function _initialize()
    {
        header("Content-Type:text/html; charset=utf-8");
        // $this->uid      =       session("uid");
        // empty($this->uid) && $this->error("=.=你知道的太多了，biu",U("Index/login"));
        // if ($this->uid > 4)
        //     exit("=.=你知道的太多了，biu");
    }
    
    public function index()
    {
        $this->display();
    }
}