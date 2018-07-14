<div id="middle">
<div id="table">
<form action="/ptelemarketing/find" method="post" name="find_ok"><div class="one findklient">Введите номер контакта<br><input name="phone" class="tel" type="text"><br> <input class="buttons_fil" name="find_ok" type="submit" value="Найти"></div></form>
<form action="/ptelemarketing/find" method="post" name="find_fam_ok"><div class="tu findklient">Введите фамилию контакта<br><input name="family" type="text"><br><input class="buttons_fil" name="find_fam_ok" type="submit" value="Найти"></div></form>
<form action="/ptelemarketing/find" method="post" name="find_name_ok"><div class="tre findklient">Введите Имя контакта<br><input name="name" type="text"><br><input class="buttons_fil" name="find_name_ok" type="submit" value="Найти"></div></form>
</div>
<form action="/ptelemarketing/find" method="post" name="find_klient">
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%">Сортировать по дате</td>
    <td width="9%"><input name="date1" class="datepicker" type="text"></td>
    <td width="9%"><input name="date2" class="datepicker" type="text"></td>
    <td width="3%"></td>  
  </tr>
  <tr>
    <td width="9%">и времени</td>
    <td width="9%"><input name="time1" class="time" type="text"></td>
    <td width="9%"><input name="time2" class="time" type="text"></td>
    <td width="3%" align="left"><input class="buttons_fil" name="sortdate_ok" type="submit" value="ОК"></td>  
  </tr>
</table>
</form>
<hr>
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #A8F3AE;">&nbsp;</span>Ожидают процедуру</span></td>
	<td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #BFABEB;">&nbsp;</span><span>На процедуре</span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #EDF3A8;">&nbsp;</span><span>Перезвон</span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #FFA0A0;">&nbsp;</span><span>Отказ</span></td>
	<td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: rgba(100, 141, 103, 0.62);">&nbsp;</span><span>Прошёл</span></td>
  </tr>
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
    <td width="120">П/П</td>
  </tr>
  </thead>
  <tbody>
   <?php
    if (count($klient)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Клиент/Контакт не найден!</strong>
</div>
    ';
   }
   else {

    $ag=array();
    foreach($klient as $rs):
     $ag[count($ag)]=$rs['id_client'];
    endforeach;
    $ag=array_unique($ag);
    
    foreach ($ag as $vsstr):
        $id=$vsstr;
        $userrrrs='';
        $klientus=$this->telemarket_model->get_klients_allvstr_tel($userrrrs,$id);
    if(!empty($klientus))
    {
    $klientss_vstr=$this->telemarket_model->get_klients_vstr_resep1($id);
    if($klientus['otkaz_tm']==1 || isset ($klientss_vstr['otkaz']) && $klientss_vstr['otkaz']==1)
    {$status='id="fall"';}
    elseif($klientus['perezvon']==1)
    {$status='id="call"';}
	elseif(isset ($klientss_vstr['procedura']) && isset ($klientss_vstr['otkaz'])){
    if($klientss_vstr['procedura']==1 && $klientss_vstr['otkaz']!==1)
    {$status='id="ok"';}
    elseif($klientss_vstr['procedura']==3)
    {$status='id="ok_proc"';}

	
	
    else
    {$status='';}
    }
    ?>
  <tr <?if(isset($status)){echo $status;}?> data-href="/ptelemarketing/edit?id=<?=$klientus['id'];?>">
	<td><?= $this->user_model->rotate_date2($klientus['date_dobav']);?></td>
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
    <?php } endforeach; }?>
    <? echo $this->pagination->create_links();?>
</tbody>
</table>
</div>