<?
$newplans=0;
foreach ($newplan as $plans):
$newplans=$newplans+$plans['plan'];
endforeach;
?>
<div id="middle">
<table cellspacing="2">
<tr>
<td>Всего поступило в базу за сутки:</td>
<td><?=$all_klient;?></td>
</tr>

<tr>
<td>Всего назначено звонков за сутки телемаркетингом:</td>
<td><?=$newplans;?></td>
</tr>

<tr>
<td>Всего назначено встреч на текущий день:</td>
<td><?=$vstr_today;?></td>
</tr>

<tr>
<td>Всего пришло в текущий день:</td>
<td><?=$proced_today;?></td>
</tr>

<tr>
<td>Всего купили в текущий день:</td>
<td></td>
</tr>

<tr>
<td>Всего вернули в текущий день:</td>
<td></td>
</tr>

<tr>
<td></td>
<td></td>
</tr>
</table>
</div>