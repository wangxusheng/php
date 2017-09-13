<?php

   //接口
   interface A{
       //接口成员

	   const PI=3.14;
	   //public $name;  //没有属性

	   public function getName();  //是抽象方法，不能有方法体,必须是public
	   
   }

   interface B{
      const D=200;
   
   }

   //$a=new A;  //不能被实例化
  
  /*
   class B extends A{  //不能被继承
   
   }
 */
   class C implements A,B{   //一个类可以实现多个接口，也即遵循多个接口规范
       public function getName(){
	     echo 1;
	   }
   }

   $c=new C;
   echo C::D;
   echo C::PI;
  
     //接口与接口的继承

   interface E  extends  A{
      
   }