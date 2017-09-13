<?php
//定义父类
class Company{
	public function work(){
		echo '工作'；
	}
}
//定义一个普通员工类
class Yuangong extends Company{
	public function work(){
		echo '你好吗';
	}
}
//定义一个主管类
class Zhuguan extends Company{
	public function work(){
		echo '我很好';
	}
}
//定义一个经理类
class Jingli extends Company{
	public function work(){
		echo '你呢，过得还好吗';
	}
}

function working(Zhuguan $obj){
	//在传递参数时直接指定该对象属于某个类
	// 如果不指定的话，传入的对象就可以有多种形态
	$obj->work();
}
// 定义了要表现哪种形态，就必须传入指定形态 的参数
working(new Zhuguan);

?>