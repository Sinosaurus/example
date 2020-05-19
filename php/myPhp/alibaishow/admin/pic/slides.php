<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Slides &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">

  <script src="/assets/vendors/nprogress/nprogress.js"></script>
    <script src="/admin/template-web.js"></script>
    <script type="text/html" id="tmp">
        <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td class="text-center"><img class="slide" src="/admin/uploads/{{item.pic_path}}"></td>
            <td>{{item.text}}</td>
            <td>{{item.url}}</td>
            <td class="sta">显示</td>
            <td class="text-center">
                <a href="javascript:;" data-id="{{item.id}}" class="click btn btn-warning btn-xs">隐藏</a>
                <a href="javascript:;" data-id="{{item.id}}" class="delete btn btn-danger btn-xs">删除</a>
            </td>
        </tr>
    </script>

</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
      <?php include_once './../commin/session.php';?>
      <?php include "./../commin/nav.php";?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>图片轮播</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
        <div class="col-md-4">
          <form id="uploadForm" enctype="multipart/form-data">
            <h2>添加新轮播内容</h2>
            <div class="form-group">
              <label for="image">图片</label>
              <!-- show when image chose -->
              <img class="help-block thumbnail" style="display: none">
              <input id="image" class="form-control" name="image" type="file" accept="image/*">
            </div>
            <div class="form-group">
              <label for="text">文本</label>
              <input id="text" class="form-control" name="text" type="text" placeholder="文本">
            </div>
            <div class="form-group">
              <label for="url">链接</label>
              <input id="url" class="form-control" name="url" type="text" placeholder="链接">
            </div>
            <div class="form-group">
              <a href="javascript:;" class="btn btn-primary">添加</a>
<!--                必须修改成不能提交提交form表单的标签才可以可以修改为submit 通过在ajax中使用return false或者 e.preventDefault()-->
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
                <th class="text-center">图片</th>
                <th>文本</th>
                <th>链接</th>
                <th>状态</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
              <?php
                  $link = mysql_connect('localhost:3306', 'root', 'root');
                  mysql_query('set names utf8');
                  mysql_query('use ali');
                  $sql = "select * from ali_pic limit 3";
                  $str= mysql_query($sql);
              ?>
            <tbody>
             <?php while($row = mysql_fetch_assoc($str)) {?>
                 <tr>
                     <td class="text-center"><input type="checkbox"></td>
                     <td class="text-center"><img class="slide" src="<?= $row['pic_path']?>"></td>
                     <td><?= $row['pic_txt']?></td>
                     <td><?= $row['pic_link']?></td>
                     <td class="sta"><?= $row['pic_state'] == 1 ? '显示' : '隐藏'?></td>
                     <td class="text-center">
                         <a href="javascript:;" data-id="<?= $row['pic_id']?>" class="click btn <?= $row['pic_state'] == 1 ? 'btn-warning' : 'btn-info' ?> btn-xs"><?= $row['pic_state'] == 1 ? '隐藏' : '显示'?></a>
                         <a href="javascript:;" data-id="<?= $row['pic_id']?>" class="delete btn btn-danger btn-xs">删除</a>
                     </td>
                 </tr>
             <?php }?>
            </tbody>
          </table>
        </div>
      </div>
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
      //----------------------------------------ajax提交文件---------------------------------

      //      不用判断文件是否上传，都会有值
      $('.btn-primary').on('click', function(){
          var file = $('#image')[0].files[0];
          var fd = new FormData();
          //用来传多个参数
          fd.append('file', file);
          fd.append('text', $('#text').val());
          fd.append('url', $('#url').val());
          $.ajax({
              url: './pic-del.php',
              type: 'post',
              data:fd,//传数据的写法
              dataType: 'json',//自带解析json的方法
              success: function(data) {
//                  console.log(data);
//                  {id: 22, pic_path: "./../uploads/2018-01-20-113920-.jpg", text: "第一天", url: "春分时节"}
                  var html = template('tmp', {item: data} )
//                  console.log(html);
                  $('tbody').append(html);


              },
              //ajax 上传文件需要如此
              cache: false,
              contentType:false,
              processData: false
          })
      })

      //----------------------------------------ajax删除---------------------------------

//      给所有的删除按钮添加事件 利用ajax
      $('.delete').on('click', function() {
//          获取id
          var pic_id = $(this).data('id');
          var that = this;
          $.ajax({
              url: './delete.php',
              data: {
                  pic_id: pic_id
              },
              dataType: 'text',
              type: 'post',
              success: function(data){
                 if (data == '1') {
                     $(that).parents('tr').remove();
                 } else {
                     alert('删除失败');
                 }
              }

          })
      })

      //----------------------------------------ajax修改状态---------------------------------
      $('.click').on('click', function(){
          var id = $(this).data('id');
          var that = this;
//          状态判断
          var status = $(this).text();
          if (status == '显示') {
              status = 1;
          } else {
              status = 0;
          }
          $.ajax({
              url: './updata.php',
              type: 'post',
              dataType: 'text',
              data: {
                  id : id,
                  status: status
              },
              success: function(data) {
                  if (data == '1') {
//                      开始确定当前状态   status = 0 => '显示'    status = 1 => '隐藏'
                      if (status == 1) {
                          $(that).text('隐藏').removeClass('btn-info').addClass('btn-warning').parents('tr').find('.sta').text('显示');
                      } else {
                          $(that).text('显示').removeClass('btn-warning').addClass('btn-info').parents('tr').find('.sta').text('隐藏');

                      }
                  } else {
                      alert('修改失败');
                  }
              }
          })
      })



  </script>
</body>
</html>
