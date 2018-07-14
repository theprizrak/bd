<div id="middle">
<?include 'find_stel.php';$configs=$this->auth_lib->config_site(); // настройки сайта?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList sortTable">
  <thead>
  <tr>
	<td width="10%">Дата добавления</td>
    <th width="20%">ФИО</th>
    <th width="10%">Телефон</th>
    <th width="10%">Доп. Телефон</th>
    <th width="10%">Пользователь</th>
    <td width="5%">Отказ</td>
    <td width="10%">Встреча</td>
    <td width="5%">Звонок</td>
    <td width="5%">Клиент</td>
    <th width="10%">Дата встречи</th>
    <td width="5%">П/П</td>
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
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $klientus=$this->stelemarket_model->get_klients_stel($userrrrs,$id);
if($configs['color_serv_tm']=='on'){
    if(!empty($klientus))
    {
    $klientss_vstr=$this->telemarket_model->get_klients_vstr_resep1($id);
    if($klientus['otkaz_serv']==1 || isset ($klientss_vstr['otkaz']) && $klientss_vstr['otkaz']==1)
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
  <tr <?if(isset($status)){echo $status;}?> data-href="/stelemarketing/edit?id=<?=$klientus['id'];?>">
	<td><?=$this->user_model->rotate_date2($klientus['date_dobav']);?></td>
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><?=$klientus['phone'];?></td>
    <td><?=$klientus['dop_phone'];?></td>
    <td><?=$klientus['user'];?></td>
    <td>
    <?
        if($klientus['otkaz_serv']==0)
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