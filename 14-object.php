<?php 
// 抽象类
abstract class AbstractClass
{
 // 强制要求子类定义这些方法 --这些抽象方法必须在子类具体实现,而且抽象方法不能有函数体(即{})
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // 普通方法（非抽象方法）
    public function printOut() {
        print $this->getValue() . "\n";
    }

    //无访问修饰符则默认为public
    function seeShow(){
    	$this->show();
    }

    function show(){
    	echo "parent_show";
    }

    //抽象方法中如果需要参数则仅定义需要的参数
    abstract protected function showname($name);
}

class ConcreteClass1 extends AbstractClass
{
	//子类中的抽象方法访问控制必须小于等于父类中对应访问控制修饰符 (如果父类是protected,那么子类可以是public或protected,不能是privated)
    public function getValue() {
        return "子类1";
    }

    public function prefixValue($prefix) {
        return "{$prefix}子类1";
    }
    //子类可以定义父类签名中不存在的可选参数,但是该参数必须赋初始值，不然会报错  不一致参数
    public function showname($name1,$a="hha"){
    	return $a;
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue() {
        return "子类2";
    }

    public function prefixValue($prefix) {
        return "{$prefix}子类2";
    }
    public function showname($name2,$a="name2"){
    	return $a;
    }
}

class test extends AbstractClass{
	public function getValue() {
        return "test1";
    }
    public function prefixValue($prefix) {
        return "{$prefix}test1";
    }
	function show(){
		// 子类中访问父类的方法
		parent::show();
		echo "child_show";
	}
	public function showname($name3,$a="name3"){
    	return $a;
    }
}

$class1 = new ConcreteClass1;   //也可以写作$class1 = new ConcreteClass1()
$class1->printOut();   //子类1
echo $class1->prefixValue('FOO_') ."\n";  //FOO_子类1

$class2 = new ConcreteClass2;
$class2->printOut();   //子类2
echo $class2->prefixValue('FOO_') ."\n";  //FOO_子类2

$class3=new test();
$class3->show();    //parent_showchild_show
$class3->seeShow(); //parent_showchild_show
 ?>