<?php

   //PHP模拟多态
    
     //定义父类

	  class Company{
          public function work(){
		       echo '工作';
		  }
	  
	  }

	 //定义一个普通员工类

	 class Yuangong extends  Company{
	     public function work(){
		    echo '扎金花';
		 }

	 } 

	  //定义一个主管类
	 class Zhuguan extends  Company{
		
	     public function work(){
		    echo '打麻将';
		 }
        
	 }
	  //定义一个经理类
	 class Jingli extends  Company{
	
	     public function work(){
		    echo '三国杀';
		 }
        
	 }
  
    //老板问经理，所有员工的工作状态怎么样
     //$zhuguan=new Zhuguan();   
	  function working(Zhuguan $obj){  //在传递参数时直接指定该对象属于某个类
	     $obj->work();           //如果不指定类的话，传入的对象就可以具有多种形态
	  }
      working(new Zhuguan);   //定义了要表现哪种形态，就必须传入指定形态的参数
