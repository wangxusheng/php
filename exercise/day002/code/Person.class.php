<?php

   class Person{
      //魔术方法实现容错处理
	  public $name;
     
	  public  function __toString(){
	     return '$p是一个对象，不能直接输出';   //必须是通过return进行返回
	  }
     
	  //克隆对象时自动触发的方法
	  public function __clone(){
	        echo '1';
	  }
   
   }
   /*
   $p=new Person();
   $p2=new Person();
   $p3=new Person();
   $p3->name='张三';
     // echo $p;
   //$p1=clone $p;   //如果内部定义魔术方法 __clone时，定义的访问限定修饰符为非公有时，该行代码出错，不能克隆新的对象。

    var_dump($p,$p2,$p3);
  
   */
   