<?
/*if(isset($brichday))
{
$D=date("d");
$M=date("m");
$Y=date("Y");
$tmp = explode(".", $brichday);
$ss=$Y-$tmp[2];
if($M>=$tmp[1] && $D>=$tmp[0])
{}
else {$ss=$ss-1;}
}*/
?>
<script >
  function otkazzz()
    {
        var otkaz = $('select[name="otkaz"]').val();
        if(otkaz==1)
        {$('#Sel1').fadeIn(500);}
        else
        {$('#Sel1').fadeOut(500);}
    }
      function otkazz2()
    {
        var otkaz2 = $('select[name="prichotkaza"]').val();
        if(otkaz2=='Другое')
        {$('#Sel2').fadeIn(500);}
        else
        {$('#Sel2').fadeOut(500);}
    }
    
    
 function proce()
    {
        var proc = $('select[name=klient_go]').val();
        if(proc==1)
        {$('#pro1').fadeIn(500);}
        else
        {$('#pro1').fadeOut(500);}
    }
     function kosmetols()
    {
        var proc = $('select[name=procedura]').val();
        if(proc==1 || proc==2)
        {$('.pro3').fadeOut(300);$('#pro2').fadeIn(500);}
        else if(proc==3)
        {$('#pro2').fadeOut(300);$('.pro3').fadeIn(500);}
        else{$('#pro2').fadeOut(500);$('.pro3').fadeOut(500);}
    }
    
</script>
<div id="middle">
<form action="/reseption/" method="post" name="add_klients">
<input type="text" name="id" class="add" value="<?=$id;?>" readonly style="visibility:hidden;width: 1px;height: 1px;">
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
    <input type="text" name="brichday" class="add datepicker" value="<?if(!empty($brichday)){echo $this->user_model->rotate_date2($brichday);};?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Возраст</td>
    <td width="67%">
    <input type="text" name="vozrast" maxlength="3" class="add" value="<?=$vozrast;?>" readonly>
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
  <?if(!isset($klientss_vstr['otkaz']))
  {}
  else
  {
  if($klientss_vstr['otkaz']==1)
  {?>
  <tr style="background: #F16C6C;">
    <td height="23" colspan="2" style="font-size: 18px;">Клиент отказался от встречи</td>
  </tr>
    <tr style="background: #F16C6C;">
    <td height="23">Причина отказа</td>
    <td><textarea readonly="readonly" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"><?if($klientss_vstr['prichotkaza']!=''){echo $klientss_vstr['prichotkaza'];}elseif($klientss_vstr['text_prichotkaza']!=''){echo $klientss_vstr['text_prichotkaza'];}$klientss_vstr['prichotkaza'];?></textarea></td>
  </tr>
    <?
  }
  else
  {
  if(!empty($klientss_vstr)){
        //foreach($klientss_vstr as $klientus_vstr):
        ?>
  <tr>
    <td height="23">Встреча</td>
    <td><input type="text" class="add <?if($klientss_vstr['ok']==1){echo 'vstr_ok';}else{echo 'vstr_fall';}?>" value="<?if($klientss_vstr['ok']==1){echo 'Подтверждена';}else{echo 'Не подтверждена';};?>" readonly></td>
  </tr>
  <tr>
    <td height="23">Дата встречи</td>
    <td><input type="text" name="date_vstr" class="add" value="<?=$this->user_model->rotate_date2($klientss_vstr['date_vstr']);?>" readonly></td>
  </tr>
    <tr>
    <td height="23">Время встречи</td>
    <td><input type="text" name="time_vstr" class="add" value="<?=$klientss_vstr['time_vstr'];?>" readonly></td>
  </tr>
    <tr>
    <td height="23">Тип процедуры</td>
    <td>
    <input type="text" name="type_procedur" class="add" value="<?if($klientss_vstr['type_procedur']!=''){echo $klientss_vstr['type_procedur'];}elseif($klientss_vstr['sproc']!=''){echo $klientss_vstr['sproc'];}?>" readonly>
    </td>
  </tr>
  <tr>
    <td height="23">Пришел</td>
   <td>
    <select name="klient_go" class="select" onchange="proce()">
    <option value="0" <?php if($klientss_vstr['klient_go']==0){echo 'selected="selected"';} ?>>Нет</option>
    <option value="1" <?php if($klientss_vstr['klient_go']==1){echo 'selected="selected"';} ?>>Да</option>
    </select>
   </td>
  </tr>
  <tr id="pro1" <?if($klientss_vstr['klient_go']==1){}else{echo'style="display: none;"';}?>>
    <td height="23">Статус</br>Встречи</td>
    <td>
    <select name="procedura" class="select" onchange="kosmetols()">
    <option value="0" <?php if($klientss_vstr['procedura']==0){echo 'selected="selected"';} ?>>&nbsp;</option>
    <option value="1" <?php if($klientss_vstr['procedura']==1){echo 'selected="selected"';} ?>>Ожидает</option>
    <option value="2" <?php if($klientss_vstr['procedura']==2){echo 'selected="selected"';} ?>>На процедуре</option>
    <option value="3" <?php if($klientss_vstr['procedura']==3){echo 'selected="selected"';} ?>>Прошел</option>
    </select>
    </td>
  </tr>
   <tr id="pro2" <?if($klientss_vstr['klient_go']==1 && $klientss_vstr['procedura']==2 || $klientss_vstr['procedura']==1){}else{echo'style="display: none;"';}?>>
    <td height="23">Косметолог</td>
    <td>
    <input type="text" name="old_kosmet" class="add" value="<?=$klientss_vstr['kosmetolog'];?>" readonly style="display:none">
    <select name="kosmetolog" class="select">
    <?
     if($klientss_vstr['kosmetolog']!='')
    {?>
        <option value="<?=$klientss_vstr['kosmetolog'];?>"  style="background: rgb(58, 163, 62);"><?=$klientss_vstr['kosmetolog'];?></option>
    <?
        foreach($kosmet as $kosmmm):
    ?>
        <option value="<?=$kosmmm["family"].' '.$kosmmm["name"];?>" <?if($klientss_vstr["kosmetolog"]==$kosmmm["family"].' '.$kosmmm["name"]){echo 'style="display:none"';}?> ><?=$kosmmm["family"].' '.$kosmmm["name"];?></option>
   <? endforeach;
    }
    else{
    if(!empty($kosmet)){
    foreach($kosmet as $kosmmm):
    ?>
        <option value="<?=$kosmmm["family"].' '.$kosmmm["name"];?>" <?if($klientss_vstr['kosmetolog']==$kosmmm["family"].' '.$kosmmm["name"]){echo 'selected="selected"';}?> ><?=$kosmmm["family"].' '.$kosmmm["name"];?></option>
        
    <? endforeach;}
    else{?>
    <option value="">Нет свободных косметологов</option>
    <?}}?>
    </select>
    </td>
  </tr>
   <tr class="pro3" <?if($klientss_vstr['klient_go']==1 && $klientss_vstr['procedura']==3){}else{echo'style="display: none;"';}?>>
    <td height="23">Рекомендации</td>
    <td>
    <input type="text" name="recomendation" class="add" value="<?=set_value('recomendation');?>">
    </td>
  </tr>
     <!--<tr class="pro3" <?if($klientss_vstr['klient_go']==1 && $klientss_vstr['procedura']==3){}else{echo'style="display: none;"';}?>>
    <td height="23">Продажа</td>
    <td>
    <input type="checkbox" name="prodazha" <?if($klientss_vstr['prodazha']==1) echo'checked="checked"';?>>
    </td>
  </tr>-->
  <tr>
    <td height="23">Отказ</td>
    <td>
    <select name="otkaz" class="select" onchange="otkazzz()">
    <option value="0" <?php if($klientss_vstr['otkaz']==0){echo 'selected="selected"';} ?>>Нет</option>
    <option value="1" <?php if($klientss_vstr['otkaz']==1){echo 'selected="selected"';} ?>>Да</option>
    </select>
   </tr>
   <? if($klientss_vstr['otkaz']==1){?>
    <tr>
    <td height="23">Причина отказа</td>
    <td><textarea name="text_prichotkaza" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"><?if($klientss_vstr['text_prichotkaza']!=''){echo $klientss_vstr['text_prichotkaza'];}$klientss_vstr['prichotkaza'];?></textarea></td>
  </tr>
   <?}
   else{?>
     <tr id="Sel1" style="display: none;">
    <td height="23">Причина отказа</td>
    <td>
    <select name="prichotkaza" class="select" onchange="otkazz2()">
    <option value="" selected="selected"></option>
    <option value="Аллергия" <?//php if($otkazon==0){echo 'selected="selected"';} ?>>Аллергия</option>
    <option value="Противопаказания" <?//php if($otkazon==1){echo 'selected="selected"';} ?>>Противопаказания</option>
    <option value="Репутация компании" <?//php if($otkazon==1){echo 'selected="selected"';} ?>>Репутация компании</option>
    <option value="Не успевает" <?//php if($otkazon==1){echo 'selected="selected"';} ?>>Не успевает</option>
    <option value="Другое" <?//php if($otkazon==1){echo 'selected="selected"';} ?>>Другое</option>
    </select>
   </tr>
  <tr id="Sel2" style="display: none;">
    <td height="23">Причина отказа</td>
    <td><textarea name="text_prichotkaza" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"><?=set_value('otkaz',$klientss_vstr['prichotkaza']);?></textarea></td>
  </tr>
  <?}}}}?>
</table>
<a href="javascript:javascript:history.go(-1)"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a>
<?if(isset($klientss_vstr['otkaz']) && $klientss_vstr['otkaz']==0){?><input name="edit_ok" type="submit" value="Сохранить" class="buttons"><?}?>
</form>

</div>