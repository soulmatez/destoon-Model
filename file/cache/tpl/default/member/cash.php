<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="action"><a href="?action=index"><span>申请提现</span></a></td>
<td class="tab" id="action_record"><a href="?action=record"><span>提现记录</span></a></td>
<td class="tab" id="action_setting"><a href="?action=setting"><span>帐号设置</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'record') { ?>
<form action="?">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="tt">
<select name="bank">
<option value="">开户银行</option>
<?php if(is_array($BANKS)) { foreach($BANKS as $v) { ?>
<option value="<?php echo $v;?>" <?php if($bank == $v) { ?>selected<?php } ?>><?php echo $v;?></option>;
<?php } } ?>
</select>
&nbsp;
<?php echo dcalendar('fromdate', $fromdate);?> 至 <?php echo dcalendar('todate', $todate);?>
&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="Go('?action=<?php echo $action;?>');"/>
</div>
</form>
<div class="bd">
<table cellpadding="10" cellspacing="0" class="tb">
<tr>
<th>流水号</th>
<th>实收</th>
<th>手续费</th>
<th>开户银行</th>
<th>收款户名</th>
<th>收款帐号</th>
<th width="130">申请时间</th>
<th width="130">受理时间</th>
<th>状态</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center">
<td height="30"><?php echo $v['itemid'];?></td>
<td class="f_red"><?php echo $v['amount'];?></td>
<td class="f_blue"><?php echo $v['fee'];?></td>
<td title="<?php echo $v['branch'];?>"><?php echo $v['bank'];?></td>
<td><?php echo $v['truename'];?></td>
<td><?php echo $v['account'];?></td>
<td class="f_gray"><?php echo $v['addtime'];?></td>
<td class="f_gray"><?php echo $v['edittime'];?></td>
<td<?php if($v['note']) { ?> title="原因及备注:<?php echo $v['note'];?>"<?php } ?>><?php echo $v['dstatus'];?></td>
</tr>
<?php } } ?>
<tr align="center">
<td height="35"><strong>小计</strong></td>
<td class="f_red"><?php echo $amount;?></td>
<td class="f_blue"><?php echo $fee;?></td>
<td colspan="6">&nbsp;</td>
</tr>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('cash');m('action_record');</script>
<?php } else if($action == 'setting') { ?>
<?php if($vbank) { ?>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">开户银行</td>
<td class="tr"><?php echo $member['bank'];?></td>
</tr>
<tr>
<td class="tl">开户网点</td>
<td class="tr"><?php echo $member['branch'];?></td>
</tr>
<tr>
<td class="tl">收款户名</td>
<td class="tr"><?php if($member['banktype']) { ?><?php echo $member['company'];?><?php } else { ?><?php echo $member['truename'];?><?php } ?></td>
</tr>
<tr>
<td class="tl">帐号类型</td>
<td class="tr"><?php if($member['banktype']) { ?>对公<?php } else { ?>对私<?php } ?></td>
</tr>
<tr>
<td class="tl">收款帐号</td>
<td class="tr"><?php echo $member['account'];?></td>
</tr>
<tr>
<td class="tl">认证状态</td>
<td class="tr f_green">已认证</td>
</tr>
</table>
<?php } else { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 开户银行</td>
<td class="tr"><?php echo $bank_select;?> <span id="dbank" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 帐号类型</td>
<td class="tr">
<input type="radio" name="banktype" value="0"<?php if($member['banktype']==0) { ?> checked<?php } ?> onclick="Dd('name').innerHTML='<?php echo $member['truename'];?>';"/> 对私
<input type="radio" name="banktype" value="1"<?php if($member['banktype']==1) { ?> checked<?php } ?> onclick="Dd('name').innerHTML='<?php echo $member['company'];?>';"/> 对公
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 开户网点</td>
<td class="tr"><input type="text" size="50" name="branch" value="<?php echo $member['branch'];?>" id="branch"/> <span class="f_gray">例：陕西省西安市高新支行</span> <span id="dbranch" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 收款户名</td>
<td class="tr" id="name"><?php echo $member['truename'];?></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 收款帐号</td>
<td class="tr"><input type="text" size="30" name="account" value="<?php echo $member['account'];?>" id="account"/> <span id="daccount" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr"><input type="submit" name="submit" value=" 确 定 " class="btn_g"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
var f,l;
f = 'bank';
if(Dd(f).value == '') {
Dmsg('请选择开户银行', f);
return false;
}
f = 'branch';
l = Dd(f).value.length;
if(l < 4) {
Dmsg('请填写开户网点', f);
return false;
}
f = 'account';
l = Dd(f).value.length;
if(l < 6) {
Dmsg('请填写收款帐号', f);
return false;
}
f = 'password';
l = Dd(f).value.length;
if(l < 6) {
Dmsg('请填写支付密码', f);
return false;
}
return true;
}
$(function(){
$('#bank').change(function(){
var bank = $('#bank').val();
if(bank == '支付宝') {
$('#branch').val('支付宝（中国）网络技术有限公司');
} else if(bank == '财付通') {
$('#branch').val('深圳市财付通科技有限公司');
}
});
});
</script>
<?php } ?>
<script type="text/javascript">s('cash');m('action_setting');</script>
<?php } else if($action == 'confirm') { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="confirm"/>
<input type="hidden" name="amount" value="<?php echo $amount;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">可用金额</td>
<td class="tr"><span class="f_blue"><?php echo $_money;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr>
<td class="tl">提现金额</td>
<td class="tr"><span class="f_red"><?php echo $amount;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr>
<td class="tl">手续费</td>
<td class="tr"><span class="f_red"><?php echo $fee;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr>
<td class="tl">实收金额</td>
<td class="tr"><span class="f_red"><?php echo $money;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr>
<td class="tl"> <span class="f_red">*</span>支付密码</td>
<td class="tr"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr">
<input type="submit" name="submit" value=" 确 定 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 取 消 " class="btn" onclick="history.back(-1);"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
var f,l;
f = 'password';
l = Dd(f).value.length;
if(l < 6) {
Dmsg('请填写支付密码', f);
return false;
}
return true;
}
</script>
<script type="text/javascript">s('cash');m('action');</script>
<?php } else { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="confirm"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">账户余额</td>
<td class="tr"><span class="f_blue"><?php echo $_money;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr>
<td class="tl">提现说明</td>
<td class="tr f_gray">
<?php if($MOD['cash_times']) { ?>- 24小时可提现次数<?php echo $MOD['cash_times'];?>次<br/><?php } ?>
<?php if($MOD['cash_min']) { ?>- 单次提现最小金额<?php echo $MOD['cash_min'];?><?php echo $DT['money_unit'];?><br/><?php } ?>
<?php if($MOD['cash_max']) { ?>- 单次提现最大金额<?php echo $MOD['cash_max'];?><?php echo $DT['money_unit'];?><br/><?php } ?>
<?php if($MOD['cash_fee']) { ?>- 提现费率<?php echo $MOD['cash_fee'];?>%<br/><?php } ?>
<?php if($MOD['cash_fee_min']) { ?>- 提现费率最小值<?php echo $MOD['cash_fee_min'];?><?php echo $DT['money_unit'];?><br/><?php } ?>
<?php if($MOD['cash_fee_max']) { ?>- 提现费率封顶值<?php echo $MOD['cash_fee_max'];?><?php echo $DT['money_unit'];?><br/><?php } ?>
</td>
</tr>
<tr>
<td class="tl"> <span class="f_red">*</span>提现金额</td>
<td class="tr"><input type="text" size="10" name="amount" id="amount"/> <span id="damount" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr">
<input type="submit" value=" 申请提现 " class="btn_g"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
var f,l;
f = 'amount';
l = Dd(f).value.length;
if(l < 1) {
Dmsg('请填写提现金额', f);
return false;
}
return true;
}
</script>
<script type="text/javascript">s('cash');m('action');</script>
<?php } ?>
<?php include template('footer', 'member');?>