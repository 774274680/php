<?php 
// 属性的声明
class A{
    public $var1 = 'hello'.'world';
    public $c=<<<EOD
      hello PHP
EOD;
    public $bar = <<<'EOT'
barxiix
EOT;
      
   //定义一个类常量 (把在类中始终保持不变的值定义为常量)
   const height=3.14;

   function showConstant() {
        echo  self::height."\n";
    }
}
$a=new A();
echo $a->var1;  //hello world
echo "<br>";
echo $a->c;    //hello PHP
echo "<br>";
echo $a->bar;   //barxiix
var_dump($a);

// 类常量的访问
echo A::height."\n";   //3.14
$a->showConstant();    //3.14
echo $a::height;       //3.14
 ?>