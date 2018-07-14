<?$users_online=$this->user_model->users_online();?>
<div id="middle">
<p style="font-size: 15px;margin: 5px 0px;"><b>Онлайн: <?=count($users_online);?> человек</b></p>
<br />
<table  width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
<thead>
<tr>
<th>ФИО</th>
<th>Отдел</th>
<th>Должность</th>
<th>Логин</th>
<th>Время входа</th>
<th>Последняя активность</th>
<th>IP-адрес</th>
<th></th>
</tr>
</thead>
<tbody>
<?
foreach($users_online as $online):
?>
<tr>
<td><?=$online['name'];?></td>
<td><?=$online['otdel'];?></td>
<td><?=$online['doljn'];?></td>
<td><?=$online['user_name'];?></td>
<td><?=$online['in_bd'];?></td>
<td>
<?
$last_act=time()-$online['last_activity'];
$lm=date( 'i', $last_act );
if($lm=='00'){echo 'менее минуты назад';}
else{
if($lm=='01'){$min='минута';}elseif($lm=='02' || $lm=='03' || $lm=='04'){$min='минуты';}else{$min='минут';}
echo $lm.' '.$min.' назад';
}
?>
</td>
<td><?=$online['ip_adress'];?></td>
<td>
<?
if(stripos($online['user_name'], 'admin')===false && stripos($online['user_name'], 'adm')===false){
?>
<input onclick="del_sess('<?=$online["id_session"];?>')" type="button" class="del_proc" />
<?}?>
</td>
</tr>
<?endforeach;?>
</tbody>
</table>
</div>