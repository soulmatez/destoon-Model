<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="nav_mu">
<div class="wrap">
<div class="fl cat_nav">
<div class="cat_mall"><i></i>热门产品行业</div>
<!--左侧分类-->
<div class="category_new">
<ul>
<!-- 左侧产品列表 -->
<?php $tags=tag("table=category&condition=moduleid=16 and level=1&pagesize=14&order=catid asc&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $key => $val) { ?>
<li class="cate-item">
<div class="cate-con">
<i class="icon icon-<?php echo $key+1;?>"></i>
<a href="/<?php echo $MODULE['16']['module'];?>/bussness.p hp?catid=<?php echo $val['catid'];?>" title="<?php echo $val['catname'];?>" target="_blank" data-scode="831"><?php echo $val['catname'];?></a> <i
class="icon_s arrow"></i>
</div>
<div class="cate-more">
<div class="cm-left">
<div class="cm-head"><a href="/<?php echo $MODULE['16']['module'];?>/bussness.php?catid=<?php echo $val['catid'];?>" target="_blank" class="cm-more">点击更多</a><i
class="icon icon-v<?php echo $key+1;?>"></i><a href="/<?php echo $MODULE['16']['module'];?>/bussness.php?catid=<?php echo $val['catid'];?>" target="_blank" title="<?php echo $val['catname'];?>"
data-scode="831"><?php echo $val['catname'];?></a></div>
<div class="cm-main">
<?php $tags1=tag("table=category&condition=parentid='".$val['catid']."' and level=2&order=catid asc&template=null");?>

<?php if(is_array($tags1)) { foreach($tags1 as $key1 => $val1) { ?>
<div class="cm-row">
<div class="cm-name"><a href="/<?php echo $MODULE['16']['module'];?>/comlist.php?catid=<?php echo $val1['catid'];?>" title="<?php echo $val1['catname'];?>" target="_blank"><?php echo $val1['catname'];?></a></div>
<ul class="cm-list">
<?php $tags2=tag("table=category&condition=parentid='".$val1['catid']."' and level=3&order=catid asc&template=null");?>

<?php if(is_array($tags2)) { foreach($tags2 as $key2 => $val2) { ?>
<li><a href="/<?php echo $MODULE['16']['module'];?>/goodlist.php?catid=<?php echo $val2['catid'];?>" title="<?php echo $val2['catname'];?>" target="_blank"><?php echo $val2['catname'];?></a></li>
<?php } } ?>
</ul>
</div>
<?php } } ?>
</div>
</div>
<div class="cm-right">
<ul>
<!--对应当前分类的公司推荐1-->

<li>
<?php $tags3=tag("table=mall_16&condition=mycatid='".$val['catid']."' and level=4&pagesize=3&group=brand&order=catid asc&template=null");?>
<?php if(is_array($tags3)) { foreach($tags3 as $key3 => $val3) { ?>
<div class="cm-cpy">
<h2><a href="/<?php echo $MODULE['16']['module'];?>/prolist.php?comname=<?php echo $val3['brand'];?>" target="_blank"><?php echo dsubstr($val3['brand'], 25, '...');?></a>

</h2>


<p class="cm-tag">
<?php $tags4=tag("table=mall_16&condition=brand='".$val3['brand']."' and mycatid='".$val['catid']."' and level=4&pagesize=6&order=itemid asc&template=null");?>
<?php if(is_array($tags4)) { foreach($tags4 as $key4 => $val4) { ?>
<a href="/<?php echo $MODULE['16']['module'];?>/show.php?itemid=<?php echo $val4['itemid'];?>" target="_blank" title="<?php echo dsubstr($val4['title'], 12, '...');?>"><?php echo dsubstr($val4['title'], 12, '...');?></a>
<?php } } ?>
</p>
</div>
<?php } } ?>
</li>

</ul>
</div>
</div>
</li>
<?php } } ?>

</ul>
</div>
</div>
<ul class="nav-mu-li fl">

<li class="muli d1"><a href="/" target="_blank" class="hover">首页</a></li>
<?php $menuArray = ['16','5','6','17','8','21','22','13','9','10','11','18'];?>
<?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?>
<?php if($m['ismenu'] && !$m['islink'] && in_array($m['moduleid'],$menuArray,true)) { ?>
<li class="muli d16 <?php if($m['moduledir']== 'mall' || $m['moduledir']== 'buy' || $m['moduledir']== 'exhibit' || $m['moduledir']== 'job') { ?>pr<?php } ?>">
<a href="/<?php echo $m['moduledir'];?>"><?php echo $m['name'];?></a>
<?php if($m['moduledir']== 'mall' || $m['moduledir']== 'buy') { ?>
<div class="icon-hot"></div>
<?php } ?>
<?php if($m['moduledir']== 'exhibit' || $m['moduledir']== 'job') { ?>
<div class="icon-new"></div>
<?php } ?>
</li>
<?php } ?>
<?php } } ?>
</ul>
</div>
<div class="clearfix"> </div>
</div>