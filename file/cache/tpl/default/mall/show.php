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
<!-- 主题部分开始 -->
<script type="text/javascript" src="<?php echo DT_SKIN;?>/static/js/xhindexlou1.js"></script>

<div class="wrap main" id="ixh-01">
<?php $tags5=tag("table=mall_16&condition=brand='".$val44['brand']."' and level=4&pagesize=5&order=itemid asc&template=null");?>
<div class="m-head clearfix">
<div class="m-txt">
<h2 class="fl"><a href="" target="_blank" le="<?php echo $title;?>"><?php echo $title;?>
</a></h2>
</div>
<div class="txt-hot fr">
<a href="" class="m-more" title="<?php echo $title;?>" target="_blank">返回</a>
</div>
</div>
<div class="main-body clearfix flex">

<div class="m-right two three">
<div class="mr-top clearfix">
<div class="mrt-brand">
<div class="mrtb-tit"><span class="fr"></span><i class="icon-redbar"></i><?php echo $brand;?> · 产品详情
</div>
<div class="mrtb-con product">
<div class="m-left lou1">
<!--楼层左侧幻灯3张广告位180x260-->
<div class="f-slide js-slide buy-the-card">
<ul class="stack-slide">
<?php if(is_array($thumbs)) { foreach($thumbs as $k => $v) { ?>
<li class="slide-item active"><a href="###" class="u-img" target="_blank">
<img src="<?php echo $v;?>" alt="<?php echo $k;?>">
</a></li>
<?php } } ?>
</ul>
<a href="javascript:;" class="btn_hda prev" id="prev"></a>
<a href="javascript:;" class="btn_hda next" id="next"></a>
<div class="points"><a href="javascript:;" class="blue"><i></i></a><a
href="javascript:;"><i></i></a><a href="javascript:;"><i></i></a></div>
</div>
</div>

<div class="m-right lou2">
<h1 id="title"><?php echo $title;?></h1>
<div id="big_div" style="display:none;"><img src="" id="big_pic" /></div>
<p class="proprice"><i>产品价格</i><span>
<font><em>￥</em><?php echo $price;?><em>元/台</em></font>
</span></p>
<p><i>产品品牌</i><?php echo $brand;?></p>
<p><i>最小起订</i>≥1 台</p>
<p><i>供货总量</i><?php echo $amount;?> 台</p>
<p><i>发货期限</i>自买家付款之日起 <span class="f_b f_orange">3</span> 天内发货</p>
<p><i>浏览次数</i><span id="hits"><?php echo $hits;?></span></p>

<!-- 分享和举报 -->
<div class="proShare">
<!-- 收藏商品 -->
<a class="proSave px12" href="javascript:void(0)" title="收藏商品"
onclick="SendFav(<?php echo $moduleid;?>, <?php echo $itemid;?>);"> 收藏商品</a>
<!-- 分享 -->
<div class="bdsharebuttonbox bdshare-button-style0-16"> <a href="javascript:;"
class="bds_more px12" title="分享" onclick="Dshare(<?php echo $moduleid;?>, <?php echo $itemid;?>);">分享</a>
</div>

<!-- 举报 -->
<a class="reportBtn px12" href="javascript:void(0)" title="举报" target="_self"
onclick="SendReport(<?php echo $moduleid;?>, <?php echo $itemid;?>);"> 举报</a>
</div>
</div>
</div>
</div>

</div>
</div>


<?php if($user_status == 3) { ?>
<div class="m-left lou1 contact proRight">
<div class="mrtb-tit" style="padding: 0;"><span class="fr"></span><i class="icon-redbar"></i>联系我们
</div>
<?php if($member) { ?>
<div id="contact">
<div class="companyName">
<h3><?php echo $member['company'];?></h3>
<div class="jwsy"><a href="<?php echo $MODULE['2']['linkurl'];?>friend.php?action=add&username=<?php echo $member['username'];?>" class="jwsy1" rel="nofollow">+ 加为商友</a> 
<a href="<?php echo $MODULE['2']['linkurl'];?>message.php?action=send&touser=<?php echo $member['username'];?>" class="jwsy2" rel="nofollow">发送信件</a>
<font class="jwsy3"><?php if(online($member['userid'])==1) { ?><font>当前在线</font><?php } else { ?>当前离线<?php } ?></font>
</div>
</div>
<?php if($member['vip']) { ?>
<p class="mt10" style="position: relative;"><i>会员级别：</i>
<font class="level_bg"><span title="VIP会员"><i class="icon icon-vip"></i><em
class="fl v-year product"><?php echo $member['vip'];?></em><em class="fl vip-name">VIP会员</em></span></font>
</p>
<?php } ?>
<?php if($member['deposit']) { ?>
<p class="px12"><i>已缴纳：</i><strong class="f_red"><?php echo $member['deposit'];?></strong> 元保证金</p>
<?php } ?>
<p class="px12"><i>我的勋章：</i> 
<?php if($member['vcompany']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_company.gif" width="16" height="16" align="absmiddle" title="通过工商认证"/><?php } ?>
<?php if($member['vtruename']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_truename.gif" width="16" height="16" align="absmiddle" title="通过实名认证"/><?php } ?>
<?php if($member['vbank']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_bank.gif" width="16" height="16" align="absmiddle" title="通过银行帐号认证"/><?php } ?>
<?php if($member['vmobile']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_mobile.gif" width="16" height="16" align="absmiddle" title="通过手机认证"/><?php } ?>
<?php if($member['vemail']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_email.gif" width="16" height="16" align="absmiddle" title="通过邮件认证"/><?php } ?>
<?php if($member['validated']) { ?>&nbsp;<img src="<?php echo DT_STATIC;?>file/image/check-ok.png" align="absmiddle"/> 通过<?php echo $member['validator'];?>认证<?php } ?>
<a href="<?php echo userurl($member['username'], 'file=credit');?>" target="_blank">[诚信档案]</a></p>
<p><i>在线客服：</i>
<?php if($member['username'] && $DT['im_web']) { ?><?php echo im_web($member['username'].'&mid='.$moduleid.'&itemid='.$itemid);?>&nbsp;<?php } ?>
<a onclick="msg(0,'暂未开放该功能!')" target="_blank" rel="nofollow">
   <img src="http://amos.alicdn.com/online.aw?v=2&uid=bydkj88&site=cnalichn&s=6&charset=UTF-8"
title="点击旺旺交谈/留言" alt="" align="absmiddle"
onerror="this.src=DTPath+'file/image/ali-off.gif';"
onload="if(this.width>20)this.src=SKPath+'image/ali-off.gif';" /></a> 
</p>
<!-- 企业二维码 -->

<!-- 公司信息 -->
<div class="companyInfo">
<a class="website px12" onclick="msg(0,'店铺暂未开放!')" title="进入店铺" target="_blank" rel="nofollow">进入店铺</a>
<a class="introduce px12" onclick="openbox('<?php echo $member['business'];?>')" title="公司介绍" target="_blank">公司介绍</a>
<a class="position px12" onclick="openbox('<?php echo $member['address'];?>')" title="公司地址" target="_blank">公司地址</a>
<a class="infos px12" onclick="openbox('<?php echo $content;?>')" title="<?php echo $item;?>产品信息" target="_blank">产品信息</a>
</div>
<!-- 联系企业 -->
<div class="contactUs">
<a class="contact" onclick="openbox('<?php echo $member['telephone'];?>')" target="_blank">联系我们</a>
<a class="inquiry" target="_blank" href="<?php echo $MODULE['2']['linkurl'];?>chat.php?touser=<?php echo $member['username'];?>&mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>" title="在线询价">在线询价</a>
</div>
</div>
<?php } ?>
</div>
<?php } ?>
<!-- 联系我们滑动事件 -->
<script type="text/javascript">
$(document).ready(function(){
   var a,b,c;
a = $(window).height();    //浏览器窗口高度
var group = $("#scroll");
$(window).scroll(function(){
    b = $(this).scrollTop();
    c = 790;    //元素距离文档（document）顶部的高度
    if(b<c){
       $(".m-left.lou1.contact").removeClass('fixed');
    }else{
       $(".m-left.lou1.contact").addClass('fixed');
    }
});
});
</script>


<div class="wen clearfix two proTable">
<div class="mrtb-tit"><span class="fr">附件</span><i class="icon-redbar"></i><?php echo $title;?> · 参数详情
</div>

<!-- 内容 -->
<div style="padding: 5px 8px;box-sizing: border-box;">
<?php echo $content;?>

</div>
<!-- 内容 -->


</div>

<!--推荐产品S-->
<div class="wen clearfix two proTable">
<?php $tags2=tag("table=category&condition=catid='".$mycatid."'&template=null");?>
<div class="mrtb-tit"><span class="fr"><?php echo $tags2['0']['catname'];?>实力工厂</span><i class="icon-redbar"></i><?php echo $tags2['0']['catname'];?> · 推荐产品
</div>


<!-- 广告二 -->
<?php $tags=tag("table=ad&condition=pid=26 and status=3 and title='three'&pagesize=1&order=edittime asc&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $key => $val) { ?>
<div class="wrap">
<div class="rel aag-90"><img src="<?php echo $val['image_src'];?>" width="1200" height="90" alt="" />
<!--i class="icon_tg"></i-->
<div class="adicon">广告</div>
</div>
</div>
<?php } } ?>


<div class="mrtb-tit"><span class="fr">其他<?php echo $tags2['0']['catname'];?>实力工厂</span><i class="icon-redbar"></i>猜你想要
</div>
<div class="maxch">
<?php $tags1=tag("table=mall_16&condition=catid='".$catid."' and status=3 and itemid!='".$itemid."'&order=catid asc&template=null");?>
<?php if(is_array($tags1)) { foreach($tags1 as $key1 => $val1) { ?>
<div class="mrbch">
<div class="mrb">
<a href="/<?php echo $MODULE['16']['module'];?>/show.php?itemid=<?php echo $val1['itemid'];?>" title="" target="_blank">
<img alt="" src="<?php echo $val1['thumb'];?>" class="lazy"

style="display: inline;"></a>
</div>
<p class="tit"><a href="/<?php echo $MODULE['16']['module'];?>/show.php?itemid=<?php echo $val1['itemid'];?>" title="<?php echo $val1['title'];?>" target="_blank"><?php echo $val1['title'];?></a></p>
<p class="mprice">面议</p>
</div>
<?php } } ?>



<div style="clear: both;">

</div>
</div>
</div>


</div>
</div>



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