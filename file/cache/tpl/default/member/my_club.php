<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td width="110" id="submenu"></td>
<td class="tab" id="add"><a href="<?php echo $MOD['linkurl'];?>"><span>发表帖子</span></a></td>
<?php if($_userid) { ?>
<td class="tab" id="s3"><a href="?mid=<?php echo $mid;?>"><span>已发布(<?php echo $nums['3'];?>)</span></a></td>
<td class="tab" id="s2"><a href="?mid=<?php echo $mid;?>&status=2"><span>审核中(<?php echo $nums['2'];?>)</span></a></td>
<td class="tab" id="s1"><a href="?mid=<?php echo $mid;?>&status=1"><span>未通过(<?php echo $nums['1'];?>)</span></a></td>
<?php } ?>
</tr>
</table>
</div>
<?php if($action=='add' || $action=='edit') { ?>
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<form method="post" action="?" id="dform" target="send" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="gid" value="<?php echo $gid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<?php if($status==1 && $action=='edit' && $note) { ?>
<tr>
<td class="tl">未通过原因</td>
<td class="tr f_blue"><?php echo $note;?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">所属商圈</td>
<td class="tr"><a href="<?php echo $MOD['linkurl'];?><?php echo $GRP['linkurl'];?>" class="t"><?php echo $GRP['title'];?></a></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 帖子标题</td>
<td class="tr"><input name="post[title]" type="text" id="title" size="60" value="<?php echo $title;?>"/> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">标题图片</td>
<td class="tr"><input name="post[thumb]" id="thumb" type="text" size="60" value="<?php echo $thumb;?>" readonly/>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dthumb(<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb').value, true);" class="t">[上传]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="_preview(Dd('thumb').value);" class="t">[预览]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dd('thumb').value='';" class="t">[删除]</a></td>
</tr>
<?php if($CP) { ?>
<input type="hidden" name="catid_1" value="<?php echo $catid;?>"/>
<script type="text/javascript">
var property_catid = <?php echo $catid;?>;
var property_itemid = <?php echo $itemid;?>;
var property_admin = 0;
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/property.js"></script>
<tbody id="load_property" style="display:none;">
<tr><td></td><td></td></tr>
</tbody>
<?php } ?>
<?php if($FD) { ?><?php echo fields_html('<td class="tl">', '<td class="tr">', $item);?><?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 帖子内容</td>
<td class="tr"><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', $group_editor, '100%', 350);?><br/><span id="dcontent" class="f_red"></span>
</td>
</tr>
<?php if($MOD['swfu'] == 1 && DT_EDITOR == 'fckeditor') { ?>
<?php include DT_ROOT.'/api/swfupload/editor.inc.php';?>
<?php } ?>
<?php if($fee_add) { ?>
<tr>
<td class="tl">发布此信息需消费</td>
<td class="tr"><span class="f_b f_red"><?php echo $fee_add;?></span> <?php echo $fee_unit;?></td>
</tr>
<?php if($fee_currency == 'money') { ?>
<tr>
<td class="tl"><?php echo $DT['money_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_money;?><?php echo $fee_unit;?></span> <a href="charge.php?action=pay" target="_blank" class="t">[充值]</a></td>
</tr>
<?php } else { ?>
<tr>
<td class="tl"><?php echo $DT['credit_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_credit;?><?php echo $fee_unit;?></span> <a href="credit.php?action=buy" target="_blank" class="t">[购买]</a></td>
</tr>
<?php } ?>
<?php } ?>
<?php if($need_password) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($need_question) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证问题</td>
<td class="tr"><?php include template('question', 'chip');?> <span id="danswer" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($need_captcha) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($action=='add') { ?>
<tr style="display:none;" id="weibo_sync">
<td class="tl">同步主题</td>
<td class="tr" id="weibo_show"></td>
</tr>
<?php } ?>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 提 交 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<?php if($action=='add') { ?>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('<?php echo $action;?>');</script>
<?php } else { ?>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php } else { ?>
<div class="tt">
<form action="?">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="status" value="<?php echo $status;?>"/>
&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="Go('?mid=<?php echo $mid;?>&status=<?php echo $status;?>');"/>
</form>
</div>
<div class="ls">
<table cellpadding="10" cellspacing="0" class="tb">
<tr>
<th width="20"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>标题</th>
<th>商圈</th>
<th width="120">发表时间</th>
<?php if($MOD['hits']) { ?><th>人气</th><?php } ?>
<th>回复</th>
<th width="80">管理</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td align="left" title="<?php echo $v['alt'];?>"><a href="<?php echo $v['linkurl'];?>" target="_blank" class="t"><?php echo $v['title'];?></a><?php if($v['status']==1 && $v['note']) { ?> <a href="javascript:" onclick="alert('<?php echo $v['note'];?>');"><img src="image/why.gif" title="未通过原因"/></a><?php } ?></td>
<td>&nbsp;&nbsp;<a href="<?php echo $v['groupurl'];?>" target="_blank"><?php echo $v['groupname'];?></a>&nbsp;&nbsp;</td>
<td class="f_gray"><?php echo $v['adddate'];?></td>
<?php if($MOD['hits']) { ?><td class="f_gray"><?php echo $v['hits'];?></td><?php } ?>
<td class="f_gray"><?php echo $v['reply'];?></td>
<td>
<a href="?mid=<?php echo $mid;?>&job=<?php echo $job;?>&action=edit&itemid=<?php echo $v['itemid'];?>"><img width="16" height="16" src="image/edit.png" title="修改" alt=""/></a>
<?php if($MG['delete']) { ?>&nbsp;<a href="?mid=<?php echo $mid;?>&job=<?php echo $job;?>&action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return confirm('确定要删除吗？此操作将不可撤销');"><img width="16" height="16" src="image/delete.png" title="删除" alt=""/></a><?php } ?>
</td>
</tr>
<?php } } ?>
</table>
</div>
<?php if($mod_limit || (!$MG['fee_mode'] && $MOD['fee_add'])) { ?>
<div class="limit">
<?php if($mod_limit) { ?>
总共可发 <span class="f_b f_red"><?php echo $mod_limit;?></span> 条&nbsp;&nbsp;&nbsp;
当前已发 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;
还可以发 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条&nbsp;&nbsp;&nbsp;
<?php } ?>
<?php if(!$MG['fee_mode'] && $MOD['fee_add']) { ?>
发布信息收费 <span class="f_b f_red"><?php echo $MOD['fee_add'];?></span> <?php if($MOD['fee_currency'] == 'money') { ?><?php echo $DT['money_unit'];?><?php } else { ?><?php echo $DT['credit_unit'];?><?php } ?>/条&nbsp;&nbsp;&nbsp;
可免费发布 <span class="f_b"><?php if($mod_free_limit<0) { ?>无限<?php } else { ?><?php echo $mod_free_limit;?><?php } ?></span> 条&nbsp;&nbsp;&nbsp;
<?php } ?>
</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php if($action == 'add' || $action == 'edit') { ?>
<script type="text/javascript">
function check() {
var l;
var f;
f = 'title';
l = Dd(f).value.length;
if(l < 5 || l > 30) {
Dmsg('标题应为5-30字，当前已输入'+l+'字', f);
return false;
}
f = 'content';
l = FCKLen();
if(l < 15 || l > 50000) {
Dmsg('内容应为15-50000字，当前已输入'+l+'字', f);
return false;
}
<?php if($FD) { ?><?php echo fields_js();?><?php } ?>
<?php if($CP) { ?><?php echo property_js();?><?php } ?>
<?php if($need_password) { ?>
f = 'password';
l = Dd(f).value.length;
if(l < 6) {
Dmsg('请填写支付密码', f);
return false;
}
<?php } ?>
<?php if($need_question) { ?>
f = 'answer';
if($('#c'+f).html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证问题', f);
return false;
}
<?php } ?>
<?php if($need_captcha) { ?>
f = 'captcha';
if($('#c'+f).html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', f);
return false;
}
<?php } ?>
return true;
}
var destoon_oauth = '<?php echo $EXT['oauth'];?>';
</script>
<?php } ?>
<?php if($action=='add' && strlen($EXT['oauth']) > 1) { ?><?php echo load('weibo.js');?><?php } ?>
<?php include template('club_js', 'chip');?>
<?php include template('footer', 'member');?>