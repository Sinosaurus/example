<?php 
  header("content-type: text/html; charset= utf-8");//申明以utf-8模式进行编译//charset与=之间不能空格
    //若是print 而不是html 便不能正常解析 html中元素
	// 变量
  $me = 'Stuoraurus';
  $myPen = 18;
  $user_la = [11, 'hua', '龙'];
  echo '$me:', $me, '<br />';
  echo '$myPen:', $myPen, '<br />';
  // echo '$user_la:', $user_la, '<br />'; 打印不了复杂数据类型  
  // 
  //删除变量  只是将变量指向值得 过程（类似指针）的删掉，而变量和值都在，只是彼此间没有关系，后期php垃圾回收机制会将其清除掉，释放内存
  unset($me);
  //echo $me;// 没有被定义，已经被清除掉了
  // 打印不了复杂数据类型
  var_dump($user_la,"<br />");//br起到效果
  echo "<pre>"; //加pre 是为了是var_dump按照预定模式进行打印
  var_dump($user_la);
  echo "</pre>", "<br />";

  print_r($user_la);//打印出来的相对var_dump简单 同样可以使用 pre使其按预定义格式打印



  $boo = true;
  echo $boo,'<br />';
  print($boo);//与 echo相同，只是不能同时打印多个变量

  //------------------
  echo "<br />";
  var_dump($boo);// 只有这个可以打印boolean值
  echo "<br />";
  print_r($boo);