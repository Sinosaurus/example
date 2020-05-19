<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/19
 * Time: 9:51
 */
include_once './../commin/session.php';
$url  = isset($_POST['url'])?$_POST['url']:0 ;
$text = $_POST['text'];
//--------------------------
if (empty($_FILES)) {
    echo '文件未添加';
} else {
    if ($_FILES['file']['name'] != ''){

        $file = $_FILES['file'];
        //判断文件类型
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $finR  = finfo_file($finfo, $file['tmp_name']);
        $finst = strchr($finR, '/', true);
        if ($finst == 'image' && is_uploaded_file($file['tmp_name'])) {
//            重新取名
            $str = strrchr($file['name'], '.');
            $newPath = "./../uploads/".date('Y-m-d-His-', time()).$str;
            move_uploaded_file($file['tmp_name'], $newPath);
        }

    }
}
//--------------------------
//判断是否上传文件
$pic_path = '';
if ($_FILES['file']['error'] == 0){
    $pic_path = $newPath;
} else {
    $pic_path = '';
}



$link = mysql_connect('localhost: 3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
 /*ali_pic` (
  `pic_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pic_path` varchar(100) NOT NULL COMMENT '上传文件保存路径',
  `pic_txt` varchar(30) NOT NULL COMMENT '文本标题',
  `pic_link` varchar(30) NOT NULL COMMENT '文章链接地址',
  `pic_state` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 显示 1 不显示',*/
// 默认全部显示，后期再修改
$sql = "insert into ali_pic values (null, '$pic_path', '$text', '$url', 1)";
$res = mysql_query($sql);

/*
 * 目标 只返回当前新添加的值  其他不考虑   同时尽可能  将该值直接追加到页面的最后面即可 而不是全部重新渲染一遍
 */
if ($res) {
   $num =  mysql_insert_id();  //获取当前插入数据的id值
   echo json_encode(array(
       'id'       => $num,
       'pic_path' => $pic_path,
       'text'     => $text,
       'url'      => $url
   ));
} else {
    echo 0;
}




//若是上传成功 将所有信息取出来 返回去 渲染
/*$st = "select * from ali_pic where pic_path = '$pic_path'";
$row = mysql_query($st);
$arr = [];
while($z = mysql_fetch_assoc($row)) {
    $arr[] = $z;
}
print_r(json_encode($arr));*/





