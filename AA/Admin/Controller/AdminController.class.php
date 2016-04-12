<?php
namespace Admin\Controller;
use Think\Controller;


class AdminController extends Controller
{
	public function login()
	{
		$this->display();
		echo "这是管理后台的管理员登陆页面";
	}
	
	public function count()
	{
		//跨控制器调用
		echo"我是Admin控制器下面的方法";
	}
}