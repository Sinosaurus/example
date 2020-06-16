<?php
/**
 * 从数据库中获取nav的类型
 */
$link = mysql_connect('localhost:3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
$sql = "select * from categories";
$res = mysql_query($sql);



?>

<div class="topnav">
    <ul>
        <?php while($row = mysql_fetch_assoc($res)) {?>
            <li><a href="/list.php?id=<?= $row['cate_id']?>"><i class="fa <?= $row['cate_class']?>"></i><?= $row['cate_name']?></a></li>
        <?php }?>
    </ul>
</div>

<div class="header">

    <?php
    /**
     * 从数据库中获取nav的类型
     */
    /*$link = mysql_connect('localhost:3306', 'root', 'root');
    mysql_query('set names utf8');
    mysql_query('use ali');*/
    $sql = "select * from categories"; //还是将所有显示出来
    $res = mysql_query($sql);



    ?>
    <h1 class="logo"><a href="index.php"><img src="assets/img/logo.png" alt=""></a></h1>
    <ul class="nav">
        <?php while($row = mysql_fetch_assoc($res)) {?>
        <li><a href="/list.php?id=<?= $row['cate_id']?>"><i class="fa <?= $row['cate_class']?>"></i><?= $row['cate_name']?></a></li>
        <?php }?>
    </ul>
    <div class="search">
        <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
        </form>
    </div>
    <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
    </div>
</div>
<div class="aside">
    <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
            <form>
                <input type="text" class="keys" placeholder="输入关键字">
                <input type="submit" class="btn" value="搜索">
            </form>
        </div>
    </div>
    <div class="widgets">
        <h4>随机推荐</h4>
        <?php
        /**
         * 从数据库中随机获取五条数据
         * 用到 order by （将数据库数据打乱） rand（） 数据库 中的函数  随机  只能获取五条
         */
        $sql = "select * from ali_title order by rand() limit 5";
        $res = mysql_query($sql);


        ?>
        <ul class="body random">
            <?php while($row = mysql_fetch_assoc($res)) {?>
            <li>
                <a href="javascript:;">
                    <p class="title"><?= $row['tit_title']?></p>
                    <p class="reading">阅读(<?= $row['tit_click']?>)</p>
                    <div class="pic">
                        <img src="/admin/upload/<?= $row['tit_file']?>" alt="">
                    </div>
                </a>
            </li>
            <?php }?>
        </ul>
    </div>

    <?php
    /**
     * 最新评论
     */
//         条件  cmt_state = 1 批准
//    cmt_memid = menber_id
    $sql = "select menber_nickname, cmt_time, cmt_content from ali_comment as c join ali_menber as m on c.cmt_memid = m.menber_id where cmt_state = 1 limit 5";
     $res = mysql_query($sql);
     function cha($var) {
         $day   = date('m', time());
         $old   = substr($var, 5, 2);

//         echo $old; 由于将时间写后只好如此做了
         $value = intval($old, 10) -  intval($day, 10);
         echo $value;
     }

    ?>


    <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
            <?php while($row = mysql_fetch_assoc($res)) {?>
            <li>
                <a href="javascript:;">
                    <div class="avatar">
                        <img src="uploads/avatar_1.jpg" alt="">
                    </div>
                    <div class="txt">
                        <p>
                            <span><?= $row['menber_nickname']?></span><?php cha($row['cmt_time'])?>个月前(<?= trim(strchr($row['cmt_time'], '-'),'-') ?>)说:
                        </p>
                        <p><?= $row['cmt_content']?></p>
                    </div>
                </a>
            </li>
            <?php }?>

        </ul>
    </div>
</div>