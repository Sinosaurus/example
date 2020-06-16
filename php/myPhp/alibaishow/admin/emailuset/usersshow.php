<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Users &laquo; Admin</title>
  <link rel="stylesheet" href="/../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/../assets/css/admin.css">
  <script src="/../assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>
  <?php include_once './../commin/session.php';?>
  <div class="main">
      <?php include "../commin/nav.php";?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>用户</h1> <a href="./add-users.php" class="btn btn-danger btn-xs">添加</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
        <?php
            include_once './../commin/connect.php';
            connect();
        //                页面中总共有多少页

        $pagesize = 5;

        $sql = "select count(*) as num from ali_user";
        $res = mysql_query($sql);
        $arr = mysql_fetch_assoc($res);
        //            dump($arr);
        $num1 = $arr['num'];
        $pageall = ceil($num1/$pagesize);
//                    dump($pageall);







//            由于page没有传值需要默认给值


//            需要给$num限定在最大和最小之间
            $num = empty($_GET['page'])? 1 : $_GET['page'];
            $num = $num > $pageall || $num < 1 ? $num = 1 : $num;
//            $num = isset($_GET['page'])? $_GET['page'] : 1 ;
//            echo($num);
            $offset = ($num - 1 )*$pagesize;

            $sql = "select * from ali_user limit $offset, $pagesize";
            $res = mysql_query($sql);

        ?>


      <div class="row">
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
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
            <?php while($row = mysql_fetch_assoc($res) ) {?>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td class="text-center"><img class="avatar" src="<?= $row['user_pic']?>"></td>
                <td><?= $row['user_email']?></td>
                <td><?= $row['user_slug']?></td>
                <td><?= $row['user_nickname']?></td>
                <td><?= $row['user_status'] == 1     ? '显示' : '隐藏' ?></td>
                <td class="text-center">
                  <a href="./update-users.php?id=<?= $row['user_id']?>" class="btn btn-default btn-xs">编辑</a>
                  <a href="javascript:;" data-uid = "<?= $row['user_id']?>" class="deluser btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
             <?php }?>
            </tbody>
          </table>



            <ul class="pagination pagination-sm pull-right">
                <li><a href="./usersshow.php?page=1">首页</a></li>
                <li class="<?= $num == 1 ? 'hidden-lg hidden-md hidden-sm' : '' ?>">

                    <a href="./usersshow.php?page=<?= ($num - 1) <= 1 ? 1 : ($num - 1)?>">上一页</a>
                </li>


                <?php for ($i = 1; $i <= $pageall; $i++) { ?>
<!--                <li><a href="./usersshow.php?page=--><?//= $i?><!--">--><?//= $i?><!--</a></li>-->
                <li><a href="./usersshow.php?page=<?= $i.'\"'.'>'.$i?></a></li>
                <?php } ?>



                <li><a href="./usersshow.php?page=<?= ($num+ 1) >= $pageall ? $pageall : ($num + 1) ?>">下一页</a></li>

                <li><a href="./usersshow.php?page=<?= $pageall?>">尾页</a></li>


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

  <script src="/../assets/vendors/jquery/jquery.js"></script>
  <script src="/../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>


  <script>
      $('.deluser').on('click', function() {
          if (confirm('是否删除？')) {
              var id = $(this).data('uid');
//          alert(id);
              that = this;
              $.ajax({
                  url: './delete.php',
                  data: {
                      id: id
                  },
                  type: 'get',
                  dataType: 'text',
                  success: function(data) {
                      if (data == 1) {
                          $(that).parent().parent().remove();
                      } else {
                          alert('删除失败');
                      }
                  }

              })
          }

      })
  </script>
</body>
</html>
