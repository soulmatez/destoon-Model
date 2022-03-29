<?php defined('IN_DESTOON') or exit('Access Denied');?><!-- 公共header -->
<?php include template('header', 'common');?>
<!-- 公共header -->
<!-- 新加入css 叠加样式 -->
<link rel="stylesheet" href="<?php echo DT_SKIN;?>/static/css/other.css" type="text/css" />
<!-- 新加入css 叠加样式 -->
<!-- 公共导航菜单 -->
<?php include template('topmenu', 'common');?>
<!-- 公共导航菜单 -->
<!-- 公共轮播图 -->
<?php include template('banner', 'common');?>
<!-- 公共轮播图 -->
<!--广告位one-->
<?php $tags=tag("table=ad&condition=pid=26 and status=3 and title='one'&pagesize=1&order=edittime asc&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $key => $val) { ?>
<div class="wrap">
<div class="rel aag-90"><img src="<?php echo $val['image_src'];?>" width="1200" height="90" alt="" />
<!--i class="icon_tg"></i-->
<div class="adicon">广告</div>
</div>
</div>
<?php } } ?>
<script type="text/javascript" src="<?php echo DT_SKIN;?>/static/js/xhindexlou1.js"></script>

<!-- 主题部分开始 -->
<?php $catid = $_GET['catid'];?>

<?php $tags=tag("table=category&condition=catid='".$catid."' and level=2&template=null");?>

<!-- 获取父id -->
<?php $parent=tag("table=category&condition=catid='".$tags['0']['parentid']."' and level=1&template=null");?>
<?php $parentid = $parent['0']['catid'];?>


<?php if(is_array($tags)) { foreach($tags as $key => $val) { ?>
<div class="wrap main" id="ixh-01">
<div class="m-head clearfix">
<div class="m-txt">
<h2 class="fl"><a  target="_blank" le="<?php echo $val['catname'];?>"><?php echo $val['catname'];?></a></h2>
</div>
<div class="txt-hot fr">
<a  class="m-more" title="<?php echo $val['catname'];?>" target="_blank">更多</a>
</div>
</div>
<div class="main-body clearfix">
<div class="m-left lou1">
<!--楼层左侧幻灯3张广告位180x260-->
<div class="f-slide js-slide buy-the-card">
<a href="" target="_blank" class="buy-btn">预订此位<span
class="iconfont icon-angle-double-right"></span></a>
<ul class="stack-slide">
<?php $tags1=tag("table=ad&condition=introduce='".$parentid."' and note=1 and status=3&pagesize=3&order=addtime asc&template=null");?>
<?php if(is_array($tags1)) { foreach($tags1 as $key1 => $val1) { ?>
<li class="slide-item active"><a href="###" class="u-img" target="_blank">
<img src="<?php echo $val1['image_src'];?>" alt="<?php echo $val1['title'];?>">
<div class="slide-name"><?php echo $val1['title'];?></div>
</a></li>
<?php } } ?>
</ul>
<a href="javascript:;" class="btn_hda prev" id="prev"></a>
<a href="javascript:;" class="btn_hda next" id="next"></a>
<div class="points"><a href="javascript:;" class="blue"><i></i></a><a
href="javascript:;"><i></i></a><a href="javascript:;"><i></i></a></div>
</div>
</div>
<div class="m-right two">
<div class="mr-top clearfix">
<div class="mrt-brand">
<div class="mrtb-tit"><span class="fr"><?php echo $val['catname'];?>实力工厂</span><i class="icon-redbar"></i>推荐企业
</div>
<div class="mrtb-con">
<!-- 获取二级分类下面的分类，拿到id -->
<?php $children=tag("table=category&condition=parentid='".$val['catid']."' and level=3&order=catid asc&template=null");?>
<?php 
$childarray = [];
foreach($children as $childVal){
$childarray[] = $childVal['catid']; 
}
// 将子id变成字符串
$idChildStr = implode(',',$childarray);
$result = $db->query("select * from ".$DT_PRE."mall_16 where catid in(".$idChildStr.") and level=4 group by brand order by catid asc limit 6");
while($r = $db->fetch_array($result)) {
$tags44[] = $r;
}
?>



<!--最新当前分类下的推荐1公司-->
<div class="list_mark">
<?php for($i=0;$i<count($tags44)/2;$i++){ ?>
<li class="active"></li>
<?php }?>
</div>

<?php for($i=0;$i<count($tags44)/2;$i++){ ?>
<ul class="mrtb-list" style="display: block;">
<?php foreach($tags44 as $key44 => $val44){
$n = $key44%2 == 0 ? $key44/2 : ($key44-1)/2;
if($n == $i){?>
<div class="mrtb-name <?php if($key44 % 2==1) echo 'nobtm';?>">
<h2><a href="/<?php echo $MOD['module'];?>/prolist.php?comname=<?php echo $val44['brand'];?>" target="_blank"
title="<?php echo $val44['brand'];?>"><?php echo $val44['brand'];?></a></h2>

<?php $user=tag("table=company&condition=company='".$val44['brand']."'&template=null");?>
<?php if($user['0']['vip']) { ?>
<div class="mrtb-tag"><span title=""><i
class="icon icon-vip"></i><em class="fl v-year"><?php echo $user['0']['vip'];?></em></span>
</div>
<?php } ?>

<p class="mrtb-a clearfix">
<span>产品：</span>
<?php $tags5=tag("table=mall_16&condition=brand='".$val44['brand']."' and level=4&pagesize=5&order=itemid asc&template=null");?>
<?php if(is_array($tags5)) { foreach($tags5 as $key5 => $val5) { ?>
<a href="/<?php echo $MODULE['16']['module'];?>/<?php echo $val5['linkurl'];?>" target="_blank" title="<?php echo dsubstr($val5['title'], 50, '...');?>"><?php echo dsubstr($val5['title'], 50, '...');?></a>
<?php } } ?>
</p>
</div>
<?php } }?>
</ul>
<?php }?>

</div>
</div>

</div>
</div>

<!--推荐产品S-->
<div class="wen clearfix two">
<div class="mrtb-tit"><span class="fr">相关产品</span><i class="icon-redbar"></i><?php echo $val['catname'];?> · 相关产品
</div>
<div class="maxch">
<?php
$result = $db->query("select * from ".$DT_PRE."mall_16 where catid in(".$idChildStr.") and level=4 order by catid asc limit 6");
while($r = $db->fetch_array($result)) {
$tags66[] = $r;
}
?>
<?php if(is_array($tags66)) { foreach($tags66 as $key6 => $val6) { ?>
<div class="mrbch">
<div class="mrb"> 
<a href="" title="" target="_blank">
<img alt="" src="<?php echo $val6['thumb'];?>" class="lazy" style="display: inline;">
</a> 
</div>
<p class="tit"><a href="" title="<?php echo $val6['title'];?>" target="_blank"><?php echo $val6['title'];?></a></p>
<p class="mprice">面议</p>
</div>
<?php } } ?>

<div style="clear: both;">

</div>
</div>
</div>


</div>
</div>
<?php } } ?>


<!-- 按照省份、分类 -->
<?php include template('area', 'common');?>
<!-- 按照省份分类 -->

<!-- 按照其他类目分类 -->
<?php include template('cate', 'common');?>
<!-- 按照其他类目分类 -->

<div class="m-head borderno clearfix wrap" id="font">
<!-- 引入公共部字母分类 -->
<?php include template('font', 'common');?>
<!-- 引入公共部字母分类 -->
</div>

<!--12友情链接-->
<div class="wrap" id="friendly">
<!-- 引入公共部友情链接 -->
<?php include template('friendly', 'common');?>
<!-- 引入公共部友情链接 -->
</div>
<!--友情链接E-->


<!-- 主题部分结束 -->
<!-- 右侧导航 -->
<?php include template('siderbar-right', 'common');?>
<!-- 右侧导航 -->
<!-- 公共底部 -->
<?php include template('footer', 'common');?>
<!-- 公共底部 -->