<?php
//命名空间
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller
{
	public function login()
	{
// 		echo "login";
// 		快捷函数U(“模块/控制器/方法”)  根据参数和url模式 创建对应的url地址
 		echo U("Home/User/login");
		$this->display();
	}
	
	//空操作
	function  _empty()
	{
		echo "这是一个空操作";
	}
	
	function register()
	{		
		if(!empty($_POST))
		{
			//用户注册页面，在model中，实现表单验证
			$user=new \Home\Model\UserModel();
			$z=$user->create();//收集表单,集成表单验证
			if(!$z)
			{
// 				$user->getError();
				show_bug($user->getError());
			}
			
		}
		
		$this->display();		
	}


}

