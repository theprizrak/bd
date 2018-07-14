<div id="middle">
<form action="/yirist/find" method="post" name="find_klient">
<table width="70%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Введите фамилию клиента</td>
    <td width="22%"><input name="family" type="text"></td>
    <td width="37%" align="left"><input name="find_ok" type="submit" value="Найти"></td>
  </tr>
</table>
<table width="70%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Введите номер телефона клиента</td>
    <td width="22%"><input name="phone" class="tel" type="text"></td>
    <td width="37%" align="left"><input name="find_tel_ok" type="submit" value="Найти"></td>
  </tr>
</table>
</form>

<table width="450" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td><span style="width: 15px;height: 15px;display: inline-block;background: #648D67;margin-right: 2px;">&nbsp;</span>Прошел процедуру</span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;background: #A8F3AE;margin-right: 2px;">&nbsp;</span>Ожидают процедуру</span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;background: #EDF3A8;margin-right: 2px;">&nbsp;</span><span>Перезвон</span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;background: #FFA0A0;margin-right: 2px;">&nbsp;</span><span>Отказ</span></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
    <thead>
  <tr>
    <td width="30%">ФИО</td>
    <td width="10%">Статус клиента</td>
    <td width="5%">Возраст</td>
    <td width="25%">Телефон</td>
    <td width="10%">Дата встречи</td>
    <td width="10%">Время встречи</td>
    <td width="20%">Тип процедуры</td>
  </tr>
  </thead>
  <tbody>
   <?php 
if ($info==1){
echo '
<div id="dialog" title="Инфо">
<strong>Клиент успешно изменен!</strong>
</div>
';
 }
		
    if (count($klient)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Клиент не найден!</strong>
</div>
    ';
   }
   else {
   foreach ($klient as $klientus):
    if($klientus['procedura']==1 && $klientus['otkaz']=='' && $klientus['otkazon']==0)
    {$status='id="ok"';}
    elseif($klientus['procedura']==0 && $klientus['otkaz']!==''||$klientus['otkazon']==1)
    {$status='id="fall"';}
    elseif($klientus['perezvon']==1)
    {$status='id="call"';}
    elseif($klientus['procedura']==3 && $klientus['otkaz']=='' && $klientus['otkazon']==0)
    {$status='id="ok_proc"';}
    else
    {$status='';}
    ?>
  <tr <?if(isset($status)){echo $status;}?> data-href="/reseption/edit?id=<?=$klientus['id'];?>">
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><? if($klientus['status']==0){echo 'Лояльный';}else{echo 'Негатив';}?></td>
    <td><?=$klientus['vozrast'];?></td>
    <td><?=$klientus['phone'];?></td>
    <td><?=$klientus['date_vstr'];?></td>
    <td><?=$klientus['time_vstr'];?></td>
    <td><?=$klientus['type_procedur'];?></td>
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>

</div>