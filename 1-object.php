<?php
// 类定义
class A
{
    //属性的声明
    public $b = 10;

    //方法的声明
    public function show() {
    	//$this指向实例化的对象
        echo $this->b;
    }
}

// 实例化一个对象  (创建实例)
$a=new A();
//属性的访问
echo $a->b;    //10

//方法的访问
$a->show();   //10
?> 