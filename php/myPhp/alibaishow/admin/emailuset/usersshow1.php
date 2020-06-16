<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Users &laquo; Admin</title>
  <link rel="stylesheet" href="/../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/../assets/css/admin.css">

    <script src="/admin/jquery-3.2.1.js"></script>

<!--    <script src="/../assets/vendors/jquery/jquery.js"></script>-->
    <script src="/../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script src="/../assets/vendors/nprogress/nprogress.js"></script>
    <script src="/admin/template-web.js"></script>
    <script type="text/html" id="tem">
        {{each obj}}
        <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td class="text-center"><img class="avatar" src="#"></td>
            <td>{{$value['user_email']}}</td>
            <td>{{$value['user_slug']}}</td>
            <td>{{$value['user_nickname']}}</td>
            {{if $value['user_status'] == 1}}
            <td>{{'显示'}}</td>
            {{else if $value['user_status'] == 0}}
            <td>{{'不显示'}}</td>
            {{/if}}
            <td class="text-center">
                <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
                <a href="javascript:;" class="deluser btn btn-danger btn-xs">删除</a>
            </td>
        </tr>
        {{/each}}



    </script>
</head>
<body>
  <script>NProgress.start()</script>
  <div class="main">
      <?php include "../commin/nav.php";?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>用户</h1> <a href="./add-users.php" class="btn btn-danger btn-xs">添加</a>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="page-action">
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th class="text-center" width="80">头像</th>
                <th>邮箱</th>
                <th>别名</th>
                <th>昵称</th>
                <th>状态</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
            <ul class="pagination pagination-sm pull-right" id="aj">
                <li><a href="javascript:;">1</a></li>
            </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="aside">
    <?php
      include_once './../commin/comminAside.php';
    ?>
  </div>
  <script>NProgress.done()</script>
  <script>

//      问题：
//
//      1 首页尾页需要另外再注册点击事件吗？ 不能使用text（）赋值，只能通过附加属性进行追加
//      2 当num=1 时 是不是需要其强制从第一页重新获取数据                                通过隐藏域来获取页面多少
//      3 从回调函数里传的值如何拿到外面使用，因为异步请求，只能通过回调函数来操作吗？
var num = $('#aj a').text();

$.ajax({
            url: './select.php',
            dataType:'text',
            type:'get',
            data: {
                page: num
            },
            success: function(data) {
                window.aa = data.slice(0,1);
                console.log(aa);
                var b = data.slice(1);
//                  console.log([b]);
//                  var c = '['+b;
//                  console.log(b);

                var obj = JSON.parse(b);
//                 console.log(obj);
                var html = template('tem', {obj});
                $('tbody').html(html);

            }
        })


      $('#aj a').click(function() {
          if (num > window.aa) {
              num=1;
          }
          that = this;
          $(that).text(num);



          $.ajax({
              url: './select.php',
              dataType:'text',
              type:'get',
              data: {
                  page: num
              },
              success: function(data) {
//                  console.log(data);b0, 2);
//                  console.log(a);
//                  var aa = data.slice(0,1);//已经获取到了页面最大值
                  num++;



                  var b = data.slice(1);
//                  console.log([b]);
//                  var c = '['+b;
//                  console.log(b);

                  var obj = JSON.parse(b);
//                 console.log(obj);
                  var html = template('tem', {obj});
                  $('tbody').html(html);
              }
          });


      })
  </script>
</body>
</html>
