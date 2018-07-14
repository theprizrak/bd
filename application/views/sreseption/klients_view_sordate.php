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
        $klientus=$this->stelemarket_model->get_klients_sresep($userrrrs,$id);
    if(!empty($klientus))
    {
    $klientss_vstr=$this->telemarket_model->get_klients_vstr_resep1($id);
if($configs['color_serv_resep']=='on'){
    if($klientus['otkaz_serv']==1 || isset ($vstr['otkaz']) && $vstr['otkaz']==1)
    {$status='id="fall"';}
    elseif($klientus['perezvon']==1)
    {$status='id="call"';}
    elseif(isset ($klientss_vstr['procedura']) && isset ($klientss_vstr['otkaz'])){
    if($klientss_vstr['procedura']==1 && $klientss_vstr['otkaz']!==1)
    {$status='id="ok"';}
    elseif($klientss_vstr['procedura']==3)
    {$status='id="ok_proc"';}
}
    else
    {$status='';}
    }
    ?>
    <tr <?if(isset($status)){echo $status;}?> data-href="/sreseption/edit?id=<?=$klientus['id'];?>">
	<!--<td><?=$klientus['id'];?></td>-->
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><? if($klientus['status']==0){echo 'Лояльный';}else{echo 'Негатив';}?></td>
    <td><?=$klientus['vozrast'];?></td>
    <td><?=$klientus['phone'];?></td>
	<td><?if(!empty($klientss_vstr)){if($klientss_vstr['ok']==1){echo "Подтверждена";}else{echo "Не подтверждена";}}?></td>
	<td><?=$klientus['user'];?></td>
	<td><?=$klientss_vstr['doctor'];?></td>
	<td><?=$this->user_model->rotate_date2($klientss_vstr['date_vstr']);?></td>
	<td><?=$klientss_vstr['time_vstr'];?></td>
 <td><?if(!empty($klientss_vstr)){if(isset($klientss_vstr['sproc']) && $klientss_vstr['sproc']!=""){echo $klientss_vstr['sproc'];}if(isset($klientss_vstr['type_procedur']) && $klientss_vstr['type_procedur']!=''){echo $klientss_vstr['type_procedur'];}}?></td>
  </tr>
    <?php } endforeach; }?>
    <? echo $this->pagination->create_links();?>
</tbody>
</table>
</div>