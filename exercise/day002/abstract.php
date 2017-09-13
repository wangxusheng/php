<?php
//抽象类
abstract class A{
	abstract public function getName();//抽象方法不能有方法体，而且必须是非私有，当前类必须为抽象类
	}
	//$a=new A//不能被实例化
	class B extends A{
		public function getName(){
			//子类必须重写父类的 抽象方法，方法不是抽象方法
			echo 'this is son';
		}
	}


?>