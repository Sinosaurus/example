<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Dashboard &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>

  <script>NProgress.start()</script>
  <?php include_once '../commin/session.php';?>
  <?php
  /**
   * 通过session来获取对应id从而查询数据库渲染到叶明中
   * 可以通过直接将所有都放在session中，这样就可以不用查询数据库，但是由于数据存在session中，因而数据库里的数据进行变化时
   * session中的值不会变化，从而导致页面中的数据也不会变化，需要实时查询数据库才可以
   */
    $id = $_SESSION['userId'];
  /**
   * 连接数据库，查询数剧
   */
    $link = mysql_connect('localhost: 3306', 'root', 'root');
    mysql_query('set names utf8');
    mysql_query('use ali');
    $sql = "select * from ali_user where user_id = $id";
/* -------------
| user_id       |
| user_email    |
| user_slug     |
| user_nickname |
| user_password |
| user_pic      |
| user_status   |
+---------------*/
    $res = mysql_query($sql);
    /*if (mysql_affected_rows($link) > 0) {
        die('查询成功');
    } else {               验证了想法  查询也是可以看到影响行的
        die('查询失败');
    }*/
    $arr = mysql_fetch_assoc($res);

  ?>
  <div class="main">
      <?php include "../commin/nav.php";?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>我的个人资料</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <form class="form-horizontal" action="./changeadmin.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-sm-3 control-label">头像</label>
          <div class="col-sm-6">
            <label class="form-image">
              <input id="avatar" type="file"  value='图像' name="file" accept='image/*'>
              <img src="<?= $arr['user_pic']?>" id="show">
                <!--只是实时显示上传的图像-->
<!--                <img src="javascript:;" alt="" id="show">-->

              <i class="mask fa fa-upload"></i>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">邮箱</label>
          <div class="col-sm-6">
            <input id="email" class="form-control" name="email" type="type" value="<?= $arr['user_email']?>" placeholder="邮箱" readonly>
            <p class="help-block">登录邮箱不允许修改</p>
          </div>
        </div>
        <div class="form-group">
          <label for="slug" class="col-sm-3 control-label">别名</label>
          <div class="col-sm-6">
            <input id="slug" class="form-control" name="slug" type="type" value="<?= $arr['user_slug']?>" placeholder="slug">
          </div>
        </div>
        <div class="form-group">
          <label for="nickname" class="col-sm-3 control-label">昵称</label>
          <div class="col-sm-6">
            <input id="nickname" class="form-control" name="nickname" type="type" value="<?= $arr['user_nickname']?>" placeholder="昵称">
            <p class="help-block">限制在 2-16 个字符</p>
          </div>
        </div>
        <div class="form-group">
          <label for="bio" class="col-sm-3 control-label">简介</label>
          <div class="col-sm-6">
            <textarea id="bio" class="form-control" name="text">MAKE IT BETTER!</textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-primary">更新</button>
            <a class="btn btn-link" href="/admin/user/password-reset.php">修改密码</a>
          </div>
        </div>
      </form>
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
  <script>
      /*首先判断当前页面内容是否改变，再进行跳转,
      如何判断是否上传图片    */
        var file = document.querySelector('#avatar');
        console.log(file);
        file.onchange = function() {
//            alert(1);
            var pic = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(pic);
            reader.onload = function() {
                var img = document.querySelector('#show');
                img.src = this.result;
            }
        }
  </script>






</body>
</html>
