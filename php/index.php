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
      position: absolute;
      padding-left: 0;
      list-style: none;
      display: flex;
      margin-left: 14px;
      margin-right: 14px;
    }

    .sc-pagination__item+.sc-pagination__item {
      margin-left: 14px;
    }

    .sc-pagination__item,
    .sc-pagination__btn {
      box-sizing: border-box;
      cursor: pointer;
      padding: 6px 10px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      outline: none;
      height: 36px;
      text-decoration: none;
      color: #333;
      text-align: center;
      white-space: nowrap;
    }

    .sc-pagination__item {
      width: 36px;
    }

    .sc-pagination__btn {
      width: 80px;
      box-shadow: 0 0 8px 0 rgba(232,237,250,.6), 0 2px 4px 0 rgba(232,237,250,.5);
    }

    .sc-pagination__item.active {
      border-color: red;
      color: red;
    }
  </style>
</head>

<body>

  <?php
  // $pageSize = isset($_GET['pageSize']) ? abs((int) $_GET['pageSize']) : 1;
  $pageNum = isset($_GET['pageNum']) ? abs((int) $_GET['pageNum']) : 10;



  function createPagination($total, $current, $count = 2)
  {
    $result = array();
    $baseCount = $count * 2 + 1 + 2 + 2 + 2; // 总共元素个数
    $surplus = $baseCount - 4; //只出现一个省略号 剩余元素个数
    $startPosition = 1 + 2 + $count + 1; //前面出现省略号的临界点
    $endPosition = $total - 2 - $count - 1; //后面出现省略号的临界点
    if ($total <= $baseCount - 2) { //全部显示 不出现省略号
      for ($i = 0; $i < $total; $i++) {
        $result[] = $i + 1;
      }
    } else {
      // 需要出现省略号
      if ($current < $startPosition) { //1.只有后面出现省略号
        for ($i = 0; $i < $surplus; $i++) {
          $result[] = $i + 1;
        }
        $result[] = '...';
        $result[] = $total;
      } else if ($current > $endPosition) { //2.只有前边出现省略号
        $result[] = 1;
        $result[] = '...';
        for ($i = 0; $i < $surplus; $i++) {
          $result[] = $total - $surplus + $i + 1;
        }
      } else { //3.两边都有省略号
        $result[] = 1;
        $result[] = '...';
        for ($i = 0; $i < $count * 2 + 1; $i++) {
          $result[] = $current - $count + $i;
        }
        $result[] = '...';
        $result[] = $total;
      }
    }
    return $result;
  };

  $current = $pageNum;
  $total = 20;
  $pagination = createPagination($total, $current);
  $count = count($pagination); ?>
  <!-- 
    上一页，下一页

    需要判断 是否显示

   -->
  <div class="sc-pagination">
    <a class="sc-pagination__btn" href="http://localhost?pageNum=<?php echo $current - 1 <= 1 ? 1 : $current - 1; ?>">
      上一页
    </a>
    <div style="position: relative; overflow-x: auto;height: 36px;">
      <div class="sc-pagination__container">
        <?php foreach ($pagination as $key => $item) { ?>
          <a href="http://localhost?pageNum=<?php echo $item === '...' ? $key == 1 ? $current - 5 : $current + 5 : $item; ?>" class="sc-pagination__item <?php echo $current == $item ? 'active' : ''; ?>" data-type="<?php echo $count == 9 && $item == '...' ? $key == 1 ? 'left' : ($key == 7 ? 'right' : '') : ''; ?>">
            <?php echo $item; ?>
          </a>
        <?php }; ?>
      </div>
    </div>
    <a class="sc-pagination__btn" href="http://localhost?pageNum=<?php echo $current + 1 >= $total ? $total : $current + 1; ?>">
      下一页
    </a>  
  </div>
  <script>
    // 这块可以尝试用 hover 来替换掉
    document.addEventListener('DOMContentLoaded', function() {

      const container = document.querySelector('.sc-pagination__container')
      // const leftAndRightBtn = document.querySelector('.sc-pagination__btn')
      // console.dir(container.c)
      container.parentNode.style.width = container.clientWidth + 30 + 'px'
      container.addEventListener('mouseover', function(e) {
        const {
          type
        } = e.target.dataset
        if (type === 'left') e.target.innerText = '<'
        if (type === 'right') e.target.innerText = '>'
      }, false)
      container.addEventListener('mouseout', function(e) {
        const {
          type
        } = e.target.dataset
        if (type === 'left' || type === 'right') e.target.innerText = '...'
      }, false)
    }, false)
  </script>
</body>

</html>