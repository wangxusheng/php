<?php
   //继承链

    class A{
       public $name;
	}
 
	class B extends A {
	   public $sex;
	
	}

    class C extends B{
	
	}

	$c=new C;
	var_dump($c);
   
    /*
	  错误
    class C extends A,B{}

	class C extends A{
	
	}

	class C extends B{
	
	}

	class C extends A extends B{
	
	
	}
  */