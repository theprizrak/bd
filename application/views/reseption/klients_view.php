<div id="middle">
<?include 'find_resep.php';$configs=$this->auth_lib->config_site(); // настройки сайта?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList sortTable">
  <thead>
  <tr>
	<th width="5%">id</th>
    <th width="30%">ФИО</th>
    <th width="10%">Статус клиента</th>
    <th width="7%">Возраст</th>
    <th width="14%">Телефон</th>
	<th width="14%">Доп.Телефон</th>
	<th width="15%">Подтверждена</th>
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
if($configs['color_resep']=='on'){
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
}
    ?>
  <tr <?if(isset($status)){echo $status;}?> data-href="/reseption/edit?id=<?=$klientus['id'];?>">
	<td><?=$klientus['id'];?></td>
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><? if($klientus['status']==0){echo 'Лояльный';}else{echo 'Негатив';}?></td>
    <td><?=$klientus['vozrast'];?></td>
    <td><?=$klientus['phone'];?></td>
	<td><?=$klientus['dop_phone'];?></td>
	<td><?if(!empty($klientss_vstr)){if($klientss_vstr['ok']==1){echo "Подтверждена";}else{echo "Не подтверждена";}}?></td>
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>

</div>