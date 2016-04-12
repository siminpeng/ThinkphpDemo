<?php
namespace  Admin\Controller;
use Think\Controller;
// use Admin\Model\GoodsModel;----$goods= new GoodsModel();
class GoodsController extends Controller
{
	public function zhanshi()
	{
// 		实例化model对象
// 		$goods= new \Admin\Model\GoodsModel();
		
// 		$goods=D("Goods");
		$goods=M("Goods");
		
		//全选
// 		$info=$goods->select();
// 		查询指定字段
		$info=$goods->field("goods_id,goods_name,goods_number")->select();
		
		$info=$goods->where("goods_price>1000 and goods_name like'索%'")->select();
		
		$info= $goods->limit(10,5)->select();
		
// 		分组查询
		$info=$goods->field('goods_category_id')->group('goods_category_id')->select();
// 		show_bug($info);
		
		$info=$goods->order('goods_price asc')->select();
		$info=$goods->order('goods_price desc')->select();
		
		$info=$goods->find(30);//返回一维数组
		$info=$goods->select('20,21,22,23');
		
		echo"数据的总条数是：".$goods->count();
		echo"数据的最高价格：".$goods->max('goods_price');
		echo"数据的最低价格：".$goods->min('goods_price');
		
		echo $goods->where('goods_price>1000')->count();
		
// 		dump($info);
		$this->assign('info',$info);
		
// 		show_bug($goods);
		
		$this->display();
// 		$result = $this->get_display();
// 		echo $result;
	}
	
	/* 	两种方式实现数据添加
	 * 数组
	 * ar对象
	 */
	public function add1()
	{
// 		$goods=M(Goods);
// 		数组的方式
// 		$arr=array(
// 			'goods_name'=>'iphone5s',
// 			'goods_price'=>4999,
// 			'goods_number'=>53,
// 		);
// 		$rst=$goods->add($arr);//返回插入的id
		
// 		$goods=M('Goods');
		$goods=D('Goods');
		
		$goods->goods_name="htc";
		$goods->goods_rice=3000;
		
		$rst=$goods->add();
		
		if($rst>0){
			echo "success";
		}
		else{
			echo "failure";
		}
		
		$this->display();
	}
	
	public function add()
	{
// 		展现表单，接收表单数据
		$goods=D("Goods");
		if(!empty($_POST))
		{
			$goods->create();//收集表单数据
			$z=$goods->add();
			if($z)
			{
				echo "success";
			}
			else 
			{
				echo "error";
			}
		}
		else
		{	
			$this->display();
		}
	}
	
	
	public function update($goods_id)
	{
// 		按照框架规则使用下边的方式接收get参数信息
// 		function upd($name,$age,$addr){
// 			$name;
// 			$age;
// 			$addr;
// 		}
		
		$goods=D(Goods);
		//展示表单，收集表单
		if(!empty($_POST))
		{
			$goods->create();
			$rst=$goods->save();
			if($rst)
			{
				echo "success";
			}
			else
			{
				echo "failure";
			}
		}
		else
		{
			$info=$goods->find($goods_id);
			$this->assign('info',$info);
			$this->display();
		}
	}
	
	//数据的删除
	public function del()
	{
		$goods=D("Goods");
		$rst=$goods->delete(63);
		$rst=$goods->delete('61,62,63');
		
		$rst=$goods->where('goods_id>56')->delete();
	}
	
	public function yuanshengsql()
	{
// 		1.	查询语句query()  返回一个二维数组信息
// 		2.	添加、修改、删除 execute()  返回受影响的记录条数
		$goods = D(“Goods”);
		$sql = "select * from sw_goods";
		$rst = $goods -> query($sql);
		
		$sql = "select goods_category_id,avg(goods_price) from sw_goods group by goods_category_id having  avg(goods_price)>1000";
		$goods -> query($sql);
		
		$sql = "update sw_goods set goods_name = ‘htc_two’ where goods_id=100";
		$goods -> execute($sql);
		
	}
	
}