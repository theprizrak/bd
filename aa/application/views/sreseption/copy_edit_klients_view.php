<? $us=$this->session->userdata('family')." ".$this->session->userdata('name'); ?>
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
 function newvstr()
{
$('.ss1').css('height', 0);
$('.Sel1').fadeIn(100);
$('#avst').fadeOut(100);
$('#azvon').fadeOut(100);
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
<!--<div id="filter">
<input type="submit" value="Печать" class="buttons_fil"  onClick="document.getElementById('add_klients').action='/sreseption/karta'"/>

</div>-->
<input type="text" name="id" class="add" value="<?=$id;?>" readonly style="display: none;width: 1px;height: 1px;">
<input type="text" name="edit_ok" class="add" value="edit_ok" readonly style="display: none;width: 1px;height: 1px;">
<input name="who_user" class="add" value="serv" style="width: 1px;height: 1px;display: none;" type="text">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
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

<table class="vstr1" style="background: #A8F3AE;padding: 0 0px;<?//if($vstrecha==0){echo"display:none;";}?>"  width="100%" border='0' cellspacing="0" cellpadding="0">
    <thead>
    <tr>
    <td></td>
    <td>Дата встречи</td>
    <td>Время встречи</td>
    <td>Тип процедуры</td>
    <td>Пришел</td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    </thead>
    <tbody id="newvstr">
    <?if($klientss_vstr!=0)
    {
        foreach($klientss_vstr as $klientus_vstr):
        ?>
        <tr <?if($klientus_vstr['otkaz']==1){echo'style="background: #FF0303;"';}?>>
        <td><?if($klientus_vstr['otkaz']==0){?><div class="edit_vstr"><img title="Отказ от встречи" src="<?= base_url();?>/images/otkz.png" width="20" height="20" onclick="otkz_vstr_sresep('<?=$klientus_vstr['id'];?>','<?=$id;?>')" style="cursor: pointer;"/></div><?}?></td>
        <td><input type="text" name="date_vstr<?=$klientus_vstr['id'];?>" class="add1 <?if($klientus_vstr['otkaz']!=1){echo'datepicker';}?>" value="<?=$this->user_model->rotate_date2($klientus_vstr['date_vstr']);?>" <?if($klientus_vstr['otkaz']==1){echo'readonly';}?>></td>
        <td><input type="text" name="time_vstr<?=$klientus_vstr['id'];?>" class="add1 <?if($klientus_vstr['otkaz']!=1){echo'time';}?>" value="<?=$klientus_vstr['time_vstr'];?>" <?if($klientus_vstr['otkaz']==1){echo'readonly';}?>></td>
        <td>
        <?
        $spoced=explode(";", $klientus_vstr['sproc']);
        $i=0;
        foreach($spoced as $spocedurs)
        {?>
           <?=$spocedurs; echo "</br>";?>
        <? $i++; } ?>
            
        </td>
        <?if($klientus_vstr['otkaz']!=1){?>
        <td>
        <select name="klient_go<?=$klientus_vstr['id'];?>" class="select" onchange="proce('<?=$klientus_vstr['id'];?>')">
        <option value="0" <?php if($klientus_vstr['klient_go']==0){echo 'selected="selected"';} ?>>Нет</option>
        <option value="1" <?php if($klientus_vstr['klient_go']==1){echo 'selected="selected"';} ?>>Да</option>
        </select>
        </td>
        <td id="pro1<?=$klientus_vstr['id'];?>" <?if($klientus_vstr['klient_go']==1){}else{echo'style="display: none;"';}?>>
        <select name="procedura<?=$klientus_vstr['id'];?>" class="select" onchange="kosmetols('<?=$klientus_vstr['id'];?>')">
        <option value="0" <?php if($klientus_vstr['procedura']==0){echo 'selected="selected"';} ?>>&nbsp;</option>
        <option value="1" <?php if($klientus_vstr['procedura']==1){echo 'selected="selected"';} ?>>Ожидает</option>
        <option value="2" <?php if($klientus_vstr['procedura']==2){echo 'selected="selected"';} ?>>На процедуре</option>
        <option value="3" <?php if($klientus_vstr['procedura']==3){echo 'selected="selected"';} ?>>Прошел</option>
        </select>
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
        <td><input name="edit_ok" type="button" value="Сохранить" class="buttons_fil" onclick="safevstrsresep('<?=$klientus_vstr['id'];?>')"></td>
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
    
  <tr class="Sel1" style="display: none;">
  <td></td>
  <td><input type="text" name="date_vstr" class="vstr add1 datepicker required" value="" ></td>
  <td><input type="text" name="time_vstr" class="add1 time required" value="" ></td>
  <td>
  <select name="sproc" class="select">
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
  <td><input name="user" type="text" class="add1" value="<?=$us;?>" readonly="readonly"></td>
  <td>
    <select name="doctor" class="select">
    <option value=""></option>
    <?if(!$klientus_vstr['doctor']==''){?>
        <option value="<?=$klientus_vstr['doctor'];?>" style="background: rgb(58, 163, 62);" selected="selected"><?=$klientus_vstr['doctor'];?></option>
    <?foreach($doctor as $doctors):?>
        <option value="<?=$doctors["family"].' '.$doctors["name"];//$kosmmm["id"];?>" <?if($klientus_vstr["doctor"]==$doctors["family"].' '.$doctors["name"]){echo 'style="display:none"';}?>><?=$doctors["family"].' '.$doctors["name"];?></option>
    <? endforeach;}else{
    if(empty($doctor))
    {?>
    <option value="">Нет свободных врачей</option>
    <?}else{
    foreach($doctor as $doctors):
    ?>
        <option value="<?=$doctors["family"].' '.$doctors["name"];//$kosmmm["id"];?>"><?=$doctors["family"].' '.$doctors["name"];?></option>
    <? endforeach;}}?>
    </select>
  </td>
  <td></td>
  <td></td>
  </tr>
  <tr class="Sel1" style="display: none;"><td colspan="5" style="text-align: center;"><input name="edit_ok" onclick="addvstrsresep()" type="button" value="Сохранить" class="buttons_fil"></td></tr>
    <tr><td colspan="11" align="center" class="ss1" style="height: 40px;"><a class="buttons" id="avst" onclick="newvstr()">Добавить встречу</a></td></tr>
    </tbody>
    </table>
   
<a href="javascript:javascript:history.go(-1)"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a> 
<!--<a href="/sreseption"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a>-->
<input name="edit_ok" type="button" value="Сохранить" class="buttons" onclick="safeklientsresep('<?=$id;?>')">

</div>