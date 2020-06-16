<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Users &laquo; Admin</title>
  <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <script src="../../assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>
  <?php include_once './../commin/session.php';?>
  <div class="main">
      <?php include "../commin/nav.php";?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>用户</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
        <?php
            $link = mysql_connect('localhost:3306', 'root', 'root' );
            mysql_query('set names utf8');
            mysql_query('use ali');
            $id = $_GET['id'];
            $sql ="select * from ali_user where user_id = $id";
            $res = mysql_query($sql);
            $arr = mysql_fetch_assoc($res);
//            print_r($arr);
        ?>

      <div class="row">
        <div class="col-md-4">
          <form action="./update-deal.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $arr['user_id']?>" id="hid">
            <h2>添加新用户</h2>
            <div class="form-group">
              <label for="email">邮箱</label>
              <input id="email" class="form-control" name="email" type="email" placeholder="邮箱" value="<?= $arr['user_email']?>" required>
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug" value="<?= $arr['user_slug']?>" required>
            </div>
            <div class="form-group">
              <label for="nickname">昵称</label>
              <input id="nickname" class="form-control" name="nickname" type="text" placeholder="昵称" value="<?= $arr['user_nickname']?>"  required>
            </div>


<!--              密码-->
            <div class="form-group">
              <label for="olpassword">旧密码</label>
              <input id="olpassword" class="form-control" name="password" type="text" placeholder="密码" required>
            </div>
              <div class="form-group">
                  <label for="nepassword">新密码1</label>
                  <input id="nepassword" class="form-control" name="password" type="password" required>
              </div>
              <div class="form-group">
                  <label for="npassword">新密码2</label>
                  <input id="npassword" class="form-control" name="password" type="password" required>
              </div>
<!--              密码-->

            <div class="form-group">
                  <label for="status">状态</label>&emsp;
                  <input id="status1" name="status" type="radio" value=1 <?= $arr['user_status'] == 1 ? 'checked' : ''?> >显示
<!--                  <input id="slug"  name="status" type="radio" value=1 checked>使用-->
                  <input id="status2" name="status" type="radio" value=0  <?= $arr['user_status'] == 0 ? 'checked' : ''?> >隐藏
              </div>
            <div class="form-group">
              <button class="btt btn btn-primary" type="submit">修改</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="aside">
    <?php
      include_once './../commin/comminAside.php';
      mysql_close($link);
    ?>
  </div>

  <script src="/../assets/vendors/jquery/jquery.js"></script>
  <script src="/../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script>
//      利用ajax来判断旧密码是否与之前存的密码相同
        $('#olpassword').on('blur', function(){
//            alert(1);
            that = this;
            $.ajax({
                url: './ajax-deal.php',
                data: {
                    id: $('#hid').val(),
                    pass: $(that).val()
                },
                dataType:'text',
                success: function(data) {
                    console.log(data);
                    if ( data != 1) {
                        alert(1);
                        $('.btt').attr('type', 'buttom').text('无法提交');
                    } else {
                        $('.btt').attr('type', 'submit').text('修改');
                    }
                }
            })
        })
//      输入的新密码两次是否相同，可以使用ajax请求，第一次的值存在一个处理页面中，之后两次进行对比
       /* $('#nepassword').on('blur', function() {
            that = this;
            $.ajax({
                url: 'ajax-newpass.php',
                data: {
                    id: $('#hid').val(),
                    pass_one: $(that).val()
                },
                type: 'get'
            })
        })


        $('#npassword').on('blur', function() {
            that = this;
            $.ajax({
                url: 'ajax-newpass.php',
                data: {
                    id: $('#hid').val(),
                    pass_two: $(that).val()
                },
                type: 'post',
                dataType: 'text',
                success: function(data) {
                    console.log(data);
                }
            })
        })*/
     /*  $('#npassword').on('blur', function() {
           var a = $('#nepassword').val();

           var b = $(this).val();
           if (a !== b) {
               alert('两次不同');
           }
       })*/


  </script>
</body>
</html>
