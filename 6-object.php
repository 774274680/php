<?php 
// 析构函数 会在到某个对象的所有引用都被删除或者当对象被显式销毁时执行。
// 和构造函数一样，父类的析构函数不会被引擎暗中调用。要执行父类的析构函数，必须在子类的析构函数体中显式调用 parent::__destruct()。此外也和构造函数一样，子类如果自己没有定义析构函数则会继承父类的。 
	class Person{
		function __construct() {
	       print "构造函数开始初始化工作\n";
	    }

	    function __destruct() {
	    	print "父类要被销毁了";
	    }
	    
	}
	class student extends Person{
		function __destruct() {
	    	print "子类要被销毁了";
	    }
	    function show(){
	    	echo "learn PHP 干巴爹";
	    	//子类调用父类的析构函数 因此是父类先销毁完毕再到子类
	    	Person::__destruct();
	    }
	}

	$p1=new student();
	$p1->show();
 ?>