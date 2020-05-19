<?php
    header('content-type: text/html; charset= utf8');
    //30天前星期几
    $week = date('w', time()-3600*24*30);
    switch ($week - 1) {
        case 0:
            echo '星期天';
            break;
        case 1:
            echo '星期一';
            break;
        case 2:
            echo '星期二';
            break;
        case 3:
            echo '星期三';
            break;
        case 4:
            echo '星期四';
            break;
        case 5:
            echo '星期五';
            break;
        case 6:
            echo '星期六';
            break;
    }
