<div id="middle">

<div id="table">
<form action="/kredit/find" method="post" name="find_ok"><div class="one findklient">Введите номер контакта<br><input name="phone" class="tel" type="text" value="<?if(isset($_POST['phone']) && $_POST['phone']!=''){echo $_POST['phone'];}?>"><br> <input class="buttons_fil" name="find_tel_ok" type="submit" value="Найти"></div></form>
<form action="/kredit/find" method="post" name="find_fam_ok"><div class="tu findklient">Введите фамилию контакта<br><input name="family" type="text" value="<?if(isset($_POST['family']) && $_POST['family']!=''){echo $_POST['family'];}?>"><br><input class="buttons_fil" name="find_ok" type="submit" value="Найти"></div></form>
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
    <th width="23%">ФИО</th>
    <th width="5%">Возраст</th>
    <th width="25%">Телефон</th>
    <th width="25%">Номер договора</th>
    <th width="17%">Договора</th>
    <th width="5%"></th>
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
    $klientss_vstr=$this->user_model->get_klients_vstr_resep1($klientus['id']);
    $all_dog=$this->user_model->get_all_dog($klientus['id']);
    if($klientus['otkaz_tm']==1 || $klientus['otkaz_serv']==1 || isset ($klientss_vstr['otkaz']) && $klientss_vstr['otkaz']==1)
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
  <tr <?if(isset($status)){echo $status;}?> data-href="/kredit/edit?id=<?=$klientus['id'];?>">
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><?=$klientus['vozrast'];?></td>
    <td><?=$klientus['phone'];?></td>
    <td><?//=$klientus['number_dog'];?></td>
    <td><?if(!empty($all_dog)){?><a href="/kredit/all_dog?id=<?=$klientus['id'];?>">Заключенные договора</a><?}else{?>Заключенных договоров нет<?}?></td>
    <td><?if($klientus['who_user']=='tm'){echo "Первичка";}elseif($klientus['who_user']='serv'){echo "Сервис";}?></td>
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>

</div>