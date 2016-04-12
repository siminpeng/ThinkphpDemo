<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller
{
	public function index()
	{
// 		echo "这是后台的主页面";
		$this->display();
	}
	
	
	public function head()
	{
		$this->display();
	}
	
	public function left()
	{	
// 		dump(get_defined_constants(true));
		$this->display();
	}
	
	public function right()
	{
// 		sdump(get_defined_constants(true));
		$this->display();
	}
}