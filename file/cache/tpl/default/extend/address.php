<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="nav bd-b"><span class="f_r"><a href="http://api.map.baidu.com/geocoder?address=<?php echo $addr;?>&output=html&scr=<?php echo $name;?>" class="b" target="_blank">全屏</a></span><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> 查看地图</div>
<div class="b20"></div>
</div>
<div class="m">
<div id="bmap" style="width:100%;height:600px;"></div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=<?php echo $map_key;?>"></script>
<script type="text/javascript">
$(function(){
// 百度地图API功能
var map = new BMap.Map("bmap");
var point = new BMap.Point(116.331398,39.897445);
map.centerAndZoom(point,12);
// 创建地址解析器实例
var myGeo = new BMap.Geocoder();
// 将地址解析结果显示在地图上,并调整地图视野
myGeo.getPoint("<?php echo $addr;?>", function(point){
if(point) {
map.centerAndZoom(point, 16);
var marker = new BMap.Marker(point);
map.addOverlay(marker);
var label = new BMap.Label("<?php if($name) { ?><b><?php echo $name;?></b><br/><?php } ?><?php echo $addr;?>",{offset:new BMap.Size(20,-10)});
marker.setLabel(label);
} else {
alert("您选择地址没有解析到结果");
}
}, "中国");
});
</script>
</div>
<?php include template('footer');?>