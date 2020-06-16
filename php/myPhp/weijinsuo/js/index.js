/**
 * Created by 李龙 on 2017/12/19.
 */
$(function() {
    //工具栏提示
    $('[data-toggle="tooltip"]').tooltip()
    // 设置轮播图
    // 先创建元素
    var carousel_inner = $('.carousel-inner')[0];
    var items = $('.carousel-inner .item');

    // 通过屏幕宽度来判断.
    $(window).on('resize', function(){
        var width = $(window).width()
        // console.log(width);

        if (width > 768) {
            // 遍历item

            $(items).each(function(index, value) {
                var src = $(this).data('lageImg');
                $(this).html('<a href="javascript:;"></a>');
                $(this).find('a').css('backgroundImage', 'url('+ src+')');
            })
        } else {
            $(items).each(function(index, value) {
                var src = $(value).data('smallImg');
                // console.log(src);
                $(this).html('<a href="javascript:;"><img src="'+src+'" /></a>');
                // $(this).find('a img').css('width', '100%')
                // $(this).find('a').css('backgroundImage', 'url('+ src+')');
            })
        }

    }).trigger('resize');
    // 判断手指滑动时，图片左右滑动
    var startX, endX;
    carousel_inner.addEventListener('touchstart', function(e) {
        startX = e.targetTouches[0].clientX;
    })
    carousel_inner.addEventListener('touchend', function(e) {
        // console.log(e);
        endX = e.changedTouches[0].clientX;
        // console.log(startX,endX)
        if (endX - startX > 0) {
            $(this).carousel('prev');
        } else {
            $(this).carousel('next');

        }
    })


    //tab栏
    // 获取nav_tavbs的宽
    var nav_tabs = $('.tab .nav-tabs');
    var lis = nav_tabs.find('li');
    // 假设ul宽为哦
    var ulWidth = 0;
    // 遍历
    $(lis).each(function(index, value) {
        var liWidth = $(value).width();
        // console.log(liWidth)
        ulWidth += liWidth;
    })

    $(nav_tabs).width(ulWidth)
    // $(nav_tabs).css('overflow', 'hidden')
    // console.log(ulWidth);
    // 开始位置 结束为止
    var startX,moveX,distanceX;
    var ul = nav_tabs[0];
    // console.log(ul)
    ul.addEventListener('touchstart', function(e) {
        startX = e.targetTouches[0].clientX;
    })
    ul.addEventListener('touchmove', function(e) {
        moveX = e.targetTouches[0].clientX;
        distanceX = moveX - startX;
    })
    var myScroll = new IScroll('.scroll', {
        scrollX: true, scrollY: false
    });


})

