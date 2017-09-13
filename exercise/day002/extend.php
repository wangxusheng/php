<?php
header("content-type:text/html;charset=utf-8");
//继承
class Father{
	const PI=3.14;
	public static $sex='男'；
	public $xing='王'；
	protected $age=40;
	private $money=500;
	public function makeMoney(){
		echo '敲代码';
		echo $this->money;//私有属性的所属类
		$this->Money();//$this指的是父亲的对象
	}
             protected function Age(){
	echo 10;
	}
	private function Money(){
		echo '关机';
	}
	public function getSon(){
		$this->Money();
	}
}
//定义一个子类
class Son extends Father{
	public function getAge(){
		echo $this->age;
		$this->Age();
		$this->makeMoney();
		$this->Money();
	}
	public function getMoney(){
		echo 'haoduo';
	}
}
//实例化子对象
$son=new Son();
//$son->makeMoney();
//$son->getAge();
$Son->getMoney();
echo $son::PI;
echo $son::$sex;
echo $son->xing;
echo $son->makeMoney();
$f=new Father();
$f->getSon();
?>