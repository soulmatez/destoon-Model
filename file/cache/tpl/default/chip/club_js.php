<?php defined('IN_DESTOON') or exit('Access Denied');?><script type="text/javascript">
var h = '';
h += '<div class="submenu">';
h += '<div></div><ul>';
h += '<li id="sub_"><a href="?mid=<?php echo $mid;?>">我的帖子</a></li>';
h += '<li id="sub_group"><a href="?mid=<?php echo $mid;?>&job=group">我的商圈</a></li>';
h += '<li id="sub_reply"><a href="?mid=<?php echo $mid;?>&job=reply">我的回复</a></li>';
h += '<li id="sub_join"><a href="?mid=<?php echo $mid;?>&job=join">加入商圈</a></li>';
h += '<li id="sub_fans"><a href="?mid=<?php echo $mid;?>&job=fans">粉丝管理</a></li>';
h += '<li id="sub_manage"><a href="?mid=<?php echo $mid;?>&job=manage">商圈管理</a></li>';
h += '</ul></div>';
$('#submenu').html(h);
$('.submenu div').html($('#sub_<?php echo $job;?> a').html());
$('#sub_<?php echo $job;?>').hide()
$('.submenu').mouseover(function(){
$('.submenu ul').show(100);
$('.submenu').bind('mouseleave',function(){
$('.submenu ul').hide();
});
});
</script>