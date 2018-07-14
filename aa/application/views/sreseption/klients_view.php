<?if(isset($_GET['f'])){echo $_GET['f'];}?>
<div id="doc_print" style="display: none;">
<form>
<select name="doctor" class="select">
    <option value=""></option>
    <?
    $doctor=$this->stelemarket_model->get_all_doctor();
    if(empty($doctor))
    {?>
    <option value="">Нет свободных врачей</option>
    <?
    }
    else
    {
    foreach($doctor as $doctors):
    ?>
        <option value="<?=$doctors["family"].' '.$doctors["name"];?>"><?=$doctors["family"].' '.$doctors["name"];?></option>
   <? endforeach;
    }
    ?>
    </select>
<input name="date1" class="datepicker" type="text">
<input type="button" onclick="aaasss()" value="Распечатать"/>
<input type="button" onclick="doc(1)" value="Закрыть"/>
</form>
</div>
<div id="middle">
<?include 'find_sresep.php';$configs=$this->auth_lib->config_site(); // настройки сайта?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList sortTable">
<thead>
  <tr>
    <th width="11%">ФИО</td>
    <th width="10%">Статус клиента</td>
    <th width="7%">Возраст</td>
    <th width="10%">Телефон</td>
	<th width="10%">Подтверждена</td>
	<th width="5%">Назначил</td>
	<th width="9%">Врач</td>
	<th width="9%">Дата встречи</td>
	<th width="7%">Время встречи</td>
	<th width="22%">Назначены процедуры</td>
  </tr>
</thead>
  <tbody>
  
   <?php 
if (isset($_COOKIE["info"]) && $_COOKIE["info"]==1){
echo '
<div id="dialog" title="Инфо">
<strong>Клиент успешно добавлен!</strong>
</div>
';
 }

if (isset($klient_vstr)){	
    if (count($klient_vstr)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Клиент не найден!</strong>
</div>
    ';
   }
   else {
   
   
   foreach ($klient_vstr as $vstr):
    $klientus=$this->stelemarket_model->get_klients_sresep1($vstr['id_client']);
if($configs['color_serv_resep']=='on'){
    if($klientus['otkaz_serv']==1 || isset ($vstr['otkaz']) && $vstr['otkaz']==1)
    {$status='id="fall"';}
    elseif($klientus['perezvon']==1)
    {$status='id="call"';}
	elseif(isset ($vstr['procedura']) && isset ($vstr['otkaz'])){
    if($vstr['procedura']==1 && $vstr['otkaz']!==1)
    {$status='id="ok"';}
    elseif($vstr['procedura']==2)
    {$status='id="in_proc"';}
    elseif($vstr['procedura']==3)
    {$status='id="ok_proc"';}
    else
    {$status='';}
    }
}
    ?>
  <tr <?if(isset($status)){echo $status;}?> data-href="/sreseption/edit?id=<?=$klientus['id'];?>">
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><? if($klientus['status']==0){echo 'Лояльный';}else{echo 'Негатив';}?></td>
    <td><?=$klientus['vozrast'];?></td>
    <td><?=$klientus['phone'];?></td>
	<td><?if(!empty($vstr)){if($vstr['ok']==1){echo "Подтверждена";}else{echo "Не подтверждена";}}?></td>
	<td><?=$klientus['user'];?></td>
	<td><?if(!empty($vstr)){if($vstr['doctor']!=""){echo $vstr['doctor'];}}?></td>
	<td><?if(!empty($vstr)){if($vstr['date_vstr']!=""){echo $this->user_model->rotate_date2($vstr['date_vstr']);}}?></td>
	<td><?if(!empty($vstr)){if($vstr['time_vstr']!=""){echo $vstr['time_vstr'];}}?></td>
    <td><?if(!empty($vstr)){if(isset($vstr['sproc']) && $vstr['sproc']!=""){echo $vstr['sproc'];}if(isset($vstr['type_procedur']) && $vstr['type_procedur']!=''){echo $vstr['type_procedur'];}}?>
</td>
  </tr>
    <?php endforeach; } }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>

</div>