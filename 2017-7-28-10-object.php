<?php 
//同一个类下的不同对象可以相互访问对方的私有与受保护成员
echo "<h3>利用了什么原理呢？调用函数则开辟新栈。要想访问私有和受保护的成员必须要在本类的公开方法中</h3>";
class Test
{
    private $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    private function bar()
    {
        echo 'Accessed the private method.';
    }

    public function baz(Test $other)
    {
        // We can change the private property:  从对象初始化的other换成hello
        $other->foo = 'hello';
        var_dump($other->foo);

        // We can also call the private method:
        $other->bar();
    }
}
//初始化对象 完成了对成员属性foo的赋值
$test = new Test('test');

// 调用对象中的公开方法baz,将Test $other=new Test("other"),因此又创建一个新对象$other
$test->baz(new Test('other'));   //Accessed the private method.

 ?>