<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		
		$this->display();
    }
   
/*访问方法
 * http://localhost/AA/index.php?m=Home&c=index&a=getindex
 * http://localhost/AA/index.php/Home/index/getindex
 * http://localhost/AA/Home/index/getindex
 * 兼容模式：http://localhost/AA/index.php?s=/Home/index/getindex
 */
    public function getindex()
    {
    	echo "这是一个控制器里面的方法</br>";
//     	使用R方法
//     	R("Admin/Admin/count");

		$user=A("Admin/Admin");
		echo "我是A方法";
		$user->count();
    }
}
