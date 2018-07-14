<script type="text/javascript">
function perezzzzvon()
{
   var el=$('select[name="perezvon"]').val();
   if(el==1)
   { $('.Sel1').fadeIn(300); }
   else
   { $('.Sel1').fadeOut(300); }
}

function vstrrre()
{
   var el=$('select[name="vstrecha"]').val();
   if(el==1)
   { $('.vstr1').fadeIn(300); }
   else
   { $('.vstr1').fadeOut(300); }
}
function otkazvstr()
{
   var el=$('select[name="otkaz"]').val();
   if(el==1)
   { $('.Sel2').fadeIn(300);$('.otkz').fadeOut(300);}
   else
   { $('.Sel2').fadeOut(300);$('.otkz').fadeIn(300);}
}
</script>
<div id="time_proc">
<table class="time_proc" cellspacing="0" cellpadding="0">
<thead>
<th>№</th>
<th>Время</th>
<th>Процедура</th>
</thead>
<tbody>
</tbody>
</table>
</div>
<div id="middle">
<form action="/stelemarketing" method="post" name="add_klients" id="jform">
<table width="50%" border="0" cellspacing="0" cellpadding="0">
<input type="text" name="date_dobav" class="add" value="<?=date('Y-m-d');?>" style="width: 1px;height: 1px;display: none;">
<input type="text" name="who_user" class="add" value="serv" style="width: 1px;height: 1px;display: none;">

  <tr>
    <td width="33%" height="23">Фамилия</td>
    <td width="67%">
    <input type="text" name="family" id="family" class="add" value="<?=set_value('family');?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Имя</td>
    <td width="67%">
    <input type="text" name="name" id="name" class="add" value="<?=set_value('name');?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Отчество</td>
    <td width="67%">
    <input type="text" name="lastname" id="lastname" class="add" value="<?=set_value('lastname');?>" >
   </td>
  </tr>
    <tr>
    <td width="33%" height="23">Возраст</td>
    <td width="67%">
    <input type="text" name="vozrast" id="vozrast" maxlength="2" class="add" value="<?=set_value('vozrast');?>" >
   </td>
  </tr>
  <tr>
    <td height="23">Телефон</td>
    <td><input type="text" name="phone" id="phone" onblur="phones()" class="add tel" value="<?=set_value('phone');?>" ></td>
  </tr>
    <tr>
    <td height="23">Доп. Телефон</td>
    <td><input type="text" name="dop_phone" id="dop_phone" class="add tel" value="<?=set_value('dop_phone');?>" ></td>
  </tr>
  <tr>
    <td height="23">Статус клиента</td>
    <td>
    <select name="status" class="select">
    <option value="0" <?php echo set_select('status', '0', TRUE); ?>>Лояльный</option>
    <option value="1"<?php echo set_select('status', '1'); ?>>Негатив</option>
    </select>
    </td>
    </tr>
    <!--<tr>
    <td height="23">Отказ от встречи</td>
    <td>
    <select name="otkaz" class="select" onchange="otkazvstr()">
    <option value="0" <?php echo set_select('otkaz', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php echo set_select('otkaz', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>-->
  <tr class="Sel2" style="display: none; background: #EDF3A8;">
    <td height="23">Причина отказа</td>
    <td><textarea name="prichotkaza" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"><?=set_value('prichotkaza');?></textarea></td>
  </tr>
  </tr>
    <tr style="background: #A8F3AE;" class="otkz">
    <td height="23" >Встреча</td>
    <td>
    <select name="vstrecha" class="select" onchange="vstrrre()">
    <option value="0" <?php echo set_select('vstrecha', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php echo set_select('vstrecha', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>
  <tr class="vstr1 otkz" style="display: none; background: #A8F3AE;">
    <td height="23">Дата встречи</td>
    <td><input type="text" name="date_vstr" class="add datepicker" onchange="date_proc('1')" value="<?=set_value('date_vstr');?>" ></td>
  </tr>
  <tr class="vstr1 otkz" style="display: none; background: #A8F3AE;">
    <td height="23">Процедуры</td>
<td>
      <select name="sproc" class="select" disabled="disabled" onchange="date_proc('2')" >
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
  <tr class="vstr1 otkz" style="display: none; background: #A8F3AE;">
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
<tr class="vstr1 otkz" style="display: none; background: #A8F3AE;"> 
    <td height="23">Время встречи</td>
    <td><input type="text" name="time_vstr" id="time_vstr" onblur="timevstrs()" class="add time" value="<?=set_value('time_vstr');?>"></td>
  </tr>
  </tr>
    <tr class="vstr1 otkz" style="display: none; background: #A8F3AE;"> 
    <td height="23">Комментарий к встречи</td>
    <td><textarea name="comments" style="resize: none;border: 1px solid #ccc;"><?=set_value('comments');?></textarea></td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td><input type="text" name="user" class="add" value="<? echo $this->session->userdata('family')." ".$this->session->userdata('name');?>" readonly style="visibility:hidden;width: 1px;height: 1px;"></td>
  </tr>
</table>
<input type="button" value="Сохранить" onclick="addClient()" class="buttons">
<input name="add_ok" type="submit" id="add_okkk" style="display: none;" value="Сохранить"  class="buttons">
</div>