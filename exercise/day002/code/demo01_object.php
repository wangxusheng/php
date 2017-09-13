<?php
   //得到一个类的对象的方式

    include 'DB.class.php';

	//第一种方式  直接获取对象的方式  new

	$db=new DB();

	//第二种方式   赋值的方式   是同一个对象

	$db1=&$db;  //$db1=$db

   //第三种方式  克隆  出来的对象是一个新的对象
     
	$db2=clone $db;


	//var_dump($db,$db1,$db2);

	//对象的比较  类成员一致且编号也必须一致

	var_dump($db==$db1); //true
	var_dump($db===$db1); //true
	var_dump($db===$db2); //false
	var_dump($db==$db2); //true   只要类成员一致
   