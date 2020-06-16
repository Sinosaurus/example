
<div class="panel hots">
        <h3>热门推荐</h3>
          <?php

         /* 中点如何求num 评论数目多少 以及再添加另一张表中
          , num
          $sql = "select cmt_poseid, count(*) as num from ali_comment group by cmt_poseid";
*/

//            以
          $sql = "select * from ali_title order by tit_click desc limit 4";
          $res = mysql_query($sql);
          ?>
<ul>
    <?php while($row = mysql_fetch_assoc($res)) {?>
    <li>
        <a href="javascript:;">
            <img src="/admin/uploads/<?= $row['tit_file']?>" alt="">
            <span><?= $row['tit_title']?></span>
        </a>
    </li>
    <?php }?>
</ul>
</div>
