<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/19
 * Time: 15:06
 */
header('content-type: text/html; charset= utf8');

        $oldlogo = $_POST['site_logo'];

        $post    = $_POST['site_name'];
        $desc    = $_POST['site_description'];
        $keyword = $_POST['site_keywords'];
        //------可能没有勾选 因而不传值
        $commnet = isset($_POST['comment_status']) ? 1 : 0;
         $man    = isset($_POST['comment_reviewed']) ? 1 : 0;

//        判断文件是否上传
        if(empty($_FILES)) {
            var_dump($_FILES);
            die;
        } else {
            if ($_FILES['file']['error'] == 0) {
//                代表上传了文件
                $file = $_FILES['file'];
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $result  = finfo_file($finfo, $file['tmp_name']);
                $type   = strchr($result, '/', true);
                if ($type == 'image') {
                    if (is_uploaded_file($file['tmp_name'])) {
                        $str     = strrchr($file['name'], '.');
                        $newPath = './../uploads'.time().mt_rand(1000, 9999).$str;
                        if (move_uploaded_file($file['tmp_name'], $newPath)) {
                            echo '上传成功';
                        }
                    }
                }

            }
        }


        //      引入文件 拿到对应的路径 直接不修改 但需要重新保存
      /*  $info = include './smallMsg.php';
        $oldPath = $info['logo'];*/


        if ($_FILES['file']['error'] != 0) {
            $logo = $oldlogo;

        } else {
            unlink($oldlogo);
            $logo = $newPath;
        }

        $change = fopen('smallMsg.php', 'w');
        fwrite($change,
            "<?php 
            return array(
                'logo'    => '{$logo}',
                'post'    => '{$post}',
                'desc'    => '{$desc}',
                'keyword' => '{$keyword}',
                'commnet' => $commnet,
                'man'     =>  $man   
            );");
        header('refresh:1; url=./settings.php');die;
