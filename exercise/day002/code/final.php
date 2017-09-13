<?php
   //final类
      //保护类结构的完整性
    final class A{
	  
	
	}
    
	/*
    //不能继承final类
	class B extends A{
	
	}
	*/

	$a=new A();  //能被实例化

	class C{
	  final public function getName(){
	     echo 1;
	  }
	
	}

	class  D extends C{
		/*
	    public function getName(){    //final方法不能被重写
		  echo 2;
		}
	   */
	}