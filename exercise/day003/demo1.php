<?php
header('Content-type:text/html;charset=utf-8');
class Person{
	public $name;
	public $age;
	public $sex;
	public function __construct($name="",$age="",$sex=""){
		$this->name = $name;
		$this->age = $age;
		$this->sex = $sex;
	}
	public function say(){
		echo "名字:   ".$this->name.",   年龄:   ".$this->age.",  性别:   ".$this->sex." ";
		// echo "名字：".$this->name."，性别：".$this->sex."，年龄：".$this->age."
	}
}
$person1 = new Person("张三","男",20);
$person2 = new person("李四","女",18);
$person1->say();
$person2->say();
