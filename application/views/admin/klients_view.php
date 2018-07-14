<div id="middle">
<br />
<div id="table">
<form action="/admin/klients" method="post" name="find_klient"><div class="one findklient">Введите номер контакта<br><input name="phone" class="tel" type="text" value="<?if(isset($_POST['phone']) && $_POST['phone']!=''){echo $_POST['phone'];}?>"><br> <input class="buttons_fil" name="find_phone_ok" type="submit" value="Найти"></div></form>
<form action="/admin/klients" method="post" name="find_klient">
<div class="tre findklient">Введите фамилию или Имя контакта<br><input placeholder="Введите ФИО клиента" name="fioname" type="text" value="<?if(isset($_POST['fioname']) && $_POST['fioname']!=''){echo $_POST['fioname'];}?>"><br><input class="buttons_fil" name="find_fioname_ok" type="submit" value="Найти"></div>
</form>
<?/*
<form action="/admin/klients" method="post" name="find_klient"><div class="tu findklient">Введите фамилию контакта<br><input name="family" type="text" value="<?if(isset($_POST['family']) && $_POST['family']!=''){echo $_POST['family'];}?>"><br><input class="buttons_fil" name="find_family_ok" type="submit" value="Найти"></div></form>
<form action="/admin/klients" method="post" name="find_klient"><div class="tre findklient">Введите Имя контакта<br><input name="name" type="text" value="<?if(isset($_POST['name']) && $_POST['name']!=''){echo $_POST['name'];}?>"><br><input class="buttons_fil" name="find_name_ok" type="submit" value="Найти"></div></form>
*/?>
</div>
<hr>
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #A8F3AE;">&nbsp;</span>Ожидают процедуру</span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #EDF3A8;">&nbsp;</span><span>Перезвон</span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #FFA0A0;">&nbsp;</span><span>Отказ</span></td>
	<td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: rgba(100, 141, 103, 0.62);">&nbsp;</span><span>Прошёл</span></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList" id="sortTable">
  <thead>
  <tr>
    <th width="30%">ФИО</th>
    <th width="15%">Статус клиента</th>
    <th width="15%">Телефон</th>
    <th width="25%">Пользователь</th>
    <td width="10%"></td>
    <td width="5%"></td>
    <!--<td width="150">Тип процедуры</td>
    <td width="120">Дата встречи</td>-->
  </tr>
  </thead>
    <tbody>
   <?php 
      if ($del==1){
    echo '
<div id="dialog" title="Инфо">
<strong>Клиент успешно удален из базы!</strong>
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
    $klientss_vstr=$this->user_model->get_klients_vstr_resep1($klientus['id']);
    if($klientus['otkaz_tm']==1 || $klientus['otkaz_serv']==1 || isset ($klientss_vstr['otkaz']) && $klientss_vstr['otkaz']==1)
    {$status='id="fall"';}
    elseif($klientus['perezvon_tm']==1 || $klientus['perezvon_serv']==1)
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
  <tr <?if(isset($status)){echo $status;}?> data-href="/admin/view_klients?id=<?=$klientus['id'];?>" class="numdeerskl<?=$klientus['id'];?>">
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><? if($klientus['status']==0){echo 'Лояльный';}else{echo 'Негатив';}?></td>
    <td><?=$klientus['phone'];?></td>
    <td><?=$klientus['user'];?></td>
    <td><a  onclick="form_otch('<?=$klientus['id'];?>',1)"  class="buttons_otch">Составить отчет</a></td>
    <td><?if($klientus['who_user']=='tm'){echo 'ТМ';}else{echo 'Сервис';}?></td>
    <!--<td><?=$klientus['type_procedur'];?></td>
    <td><?=$klientus['date_vstr'];?></td>-->
  </tr>

    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>
</div>