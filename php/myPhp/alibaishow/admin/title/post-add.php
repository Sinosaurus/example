<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Add new post &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script type="text/javascript" charset="utf-8" src="/admin/title/utf8-php/ueditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="/admin/title/utf8-php/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
  <script type="text/javascript" charset="utf-8" src="/admin/title/utf8-php/lang/zh-cn/zh-cn.js"></script>
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>

    <?php
//tit_id
//tit_title
//tit_slug
//tit_desc
//tit_content
//tit_author
//tit_cateid
//tit_file va
//tit_addtime
//tit_updtime
//tit_click
//tit_good
//tit_bad
//tit_status
//    连接数据库
include_once '../commin/session.php';

    $link = mysql_connect('localhost: 3306', 'root', 'root');
    mysql_query('set names utf8');
    mysql_query('use ali');
//    分类需要实时获取
    $id = $_SESSION['userId'];
    $sql = "select cate_name, cate_id from categories";
    $res = mysql_query($sql);


    ?>


  <script>NProgress.start()</script>
  <div class="main">
      <?php include "../commin/nav.php";?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>写文章</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <form class="row" action="tit-del.php" method="post" enctype="multipart/form-data">
        <div class="col-md-9">
          <div class="form-group">
            <label for="title">标题</label>
            <input id="title" class="form-control input-lg" name="title" type="text" placeholder="文章标题">
          </div>
            <div class="form-group">
                <label for="simple">简介</label>
                <input type= 'text' class="form-control input-lg" id="simple" name="simple">
            </div>
          <div class="form-group">
            <label for="content">内容</label>
            <textarea id="content"></textarea>
<!--              <script id="content" type="text/plain" ></script>-->
          </div>
          </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="slug">别名</label>
            <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
          </div>
          <div class="form-group">
            <label for="feature">特色图像</label>
            <!-- show when image chose -->
            <img class="help-block thumbnail" style="display: none">
            <input id="feature" class="form-control" name="feature" type="file">
          </div>
          <div class="form-group">
            <label for="category">所属分类</label>
            <select id="category" class="form-control" name="category">
              <option value="0">--分类--</option>
                <?php while($row = mysql_fetch_assoc($res)) { ?>
              <option value="<?= $row['cate_id']?>"><?= $row['cate_name']?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="created">发布时间</label>
            <input id="created" class="form-control" name="created" type="datetime-local">
          </div>
          <div class="form-group">
            <label for="status">状态</label>
            <select id="status" class="form-control" name="status">
              <option value="0">草稿</option>
              <option value="1">已发布</option>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit">保存</button>
          </div>
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

    <script>
        var ue = UE.getEditor('content', {
            initialFrameWidth: '100%', //初始化编辑器宽度,默认1000
            initialFrameHeight:320,  //初始化编辑器高度,默认320
//            initialContent:'挥毫泼墨画乾坤，落笔生花百年传！',
            zIndex : 0,
            elementPathEnabled : false //去除元素路径
        })
    </script>




  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>



</body>
</html>
