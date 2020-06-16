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
    <script src="/admin/jquery-3.2.1.js"></script>
    <script src="/admin/template-web.js"></script>
    <script type="text/html" id = "temple">
        {{each a}}
        <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>{{$value['cate_class']}}</td>
            <td>{{$value['cate_id']}}</td>
            <td>{{$value['cate_name']}}</td>
            <td>{{$value['cate_show']}}</td>
            <td>{{$value['cate_slug']}}</td>
            <td class="text-center">
            <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
            <a href="./del-form.php?id=1{{$value['cate_status']}} " class="btn btn-danger btn-xs">删除</a>
            </td>
        </tr>
        {{/each}}
    </script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
      <?php include_once './../commin/session.php';?>
      <?php include "../commin/nav.php";?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
        <div class="col-md-4">
            <form>
                <h2>添加新分类目录</h2>
                <div class="form-group">
                    <label for="name">名称</label>
                    <input id="name" class="form-control" name="name" type="text" placeholder="分类名称" required>
                </div>
                <div class="form-group">
                    <label for="slug">别名</label>
                    <input id="slug" class="form-control" type="text" placeholder="slug" required>
                </div>
                <div class="form-group">
                    <label for="icon">图标</label>
                    <input id="icon" class="form-control" type="text" required>
                </div>
                <div class="form-group ">
                    <label for="status">选用: </label>
                    <input id="status"  type="radio" name="a" value=1 checked>使用
                    <input id="status"  type="radio" name="a" value=0>禁用
                </div>
                <div class="form-group ">
                    <label for="show">显示: </label>
                    <input id="show" type="radio" value=1 name="b" checked>显示
                    <input id="show" type="radio" value=0 name="b" >隐藏
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">添加</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
              <tbody>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="aside">
    <div class="profile">
      <img class="avatar" src="/uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="/index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li><a href="/posts.php">所有文章</a></li>
          <li><a href="/post-add.php">写文章</a></li>
          <li class="active"><a href="/categories.php">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="/comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="/users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="/nav-menus.php">导航菜单</a></li>
          <li><a href="/slides.php">图片轮播</a></li>
          <li><a href="/settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
<script>
    $(function() {
        $('.btn').on('click', function() {
            $.ajax({
                url: './add-deal.php',
                type: 'post',
                dataType: 'text',
                data: {
                   /* $name   = trim($_POST['name']);  /!*trim()去除两端空白*!/
                    $slug   = trim($_POST['slug']);
                    $icon   = trim($_POST['icon']);
                    $status = trim($_POST['status']);
                    $show   = trim($_POST['show']);*/
                    name: $('#name').val(),
                    slug: $('#slug').val(),
                    icon: $('#icon').val(),
                    status: $('#status:checked').val(),
                    show: $('#show:checked').val()

                },
                success: function(data) {
                    console.log(data);
                    var a = JSON.parse(data);
                    console.log({a});
                    var b = template('temple',{a});
                    $('tbody').html(b);

                }


            })
        }).trigger('click');
    })
</script>
</html>
