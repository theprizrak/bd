<div id="middle">
<?include 'find_ptel.php';?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
  <thead>
  <tr>
	<td>Дата добавления</td>
    <td width="260">ФИО</td>
    <td width="110">Телефон</td>
    <td width="110">Доп. Телефон</td>
    <td width="150">Пользователь</td>
    <td width="150">Отказ</td>
    <td width="150">Встреча</td>
    <td width="150">Звонок</td>
    <td width="150">Клиент</td>
    <td width="120">Дата встречи</td>
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
    $klientss_vstr=$this->user_model->get_klients_vstr_resep1($klientus['id']);
    if($klientus['otkaz_tm']==1 || isset ($klientss_vstr['otkaz']) && $klientss_vstr['otkaz']==1)
    {$status='id="fall"';}
    elseif($klientus['perezvon']==1)
    {$status='id="call"';}
	elseif(isset ($klientss_vstr['procedura']) && isset ($klientss_vstr['otkaz'])){
    if($klientss_vstr['procedura']==1 && $klientss_vstr['otkaz']!==1)
    {$status='id="ok"';}
    elseif($klientss_vstr['procedura']==2)
    {$status='id="in_proc"';}
    elseif($klientss_vstr['procedura']==3)
    {$status='id="ok_proc"';}
    else
    {$status='';}
    }
    ?>
  <tr <?if(isset($status)){echo $status;}?> data-href="/ptelemarketing/edit?id=<?=$klientus['id'];?>">
	<td><?=$this->user_model->rotate_date2($klientus['date_dobav']);?></td>
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><?=$klientus['phone'];?></td>
    <td><?=$klientus['dop_phone'];?></td>
    <td><?=$klientus['user'];?></td>
    
    <td>
    <?
            if($klientus['otkaz_tm']==0)
            {echo 'Нет';}
            else{echo 'Да';}
    ?>
    </td>
    <td><?
    if(!empty($klientss_vstr)){
    if($klientss_vstr['procedura']==0)
    {
            if($klientss_vstr['otkaz']==1)
            {echo 'Отказ';}
            elseif($klientss_vstr['ok']==1)
            {echo 'Подтверждена';}
            elseif($klientss_vstr['ok']==2)
            {echo 'Н.Д';}
            elseif($klientss_vstr['ok']==3)
            {echo 'Перенесена';}
            elseif($klientss_vstr['ok']==0)
            {echo 'Не подтверждена';}
    }
    elseif($klientss_vstr['procedura']==1){echo 'Ожидает';}
    elseif($klientss_vstr['procedura']==2){echo 'На процедуре';}
    elseif($klientss_vstr['procedura']==3){echo 'Прошел';}
    }
    ?>
    </td>
    <td></td>
    <td><?if(!empty($klientss_vstr)){if($klientss_vstr['prodacha']==1){echo'Да';}else{echo'Нет';}}?></td>
    <td><?if(!empty($klientss_vstr)){if(isset($klientss_vstr['date_vstr']) || isset($klientss_vstr['time_vstr'])){if($klientss_vstr['date_vstr']!='' || $klientss_vstr['time_vstr']!=''){echo $this->user_model->rotate_date2($klientss_vstr['date_vstr']).' '.$klientss_vstr['time_vstr'];}}}?></td>
    <td><?if(!empty($klientss_vstr)){if($klientss_vstr['predpod']==1){echo'Да';}else{echo'Нет';}}?></td>
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
</tbody>
</table>
</div>