<?
$all_dog=$this->user_model->get_all_dog($id);

?>
<div id="middle">
<p style="text-align: center; font-size: 15px; font-weight: bold; margin: -8px 1px 8px;">Список заключенных договоров клиента - <?=$family.' '.$name.' '.$lastname;?></p>
<? if(!empty($all_dog)){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
<thead>
<tr>
<td>Дата договора</td>
<td>Номер договора</td>
<td>Банк</td>
<td>Сумма кредита</td>
<td>Комментарий</td>
</tr>
</thead>
<tbody>
<?
$i=1;
foreach($all_dog as $item):?>
<tr data-href="/kredit/view_dog?id=<?=$id;?>&id_dog=<?=$item['id'];?>">
<td><?=$this->user_model->rotate_date2($item['date_dog']);?></td>
<td><?=$item['number_dog']; ?></td>
<td><?=$item['bank'];?></td>
<td><?=$item['summa_kred'];?> руб.</td>
<td><?=$item['comments'];?></td>
</tr>
<?
$i++;
endforeach;?>
</tbody>
</table>
<?
}
else
{
echo '<p style="text-align: center; font-size: 15px; font-weight: bold; margin: -8px 1px 8px;color: rgba(204, 87, 87, 1);">С клиентом еще не было заключено ни одного договора.</p>';
}?>
</div>