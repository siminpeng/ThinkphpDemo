<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model
{
	// 是否批处理验证
	protected $patchValidate = true;

// 	array(     
// 		array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),     
// 		array(验证字段2,验证规则,错误提示,[验证条件,附加规则,验证时间]),
// 		......);

// 	用户名的验证

	protected $_validate = array(
			array('username','require','用户名必须填写'),
			array('password','require','密码必须填写'),
			array('password2','require','密码必须填写'),
			array('password2','password','密码必须相同',0,'confirm'),
			array('user_email','email','邮箱格式不正确',2),
			array('user_qq',"/^[1-9]\d{4,9}$/",'qq格式不正确'),
			array('user_xueli',"2,3,4,5",'必须选择一个学历',0,'in'),
			array('user_hobby','check_hobby','爱好必须两项以上',1,'callback'),		
	);
	
	//自定义方法验证爱好信息
	//$name参数是当前被验证项目的信息
	//$name = $_POST['user_hobby']
	function check_hobby($name){
		if(count($name)<2){
			return false;
		} else {
			return true;
		}
	}
}