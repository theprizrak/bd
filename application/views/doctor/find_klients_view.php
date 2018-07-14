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
    if (count($klient)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Клиент не найден!</strong>
</div>
    ';
   }
   else {
   foreach ($klient as $klientus):
    /*$klientss_vstr=$this->user_model->get_klients_vstr_resep1($klientus['id']);
    if($klientus['otkz_vstr']==1)
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
    }*/
    ?>
  <tr <?//if(isset($status)){echo $status;}?> data-href="/doctor/edit?id=<?=$klientus['id'];?>">
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><? if($klientus['status']==0){echo 'Лояльный';}else{echo 'Негатив';}?></td>
    <td><?=$klientus['vozrast'];?></td>
    <td><?=$klientus['phone'];?></td>
	</tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>

</div>