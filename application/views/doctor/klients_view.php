<?$configs=$this->user_model->get_config();
if(isset($_GET['f'])){echo $_GET['f'];}?>

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
<?include 'find_doctor.php';?>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList sortTable">
    <thead>
  <tr>
    <th width="8%">ФИО</th>
    <th width="8%">Статус клиента</th>
    <th width="5%">Возраст</th>
    <th width="10%">Телефон</th>
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
   //foreach ($klient as $klientus):
   foreach ($klient_vstr as $vstr):
    //$klientss_vstr=$this->user_model->get_klients_vstr_resep1($klientus['id']);
    $klientus=$this->stelemarket_model->get_klients_sresep1($vstr['id_client']);
if($configs['color_serv_doc']=='on'){
    if($klientus['otkaz_tm']==1 || isset ($klientss_vstr['otkaz']) && $klientss_vstr['otkaz']==1)
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
  <tr <?if(isset($status)){echo $status;}?> data-href="/doctor/edit?id=<?=$klientus['id'];?>">
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><? if($klientus['status']==0){echo 'Лояльный';}else{echo 'Негатив';}?></td>
    <td><?=$klientus['vozrast'];?></td>
    <td><?=$klientus['phone'];?></td>
  </tr>
    <?php endforeach; } }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>

</div>