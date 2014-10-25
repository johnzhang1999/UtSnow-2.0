<center>
<script type="text/javascript">  
/** 
 * 回到页面顶部 
 * @param acceleration 加速度 
 * @param time 时间间隔 (毫秒) 
 **/  
function goTop(acceleration, time) {  
    acceleration = acceleration || 0.1;  
    time = time || 16;  
   
    var x1 = 0;  
    var y1 = 0;  
    var x2 = 0;  
    var y2 = 0;  
    var x3 = 0;  
    var y3 = 0;  
   
    if (document.documentElement) {  
        x1 = document.documentElement.scrollLeft || 0;  
        y1 = document.documentElement.scrollTop || 0;  
    }  
    if (document.body) {  
        x2 = document.body.scrollLeft || 0;  
        y2 = document.body.scrollTop || 0;  
    }  
    var x3 = window.scrollX || 0;  
    var y3 = window.scrollY || 0;  
   
    // 滚动条到页面顶部的水平距离  
    var x = Math.max(x1, Math.max(x2, x3));  
    // 滚动条到页面顶部的垂直距离  
    var y = Math.max(y1, Math.max(y2, y3));  
   
    // 滚动距离 = 目前距离 / 速度, 因为距离原来越小, 速度是大于 1 的数, 所以滚动距离会越来越小  
    var speed = 1 + acceleration;  
    window.scrollTo(Math.floor(x / speed), Math.floor(y / speed));  
   
    // 如果距离不为零, 继续调用迭代本函数  
    if(x > 0 || y > 0) {  
        var invokeFunction = "goTop(" + acceleration + ", " + time + ")";  
        window.setTimeout(invokeFunction, time);  
    }  
}   
</script>  
<a href="#" onclick="goTop();return false;">TOP</a>
</center>
<hr>
      <footer>
        <center>
		<p>2014 &copy; Copyright <a href="<?php bloginfo(’url’); ?>"><?php bloginfo(’name’); ?></a> | Proudly powered by <a href="https://wordpress.org/" target="_blank">Wordpress</a> | Theme by <a href="http://johnzhang.cn/" target="_blank">John Zhang</a> | 共<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?>篇日志
		</p>
		</center>
	  </footer>

    </div> <!-- /container -->

      <?php wp_footer(); ?>

  </body>
  <script type="text/javascript" src="http://www.youziku.com/UserDownFile/webfont.js"></script> 
<script type="text/javascript">
    WebFont.load({
        custom: {
            urls: ['http://www.youziku.com/webfont/CSS/3f887562e3c76536ac889d4c52cc0608']
        }
    }); </script>
</html>
