<div id="middle">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
  <thead>
  <tr>
    <td width="10%">Действие</td>
    <td width="17%">С/Кто</td>
    <td width="17%">На</td>
    <td width="10%">Дата действие</td>
    <td width="10%">Время действие</td>
    <td width="11%">Кто выполнил</td>
    <td width="25%">Причина</td>
  </tr>
  </thead>
  <tbody>
   <?php 
    if (count($history)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Записей не найдено</strong>
</div>
    ';
   }
   else {
   foreach ($history as $user):

   ?>
  <tr>
    <td style="text-align: left;"><?=$user['izmenenie'];?></td>
    <td><?=$user['izmeneno'];?></td>
    <td><?=$user['izmeneno_na'];?></td>
    <td><?=$user['date_izm'];?></td>
    <td><?=$user['time_izm'];?></td>
    <td><?=$user['izmenil'];?></td>
    <td><?=$user['prichina'];?></td>
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>
</div>