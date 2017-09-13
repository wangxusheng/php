<?php
  header("content-type:text/html;charset=utf-8");
   
   //当子类拥有和父类同名的方法和属性时，子类重写父类的所有的非私有的属性和方法，也即覆盖，
//私有的东西不会被覆盖
   class Father{
      public  $name='张三';
	  private $money=100;

	  public function work(){
	     echo '打麻将';
	  }
    
	  public function son(){
	     echo $this->name;   //小兵张嘎  非私有属性使用子类的属性
		 echo $this->money;   //100 私有的属性使用自己类的属性
	  }
   }

   class Son extends Father{
       public $name='小兵张噶';
	   private $money=10000;

	   public function work(){
		 echo $this->money;
	      echo '敲代码';
	   }
   }

   $son=new Son();
   //var_dump($son);
   //echo $son->name;
   //$son->work();
   $son->son();
   $f=new Father();
   $f->son();

