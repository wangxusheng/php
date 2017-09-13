<?php
   header("content-type:text/html;charset=utf-8");
   //继承
   class Father{
	  const PI=3.14;
	  public static $sex='男';
      public $xing='刘';
	  protected $age=40;
	  private $money=500;
	  public function makeMoney(){
	     echo '敲代码';
		 echo $this->money;  //私有属性的所属类
		 $this->Money();    //$this指的是父亲的对象
	  }
      
	  protected function Age(){
	    echo 100;
	  }

	  private function Money(){
	    echo '打麻将';
	  }

	  public function getSon(){
	     //调用儿子的方法
		 //$this->getMoney(); //$this必须结合上下文的环境来决定,$this取决于谁来调用该方法
	     $this->Money();
	  }
   }

   //定义一个子类

   class Son extends Father{
       //通过继承，子类就拥有了父类所有属性和非私有的方法
	   public function getAge(){
	       echo $this->age;   //受保护的可以被继承
		   $this->Age();  //子类可以继承父类的受保护的方法
		   $this->makeMoney(); //子类可以继承父类的公有的方法
		   $this->Money();  //子类不能继承父类的私有的方法
	   }
       
	   public function getMoney(){
	     // echo $this->money;  //私有的东西属性也被继承过来了，但是不能在子类中访问
         //$this->Money();  //本身私有的方法就没有被继承
         echo 'hen duo money';
	   }
 
   }

   //实例化子类的对象

   $son=new Son();
   //var_dump($son);
   //$son->makeMoney();
   //$son->getAge();
   $son->getMoney();
   echo Son::PI;
   echo Son::$sex;
   echo $son->xing;

   echo $son->makeMoney();
    
   $f=new Father();
   $f->getSon();
   //$son->getSon();



   