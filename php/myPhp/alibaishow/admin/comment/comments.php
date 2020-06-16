<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Comments &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<?php
include_once './../commin/session.php';

/**
 * 三表联查
 */
//ali_menber
//`menber_nickname` varchar(30) NOT NULL COMMENT '会员昵称',

//ali_comment
/*
`cmt_memid` int(10) unsigned NOT NULL COMMENT '评论人，和member中menber_id匹配',
  `cmt_content` varchar(100) NOT NULL COMMENT '评论内容',
  `cmt_userid` int(10) unsigned NOT NULL COMMENT '审核人id， 和ali_user中user_id对应',
  `cmt_poseid` int(10) unsigned DEFAULT NULL COMMENT '评论文章id， 和 ali_title中tit_id对应',
  `cmt_time` date DEFAULT NULL COMMENT '评论时间',
  `cmt_state` enum('0','1') DEFAULT '0' COMMENT '0 驳回 1 批准',*/
$link = mysql_connect('localhost', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
$sql = "select cmt_id,cmt_memid, menber_nickname, cmt_content, tit_title, cmt_time, cmt_state from ali_comment as c join ali_menber as m on c.cmt_memid = m.menber_id join ali_title as t on c.cmt_poseid = t.tit_id";
//die($sql);
$res = mysql_query($sql);

?>






<body>
  <script>NProgress.start()</script>
   <?php include_once './../commin/session.php';?>
  <div class="main">
      <?php include "./../commin/nav.php";?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有评论</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <div class="btn-batch">
          <button class="approve btn btn-info btn-sm">批量批准</button>
          <button class="btn btn-warning btn-sm">批量拒绝</button>
          <button class="btn btn-danger btn-sm">批量删除</button>
        </div>
        <ul class="pagination pagination-sm pull-right">
          <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li>
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>作者</th>
            <th>评论</th>
            <th>评论在</th>
            <th>提交于</th>
            <th>状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
        <?php while($row = mysql_fetch_assoc($res)) {?>
          <tr class="danger">

            <td class="text-center" data-com="<?= $row['cmt_id']?>"><input type="checkbox"></td>
            <td><?= $row['menber_nickname']?></td>
            <td><?= $row['cmt_content']?></td>
            <td><?= $row['tit_title'] ?></td>
            <td><?= $row['cmt_time'] ?></td>
            <td class="state"><?= $row['cmt_state'] == '1' ? '批准': '驳回'?></td>
            <td class="text-center">
              <a href="javascript:;" data="<?= $row['cmt_memid']?>" class="btnstate btn <?= $row['cmt_state'] == '1' ? "btn-warning": 'btn-info'?> btn-xs"><?= $row['cmt_state'] == '1' ? '驳回': '批准'?></a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <?php }?>

        </tbody>
      </table>
    </div>
  </div>

  <div class="aside">
    <?php
      include_once './../commin/comminAside.php';
    ?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>

  <script>
      /**
       * 对驳回 批准进行操作 使用ajax
       */
        $('.btnstate').click(function() {
            var txt = $(this).text() == '批准' ? '1' : '0';
            var that = this;

            $.ajax({
                url:'./com-update.php',
                data: {
                    id: $(that).attr('data'),
                    txt: txt
                },
                type: 'get',
                dataType: 'text',
                success: function(data) {
                    /**
                     * 11 代表成功
                     * 00 代表失败
                     */
                    if (data == '11') {
                        if ($(that).text() == '批准') {
                            $(that).removeClass('btn-info').addClass('btn-warning').text('驳回').parent().parent().find('.state').text('批准');
                        } else {
                            $(that).removeClass('btn-warning').addClass('btn-info').text('批准').parent().parent().find('.state').text('驳回');
                        }
                    } else {
                        alert('修改失败');
                    }
                }

            })
        })

      /**
       * 多项批准  approve
       * 1 找到选中项 对其每个进行更新
       * 2 id关键
       *
       */
        $('.approve').click(function(){
            var arr = [];
            $(':checkbox:checked').each(function(index, el){
                var a = $(el).parent().attr('data-com');
                arr[index] = a;
            })
            console.log(arr);
            var str = arr.join(',');
            str = '(' + str.substr(0)  +  ')';

             $.ajax({
                    url: './moreApprove.php',
                    type: 'post',
                    data: {
                        id:str
                    },
                 dataType: 'text',
                 success: function(data) {
                      if(data == 1) {
                          $(':checkbox:checked').each(function(index, el){
                              $(el).parents('.danger').find('.state').text('批准').end().find('.btnstate').text('驳回').addClass('btn-warning').removeClass('btn-info');
                          })
                      } else {
                          alert('修改失败')
                      }
                 }
             })

        })


  </script>
</body>
</html>
