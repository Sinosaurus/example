<!--
 * @LastEditors: Sinosaurus
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pagination</title>
  <style>
    .sc-pagination {
      max-width: 1000px;
      margin: auto;
      display: flex;
      align-items: center;
    }
    .sc-pagination__container {
      padding-left: 0;
      list-style: none;
      display: flex;
      margin-left: 14px;
      margin-right: 14px;
    }
    .sc-pagination__item + .sc-pagination__item {
      margin-left: 14px;
    }
    .sc-pagination__item,
    .sc-pagination__btn {
      cursor: pointer;
    }
    .sc-pagination__item button,
    .sc-pagination__btn button {
      padding: 6px 10px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      outline: none;
    }
    .sc-pagination__item button.active,
    .sc-pagination__btn button.active {
      border-color: red;
      color: red;
    }
    .sc-pagination__item.ellipsis button{
      width: 33px;
    }
  </style>
</head>
<body>
  <div class="sc-pagination">
    <div class="sc-pagination__btn">
      <a href="">
        <button>上一页</button>
      </a>
    </div>
    <?php 
      function createPagination($total, $current, $count = 2) {
        $result = Array();
        $baseCount = $count * 2 + 1 + 2 + 2 + 2; //总共元素个数
        $surplus = $baseCount - 4; //只出现一个省略号 剩余元素个数
        $startPosition = 1 + 2 + $count + 1;//前面出现省略号的临界点
        $endPosition = $total - 2 - $count - 1;//后面出现省略号的临界点
        if ($total <= $baseCount - 2) { //全部显示 不出现省略号
          $result = Array.from({ length: total }, (v, i) => i + 1);
        } else { //需要出现省略号
          if ($current < $startPosition) { //1.只有后面出现省略号
            $result = [...Array.from({ length: $surplus }, (v, i) => i + 1), "...", $total]
          } else if ($current > $endPosition) { //2.只有前边出现省略号
            $result = [1, '...', ...Array.from({ length: $surplus }, (v, i) => $total - $surplus + i + 1)]
          } else { //3.两边都有省略号
            $result = [1, '...', ...Array.from({ length: $count * 2 + 1 }, (v, i) => $current - $count + i), '...', $total]
          }
        }
        return $result
      }
    ;?>
    <ul class="sc-pagination__container">
      <!-- <li class="sc-pagination__item"><a href="javascript:;"><button class="active">1</button></a></li>
      <li class="sc-pagination__item"><a href="javascript:;"><button>2</button></a></li>
      <li class="sc-pagination__item"><a href="javascript:;"><button>3</button></a></li>
      <li class="sc-pagination__item"><a href="javascript:;"><button>4</button></a></li>
      <li class="sc-pagination__item ellipsis"><a href="javascript:;"><button>...</button></a></li>
      <li class="sc-pagination__item"><a href="javascript:;"><button>6</button></a></li>
      <li class="sc-pagination__item"><a href="javascript:;"><button>7</button></a></li>
      <li class="sc-pagination__item"><a href="javascript:;"><button>8</button></a></li>
      <li class="sc-pagination__item"><a href="javascript:;"><button>9</button></a></li> -->
    </ul>
    <div class="sc-pagination__btn">
      <a href="">
        <button>下一页</button>
      </a>
    </div>
  </div>
  <script type="module" src="index.js"></script>
</body>
</html>