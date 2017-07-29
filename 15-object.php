<?php
// 接口
// 声明一个'iTemplate'接口  指定某个类全部实现这些方法
interface iTemplate
{
    // 接口中所有方法都是公开的并且所有方法的函数体为空
    public function setVariable($name, $var);
    public function getHtml($template);

    // 接口常量  接口常量和类常量的使用完全相同，但是不能被子类或子接口所覆盖。 
    const b = 'Interface constant';
}


// 实现接口
class Template implements iTemplate
{
    private $vars = array();
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function getHtml($template)
    {
        // foreach(数组名 as 键=>值)
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}
$test=new Template();
echo $test->getHtml("hello");

interface a
{
    public function foo();
}
interface d{
    public function D();
}

//接口也可以继承，因为接口中定义的方法都是公开的，所以都是可以继承下来的
// 接口能继承多个
interface b extends a,d
{
    public function baz(Baz $baz);
}

//类可以实现接口 以及继承下来的接口 
class c implements b
{
    public function foo()
    {
    }

    public function baz(Baz $baz)
    {
    }

    public function D(){

    }
}

// 访问接口常量
echo iTemplate::b;   //Interface constant
?>