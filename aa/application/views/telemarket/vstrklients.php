<div id="middle">
<br />
<!--<form action="/telemarketing/find" method="post" name="find_klient">
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">������� ����� �������</td>
    <td width="22%"><input name="phone" class="tel" type="text"></td>
    <td width="37%" align="left"><input name="find_ok" type="submit" value="�����"></td>
  </tr>
  <tr>
    <td width="20%">������� ������� �������</td>
    <td width="22%"><input name="family" type="text"></td>
    <td width="37%" align="left"><input name="find_fam_ok" type="submit" value="�����"></td>  
  </tr>
  <tr>
    <td width="20%">������� ��� �������</td>
    <td width="22%"><input name="name" type="text"></td>
    <td width="37%" align="left"><input name="find_name_ok" type="submit" value="�����"></td>  
  </tr>
  <tr>
    <td width="20%">������� �������� ��������</td>
    <td width="22%"><input name="otch" type="text"></td>
    <td width="37%" align="left"><input name="find_otch_ok" type="submit" value="�����"></td>  
  </tr>
</table>
</form> -->
<table width="320" border="0" cellspacing="0" cellpadding="0">
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
  <thead>
  <tr>
	<td>���� ����������</td>
    <td width="260">���</td>
    <td width="110">�������</td>
    <td width="110">���. �������</td>
    <td width="150">������������</td>
    
    <td width="40">�����</td>
    <td width="150">�������</td>
    <td width="40">������</td>
    <td width="40">������</td>
   <td width="120">���� �������</td>
   <td width="120">����� �������</td>
   <td width="120">�/�</td>
  </tr>
  </thead>
  <tbody>
   <?php
   if ($info==1){
    echo '
    <div id="dialog" title="����">
    <strong>������� ������� ��������</strong>
    </div>
    ';
   }
   if ($info==2){
    echo '
    <div id="dialog" title="����">
    <strong>������� ������� �������</strong>
    </div>
    ';
   }
    if (count($klient)==0){
    echo '
<div id="dialog" title="����">
<strong>������/������� �� ������!</strong>
</div>
    ';
   }
   else {
    foreach ($klient as $klientus):
    $ff='vstr'.$klientus['id'];
    
    $klientss_vstr=$this->user_model->get_klients_vstr_resep1($klientus['id']);
    if($klientus['procedura']==1 && $klientus['otkaz']=='')
    {$status='id="ok"';}
    elseif($klientus['procedura']==0 && $klientus['otkaz']!=='')
    {$status='id="fall"';}
    elseif($klientus['perezvon']==1)
    {$status='id="call"';}
    elseif($klientus['procedura']==3)
    {$status='id="ok_proc"';}
    else
    {$status='';}
    ?>
  <tr <?if(isset($status)){echo $status;}?> data-href="/telemarketing/edit?id=<?=$klientus['id'];?>">
	<td><?=$klientus['date_dobav'];?></td>
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td><?=$klientus['phone'];?></td>
    <td><?=$klientus['dop_phone'];?></td>
    <td><?=$klientus['user'];?></td>
    <!--<td><?=$klientus['type_procedur'];?></td>
    <td><?=$klientus['date_vstr'];?></td>-->
    
    <td>
    <?
    if(!empty($klientss_vstr)){
            if($klientss_vstr['prichotkaza']=='')
            {echo '���';}
            else{echo '��';}
        }
        else{echo '������';}
    ?>
    
    </td>
    <td><?
    if($klientus['procedura']==0)
    {
        if(!empty($klientss_vstr)){
            if($klientss_vstr['ok']!=1)
            {echo '�� ������������';}
            else{
            if($klientss_vstr['prichotkaza']=='')
            {echo '���������';}
            else{echo '�� ���������';}
            }
        }
        else{echo '�� ���������';}
    }
    elseif($klientus['procedura']==1){echo '�������';}
    elseif($klientus['procedura']==2){echo '�� ���������';}
    elseif($klientus['procedura']==3){echo '������';}
    ?>
    </td>
    <td></td>
    <td><?if($klientus['prodaza']==1){echo'��';}else{echo'���';}?></td>
    <td></td>
	<td><?=$klientus['predpod'];?></td>
    <td></td>
<!--<td><?=$klientss_vstr['id'];?> </td>
	<td><?=$klientss_vstr['time_vstr'];?> </td>-->
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
</tbody>
</table>
<? /*foreach($vstr as $vsstr):
echo $vsstr['user'].'<br>';
endforeach;*/?>

</div>