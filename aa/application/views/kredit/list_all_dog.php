<?if(!empty($all_dog)){?>
<div style="float: right; top: -670px; position: relative; right: 30px; width: 450px; padding: 10px; border: 1px dashed;">
<p style="text-align: center; font-size: 15px; font-weight: bold; margin: -8px 1px 8px;">Список заключенных договоров</p>
<table width="100%" cellspacing="0">
<tr>
<td>№</td>
<td>Дата договора</td>
<td>Номер договора</td>
<td>Банк</td>
<td></td>
</tr>
<?
$i=1;
foreach($all_dog as $item):?>
<tr <?//if($item['number_dog']===$last_dog['number_dog']){echo 'style="background: red;"';}?>>
<td><?=$item['id'];?></td>
<td><a href="/kredit/view_dog?id=<?=$id;?>&id_dog=<?=$item['id'];?>"><?=$this->user_model->rotate_date2($item['date_dog']);?></a></td>
<td><?=$item['number_dog']; ?></td>
<td><?=$item['bank'];?></td>
<td><?=$this->user_model->rotate_date2($item['date_vstr']);?></td>
</tr>
<?
$i++;
endforeach;?>
</table>
</div>
<?}?>