<?php
class Person{
	private $name;
	private $sex;
	public function __construct($name="",$sex="男"){
		$this->name = $name;
		$this->sex = $sex;
	}
	private function __isset($propertyName){
		return isset($this->$propertyName);
	}
	private function __unset($prepertyName){
		if($propertyName == "name")
			return ;
		unset($this->$propertyName);
	}
}

$person1 = new Person("张三","男");
var_dump(isset($person1->name));
var_dump(isset($person1->sex));
var_dump(isset($person1->id));
unset($person1->sex);

?>