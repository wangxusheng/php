<?php

   //工厂模式  提供什么样的类就产生什么样类的对象  类必须存在  类必须加载到内存

    class  Factory{
	    //定义一个加载类的方法
		private static function auto_load($class){
		   if(file_exists("{$class}.class.php")){
		       include "{$class}.class.php";
		   }elseif(file_exists("../20161123/{$class}.class.php")){
		       //include "../20161123/{$class}.class.php";
		   }	
		}

		//定义一个产生对象的方法
		public static function getObj($class){
		     //加载类到内存中
			 self::auto_load($class);
			 //实例化对象
			 $obj=new $class();
		     return $obj;
		}
	}

	$p=Factory::getObj('Person');
	$db=Factory::getObj('DB');    //前提是类名和文件名首个单词是一样

	var_dump($db,$p);