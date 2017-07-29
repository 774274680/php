<?php 
class A{
	public $name="maomao";
	public $age=20;
	public $phone="不告诉你";

	public function show(){
		echo "show";
	}

	protected function protect(){
		echo "protect";
	}

	private function privated(){
		echo "private";
	}
}

$obj=new A();
foreach ($obj as $key => $value) {
	print "$key=>$value<br>";
}
 ?>