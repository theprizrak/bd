<div id="middle">
<br />
<!--<form action="/telemarketing/find" method="post" name="find_klient">
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Введите номер клиента</td>
    <td width="22%"><input name="phone" class="tel" type="text"></td>
    <td width="37%" align="left"><input name="find_ok" type="submit" value="Найти"></td>
  </tr>
  <tr>
    <td width="20%">Введите фамилию клиента</td>
    <td width="22%"><input name="family" type="text"></td>
    <td width="37%" align="left"><input name="find_fam_ok" type="submit" value="Найти"></td>  
  </tr>
  <tr>
    <td width="20%">Введите Имя клиента</td>
    <td width="22%"><input name="name" type="text"></td>
    <td width="37%" align="left"><input name="find_name_ok" type="submit" value="Найти"></td>  
  </tr>
  <tr>
    <td width="20%">Введите отчество контакта</td>
    <td width="22%"><input name="otch" type="text"></td>
    <td width="37%" align="left"><input name="find_otch_ok" type="submit" value="Найти"></td>  
  </tr>
</table>
</form> -->
<table width="320" border="0" cellspacing="0" cellpadding="0">
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
  <thead>
  <tr>
	<td>Дата добавления</td>
    <td width="260">ФИО</td>
    <td width="110">Телефон</td>
    <td width="110">Доп. Телефон</td>
    <td width="150">Пользователь</td>
    
    <td width="40">Отказ</td>
    <td width="150">Встреча</td>
    <td width="40">Звонок</td>
    <td width="40">Клиент</td>
   <td width="120">Дата встречи</td>
   <td width="120">Время встречи</td>
   <td width="120">П/П</td>
  </tr>
  </thead>
  <tbody>
   <?php
   if ($info==1){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Контакт успешно добавлен</strong>
    </div>
    ';
   }
   if ($info==2){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Контакт успешно изменен</strong>
    </div>
    ';
   }
    if (count($klient)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Клиент/Контакт не найден!</strong>
</div>
    ';
   }
   else {
    foreach ($klient as $klientus):
    $ff='vstr'.$klientus['id'];
    
    $klientss_vstr=$this->user_model->get_klients_vstr_resep1($klientus['id']);
    if($klientus['procedura']==1 && $klientus['otkaz']=='')
    {$status='id="ok"';}
    elseif($klientus['procedura']==0 && $klientus['otkaz']!=='')
    {$status='id="fall"';}
    elseif($klientus['perezvon']==1)
    {$status='id="call"';}
    elseif($klientus['procedura']==3)
    {$status='id="ok_proc"';}
    else
    {$status='';}
    ?>
  <tr <?if(isset($status)){echo $status;}?> data-href="/telemarketing/edit?id=<?=$klientus['id'];?>">
	<td><?=$klientus['date_dobav'];?></td>
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><?=$klientus['phone'];?></td>
    <td><?=$klientus['dop_phone'];?></td>
    <td><?=$klientus['user'];?></td>
    <!--<td><?=$klientus['type_procedur'];?></td>
    <td><?=$klientus['date_vstr'];?></td>-->
    
    <td>
    <?
    if(!empty($klientss_vstr)){
            if($klientss_vstr['prichotkaza']=='')
            {echo 'Нет';}
            else{echo 'Да';}
        }
        else{echo 'Ошибка';}
    ?>
    
    </td>
    <td><?
    if($klientus['procedura']==0)
    {
        if(!empty($klientss_vstr)){
            if($klientss_vstr['ok']!=1)
            {echo 'Не подтверждена';}
            else{
            if($klientss_vstr['prichotkaza']=='')
            {echo 'Назначена';}
            else{echo 'Не назначена';}
            }
        }
        else{echo 'Не назначена';}
    }
    elseif($klientus['procedura']==1){echo 'Ожидает';}
    elseif($klientus['procedura']==2){echo 'На процедуре';}
    elseif($klientus['procedura']==3){echo 'Прошел';}
    ?>
    </td>
    <td></td>
    <td><?if($klientus['prodaza']==1){echo'Да';}else{echo'Нет';}?></td>
    <td></td>
	<td><?=$klientus['predpod'];?></td>
    <td></td>
<!--<td><?=$klientss_vstr['id'];?> </td>
	<td><?=$klientss_vstr['time_vstr'];?> </td>-->
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
</tbody>
</table>
<? /*foreach($vstr as $vsstr):
echo $vsstr['user'].'<br>';
endforeach;*/?>

</div>