<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <scrip<?php include_once './../commin/session.php';?>
  <div class="main">
      <?php include "/admin/commin/nav.php";?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
        <?php
        /**
         * Created by PhpStorm.
         * User: Sinosaurus
         * Date: 2018/1/12
         * Time: 20:39
         */
        include_once './../commin/connect.php';
        connect();
        $id = $_GET['id'];
        $sql = "select * from categories where cate_id = $id";
        $res = mysql_query($sql);
        $arr = mysql_fetch_assoc($res);

        ?>
      <div class="row">
        <div class="col-md-4">
          <form action="./update.php" method="post">
              <input type="hidden" name="id" value="<?= $arr['cate_id']?>">
            <h2>编辑目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input value="<?= $arr['cate_name']?>" id="name" class="form-control" name="name" type="text" placeholder="分类名称"  required>
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input value="<?= $arr['cate_slug']?>" id="slug" class="form-control" name="slug" type="text" placeholder="slug" required>
            </div>
              <div class="form-group">
                  <label for="slug">图标</label>
                  <input value="<?= $arr['cate_class']?>" id="slug" class="form-control" name="icon" type="text" required>
              </div>
              <div class="form-group">
                  <label for="slug">选用: </label>
                  <input id="slug"  name="status" type="radio" value=1 <?= $arr['cate_status'] == 1? 'checked' : ''?> >使用
                  <input id="slug"  name="status" type="radio" value=0 <?= $arr['cate_status'] == 0? 'checked' : ''?> >禁用
              </div>
              <div class="form-group">
                  <label for="slug">显示: </label>
                  <input id="slug" name="show" type="radio" value=1 <?= $arr['cate_show'] == 1? 'checked' : ''?> >显示
                  <input id="slug" name="show" type="radio" value=0 <?= $arr['cate_show'] == 0? 'checked' : ''?> >隐藏
              </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">修改</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="aside">
      <?php
      include_once '../commin/comminAside.php';
      ?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
