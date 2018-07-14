<? $us=$this->session->userdata('family')." ".$this->session->userdata('name');
$configs=$this->auth_lib->config_site(); // настройки сайта 
//постраничная навигация по встречам
//$this->load->view('pagination_vstr.php');
include ('pagination_vstr.php');
$config['per_page'] = $configs['num_vstr_przvn'];
$config['base_url'] = base_url().'/sreseption/edit';
$config['total_rows'] = count($this->stelemarket_model->get_klients_vstr_tel_pag($id));
$this->pagination->initialize($config);

?>
<script >
  function otkazzz()
    {
        var otkaz = $('select[name="otkazon"]').val();
        if(otkaz==1)
        {$('#Sel1').fadeIn(500);}
        else
        {$('#Sel1').fadeOut(500);}
    }
      function otkazz2()
    {
        var otkaz = $('select[name="otkaz2"]').val();
        if(otkaz='Другое')
        {$('#Sel2').fadeIn(500);}
        else
        {$('#Sel2').fadeOut(500);}
    }
    
    
 function proce(id)
    {
        var proc = $('select[name=klient_go'+id+']').val();
        if(proc==1)
        {$('#pro1'+id+'').fadeIn(500);}
        else
        {$('#pro1'+id+'').fadeOut(500);$('#pro2').fadeOut(500);}
    }
     function kosmetols(id)
    {
        var proc = $('select[name=procedura'+id+']').val();
        if(proc==1 || proc==2)
        {$('.pro3'+id+'').fadeOut(300);$('#pro2'+id+'').fadeIn(500);}
        else if(proc==3)
        {$('#pro2'+id+'').fadeOut(300);$('.pro3'+id+'').fadeIn(500);}
        else{$('#pro2'+id+'').fadeOut(500);$('.pro3'+id+'').fadeOut(500);}
    }
function newvstr_stel()
{
$('#new_proc').css('display','block');
}
//звкрытия окна добавления встречи
function newvstr_stel_close()
{
    $('#new_proc').css('display','none');
}
</script>

<style>
#textnew {
font-size: 10px;
}
body {
font-family: Tahoma;
padding: 0px;
margin: 0px;
background: #ccc;
}
.V {
font-size: 13px;
}
div.storoni {
//float: left;
width: 500px;
display: table-cell;
}
</style>
<div id="middle">
<form method="post" name="add_klients" id="add_klients">
<input type="text" name="id" class="add" value="<?=$id;?>" readonly style="display: none;width: 1px;height: 1px;">
<input type="text" name="edit_ok" class="add" value="edit_ok" readonly style="display: none;width: 1px;height: 1px;">
<input name="who_user" class="add" value="serv" style="width: 1px;height: 1px;display: none;" type="text">
<table width="50%" border="0" cellspacing="0" cellpadding="0" style="float: left;">
  <tr>
    <td width="33%" height="23">Фамилия</td>
    <td width="67%">
    <input type="text" name="family" class="add" value="<?=set_value('family',$family);?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Имя</td>
    <td width="67%">
    <input type="text" name="name" class="add" value="<?=set_value('name',$name);?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Отчество</td>
    <td width="67%">
    <input type="text" name="lastname" class="add" value="<?=set_value('lastname',$lastname);?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Дата рождения</td>
    <td width="67%">
    <input type="text" name="brichday" class="add datepicker" value="<?if(!empty($brichday)){echo $this->user_model->rotate_date2($brichday);};?>">
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Возраст</td>
    <td width="67%">
    <input type="text" name="vozrast" maxlength="3" class="add" value="<?=set_value('vozrast',$vozrast);?>" >
   </td>
  </tr>  
  <tr>
    <td height="23">Статус клиента</td>
    <td>
    <select name="status" class="select">
    <option value="0" <?php if($status==0){echo 'selected="selected"';} ?>>Лояльный</option>
    <option value="1"<?php if($status==1){echo 'selected="selected"';}; ?>>Негатив</option>
    </select>
    </td>
  </tr>
  <tr>
    <td height="23">Телефон</td>
    <td><input type="text" name="phone" class="add tel" value="<?=set_value('phone',$phone);?>"></td>
  </tr>
  <tr>
    <td height="23">Сотрудник</td>
    <td><input type="text" name="user" class="add" value="<?=set_value('user',$user);?>" readonly></td>
  </tr>
  </form>
</table>

<table class="klient_recom" border="0" cellspacing="0" cellpadding="0">
<thead>
<tr>
<td><b>Рекомендации</b></td>
<td><b>Противопоказания</b></td>
</tr>
</thead>
<tbody>
<tr>
<td><?if(!empty($klients_recom)){?><textarea class="doc_textarea"><?=$klients_recom['recomendation'];?></textarea><?}?></td>
<td><?if(!empty($klients_recom)){?><textarea class="doc_textarea"><?=$klients_recom['contraindications'];?></textarea><?}?></td>
</tr>
</tbody>
</table>

<table class="vstr1" style="background: #A8F3AE;padding: 0 0px;<?//if($vstrecha==0){echo"display:none;";}?>"  width="100%" border='0' cellspacing="0" cellpadding="0">
    <thead>
    <tr>
    <td colspan="10"><?=$this->pagination->create_links();?></td>
    </tr>
    <tr>
    <td></td>
    <td style="font-weight: bold">Сотрудник</td>
    <td style="font-weight: bold">Дата встречи</td>
    <td style="font-weight: bold">Время встречи</td>
    <td style="font-weight: bold">Тип процедуры</td>
    <td style="font-weight: bold">Комментарий</td>
    <td style="font-weight: bold">Пришел</td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    </thead>
    <tbody id="newvstr">
    <?   
    $klientss_vstr = $this->stelemarket_model->get_klients_vstr_tel($id,$config['per_page'],$this->uri->segment(3));
    if($klientss_vstr!=0)
    {
        foreach($klientss_vstr as $klientus_vstr):
        ?>
        <tr <?if($klientus_vstr['otkaz']==1){echo'style="background: #F58F8F;"';}?>>
        <td><?if($klientus_vstr['otkaz']==0){if($klientus_vstr['klient_go']==1 && $klientus_vstr['procedura']==3){}else{?><div class="edit_vstr"><img title="Отказ от встречи" src="<?= base_url();?>/images/otkz.png" width="20" height="20" onclick="otkz_vstr_sresep('<?=$klientus_vstr['id'];?>','<?=$id;?>')" style="cursor: pointer;"/></div><?}}?></td>
        <td><?if($klientus_vstr['user']!=''){echo $klientus_vstr['user'];}?></td>
        <td><input type="text" name="date_vstr<?=$klientus_vstr['id'];?>" class="add1 <?if($klientus_vstr['otkaz']!=1){echo'datepicker';}?>" value="<?=$this->user_model->rotate_date2($klientus_vstr['date_vstr']);?>" <?if($klientus_vstr['otkaz']==1){echo'readonly';}?>></td>
        <td><input type="text" name="time_vstr<?=$klientus_vstr['id'];?>" class="add1 <?if($klientus_vstr['otkaz']!=1){echo'time';}?>" value="<?=$klientus_vstr['time_vstr'];?>" <?if($klientus_vstr['otkaz']==1){echo'readonly';}?>></td>
        <td>
        <?
        if(isset($klientus_vstr['sproc']) && $klientus_vstr['sproc']!=''){
        $spoced=explode(";", $klientus_vstr['sproc']);
        $i=0;
        foreach($spoced as $spocedurs)
        {?>
           <?=$spocedurs; echo "</br>";?>
        <? $i++; }}
        if(isset($klientus_vstr['type_procedur']) && $klientus_vstr['type_procedur']!=''){echo $klientus_vstr['type_procedur'];}
        ?>
        </td>
        <td>
        <?=$klientus_vstr['comments'];?>
        </td>
        <?if($klientus_vstr['otkaz']!=1){?>
        <td>
        <?if($klientus_vstr['klient_go']==1 && $klientus_vstr['procedura']==3){echo "Процедура пройдена";}else{?>
        <select name="klient_go<?=$klientus_vstr['id'];?>" class="select" onchange="proce('<?=$klientus_vstr['id'];?>')">
        <option value="0" <?php if($klientus_vstr['klient_go']==0){echo 'selected="selected"';} ?>>Нет</option>
        <option value="1" <?php if($klientus_vstr['klient_go']==1){echo 'selected="selected"';} ?>>Да</option>
        </select>
        <?}?>
        </td>
        <td id="pro1<?=$klientus_vstr['id'];?>" <?if($klientus_vstr['klient_go']==1){}else{echo'style="display: none;"';}?>>
        <?if($klientus_vstr['klient_go']==1 && $klientus_vstr['procedura']==3){}else{?>
        <select name="procedura<?=$klientus_vstr['id'];?>" class="select" onchange="kosmetols('<?=$klientus_vstr['id'];?>')">
        <option value="0" <?php if($klientus_vstr['procedura']==0){echo 'selected="selected"';} ?>>&nbsp;</option>
        <option value="1" <?php if($klientus_vstr['procedura']==1){echo 'selected="selected"';} ?>>Ожидает</option>
        <option value="2" <?php if($klientus_vstr['procedura']==2){echo 'selected="selected"';} ?>>На процедуре</option>
        <option value="3" <?php if($klientus_vstr['procedura']==3){echo 'selected="selected"';} ?>>Прошел</option>
        </select>
        <?}?>
        </td>
        <td  id="pro2<?=$klientus_vstr['id'];?>" <?if($klientus_vstr['klient_go']==1 && $klientus_vstr['procedura']==2 || $klientus_vstr['procedura']==1){}else{echo'style="display: none;"';}?>>
        <input type="text" name="old_doctor<?=$klientus_vstr['id'];?>" class="add" value="<?=$klientus_vstr['doctor'];?>" readonly style="display:none">
        <select name="doctor<?=$klientus_vstr['id'];?>" class="select">
        <option value=""></option>
        <?
         if(!$klientus_vstr['doctor']=='')
        {?>
            <option value="<?=$klientus_vstr['doctor'];?>" style="background: rgb(58, 163, 62);" selected="selected"><?=$klientus_vstr['doctor'];?></option>
        <?
            foreach($doctor as $doctors):
        ?>
            <option value="<?=$doctors["family"].' '.$doctors["name"];//$kosmmm["id"];?>" <?if($klientus_vstr["doctor"]==$doctors["family"].' '.$doctors["name"]){echo 'style="display:none"';}?>><?=$doctors["family"].' '.$doctors["name"];?></option>
       <? endforeach;
        }
        else
        {
        if(empty($doctor))
        {?>
        <option value="">Нет свободных врачей</option>
        <?
        }
        else
        {
        foreach($doctor as $doctors):
        ?>
            <option value="<?=$doctors["family"].' '.$doctors["name"];//$kosmmm["id"];?>"><?=$doctors["family"].' '.$doctors["name"];?></option>
       <? endforeach;
        }
        }
        ?>
        </select>
        </td>
        <td>
        <?if($klientus_vstr['klient_go']==1 && $klientus_vstr['procedura']==3){}else{?>
        <input name="edit_ok" type="button" value="Сохранить" class="buttons_fil" onclick="safevstrsresep('<?=$klientus_vstr['id'];?>')">
        <?}?>
        </td>
        <td>
        <form method="post" name="print_vstr_klients" id="print_vstr_klients<?=$klientus_vstr['id'];?>">
        <input type="text" name="id_klient" value="<?=$id;?>" style="width: 0px; height: 0px; display: none;">
        <input type="text" name="id_vstr" value="<?=$klientus_vstr['id'];?>" style="width: 0px; height: 0px; display: none;">
        <input type="submit" value="Печать" class="buttons_fil"   onClick="document.getElementById('print_vstr_klients<?=$klientus_vstr['id'];?>').action='/sreseption/karta'"/></form>
        </td>
        <?} else {?>
        <td></td>
        <td colspan="3"><?=$klientus_vstr['text_prichotkaza'];?></td>
        <?}?>
        </tr>
       
        <?
        endforeach;
    }?>
<?if($configs['add_vstr_rserv']=='on'){?><tr><td colspan="9" align="center" class="ss1" style="height: 40px;"><a class="buttons" id="avst" onclick="newvstr_stel()">Добавить встречу</a></td></tr><?}?>
    </tbody>
    </table>
   
<a href="javascript:javascript:history.go(-1)"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a> 
<!--<a href="/sreseption"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a>-->
<input name="edit_ok" type="button" value="Сохранить" class="buttons" onclick="safeklientsresep('<?=$id;?>')">
</div>


<div id="new_proc" style="display: none;">
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td width="40%" style="vertical-align: top;">

<table>
<tr class="vstr1 otkz">
    <td height="23">Дата встречи</td>
    <td><input type="text" name="date_vstr" class="add datepicker" onchange="date_proc('1')" value="<?=set_value('date_vstr');?>" ></td>
  </tr>
  <tr class="vstr1 otkz">
    <td height="23">Процедуры</td>
<td>
      <select name="sproc" class="select" disabled="disabled" onchange="date_proc('2')" >
      <option value="">&nbsp;</option>
    <?
    $querys=$this->user_model->get_proc();
    foreach ($querys as $proc):
    ?>
    <option value="<?=$proc['name_proc'];?>"><?=$proc['name_proc'];?></option>
    <?
    echo "</br>";
    //if($i%1){}else{echo "</br>";} $i++; 
     endforeach;?>
     </select>  
    </td>
  </tr>
  <tr class="vstr1 otkz">
  <td height="23">Врач</td>
  <td>
  <select name="doctor" class="select" disabled="disabled" onchange="date_proc()" >
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
        <option value="<?=$doctors["family"].' '.$doctors["name"];//$kosmmm["id"];?>"><?=$doctors["family"].' '.$doctors["name"];?></option>
   <? endforeach;
    }
    ?>
    </select>
        </td>
  </tr>
<tr class="vstr1 otkz"> 
    <td height="23">Время встречи</td>
    <td><input type="text" name="time_vstr" id="time_vstr" onblur="timevstrs()" class="add time" value="<?=set_value('time_vstr');?>"></td>
  </tr>
  <tr>
    <td height="23">Отказ от встречи</td>
    <td>
    <select name="otkaz" class="select" onchange="otkazvstr()">
    <option value="0" <?php echo set_select('otkaz', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php echo set_select('otkaz', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>
  <tr class="Sel2" style="display: none;">
    <td height="23">Причина отказа</td>
    <td><textarea name="text_prichotkaza" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"><?=set_value('prichotkaza');?></textarea></td>
  </tr>
  <input name="user" type="text" class="add1" value="<?=$us;?>" readonly="readonly" style="width: 1px;height: 1px;visibility: hidden;">
</table>

</td>
<td width="60%" style="vertical-align: top;">
<table class="time_proc" cellspacing="0" cellpadding="0">
<thead>
<th>№</th>
<th>Время</th>
<th>Процедура</th>
</thead>
<tbody>
</tbody>
</table>
</td>
</tr>
<tr><td colspan="2"><input name="edit_ok" type="button" onclick="savesvstr_sresep()" value="Сохранить" class="buttons"><input type="button" onclick="newvstr_stel_close()" value="Отмена" class="buttons"></td></tr>
</table>
</div>