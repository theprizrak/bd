<? $us=$this->session->userdata('family')." ".$this->session->userdata('name');
$configs=$this->auth_lib->config_site(); // настройки сайта 
//постраничная навигация по встречам
//$this->load->view('pagination_vstr.php');
include ('pagination_vstr.php');
$config['per_page'] = $configs['num_vstr_przvn'];
$config['base_url'] = base_url().'/telemarketing/edit';
$config['total_rows'] = count($this->telemarket_model->get_klients_vstr_tel_pag($id));
$this->pagination->initialize($config);
?>
<script type="text/javascript">
$(document).ready(function(){
    	$("#demoForm").validate();
  	});
		$.validator.messages.required = "Заполните поле!";
function newvstr_tm()
{
var a=$('#newadd').length;
if(a==0){var b="newadd";}else{var b="newadd"+a+"";}
$('.ss1').css('height', 0);
$('.Sel1').fadeIn(100);
$('.Sel3').fadeIn(100);
$('#avst').fadeOut(100);
$('#azvon').fadeOut(100);
}
function newzvon()
{
var a=$('#newprzadd').length;
if(a==0){var b="newprzadd";}else{var b="newprzadd"+a+"";}
$('.ss2').css('height', 0);
$('.Selp').fadeIn(100);
$('#azvon').fadeOut(100);
$('#avst').fadeOut(100);
}

function otkazvstr()
{
   var el=$('select[name="otkaz"]').val();
   if(el==1)
   { $('.Sel2').fadeIn(300);$('.otkz').fadeOut(300);}
   else
   { $('.Sel2').fadeOut(300);$('.otkz').fadeIn(300);}
}
function otkzvstr()
{
   var el=$('select[name="otkaz_tm"]').val();
   if(el==1)
   { $('.otkz_vstr').fadeOut(300);}
   else
   { $('.otkz_vstr').fadeIn(300);$('.qwe').fadeOut(300);}
}

function dpicker()
{
$('$dpicker').datepicker(
{
changeMonth: true,
changeYear: true,
yearRange: "c-60:+0"
}
); 
 
}
</script>
<div id="middle">
<br />
<form action="/telemarketing" method="post" name="add_klients" id="demoForm">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<input type="text" name="id" class="add" value="<?=$id;?>" readonly style="visibility:hidden;width: 1px;height: 1px;">
<input type="text" name="date_dobav" class="add" value="<?=date('d.m.Y');?>" style="width: 1px;height: 1px;display: none;">
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
    <td width="33%" height="23">Возраст</td>
    <td width="67%">
    <input type="text" class="add" value="<?=$vozrast;?>" readonly>
   </td>
  </tr>
  <tr>
    <td height="23">Телефон</td>
    <td><input type="text" name="phone" class="add tel" value="<?=set_value('phone',$phone);?>" ></td>
  </tr>
  <tr>
    <td height="23">Статус клиента</td>
    <td>
    <select name="status" class="select">
    <option value="0" <?php if($status==0){echo 'selected="selected"';} ?><?php echo set_select('status', '0', TRUE); ?>>Лояльный</option>
    <option value="1" <?php if($status==1){echo 'selected="selected"';} ?><?php echo set_select('status', '1'); ?>>Негатив</option>
    </select>
    </td>
  </tr>
  <?php if($otkaz_tm==1){?>
  <tr class="qwe" style="background: #E62A2A;">
    <td height="23">Отказ</td>
    <td>
    <select name="otkaz_tm" class="select" onchange="otkzvstr()">
    <option value="0" <?php if($otkaz_tm==0){echo 'selected="selected"';} ?><?php echo set_select('otkaz_tm', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php if($otkaz_tm==1){echo 'selected="selected"';} ?><?php echo set_select('otkaz_tm', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>
  <?}?>
    <tr style="background: #A8F3AE;<?if($otkaz_tm==1){echo"display:none;";}?>" class="otkz_vstr">
    <td height="23" style="font-size: 18px;font-weight: bold; ">Встречи клиентов</td>
    <td>
    <!--<select name="vstrecha" class="select" onchange="vstrrre()"> можно удалить
    <option value="0" <?php if($vstrecha==0){echo 'selected="selected"';} ?><?php echo set_select('vstrecha', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php if($vstrecha==1){echo 'selected="selected"';} ?><?php echo set_select('vstrecha', '1'); ?>>Да</option>
    </select>-->
    </td>
  </tr>
  <tr class="otkz_vstr"<?if($otkaz_tm==1){echo'style="display:none;"';}?>>
  <td colspan="2">
  
    <table class="vstr1" style="background: #A8F3AE;padding: 0 0px;<?//if($vstrecha==0){echo"display:none;";}?>"  width="100%" border='0' cellspacing="0" cellpadding="0">
    <thead>
    <tr>
    <td colspan="10"><?=$this->pagination->create_links();?></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td style="font-weight: bold;">Дата встречи</td>
    <td style="font-weight: bold;">Время встречи</td>
    <td style="font-weight: bold;">На процедуру</td>
    <td style="font-weight: bold;">Сотрудник</td>
    <td style="font-weight: bold;">Косметолог</td>
    <td style="font-weight: bold;">Офис</td>
    <td style="font-weight: bold;">Кол-во<br />реккомендаций</td>
    <td style="font-weight: bold;">Перенос</td>
    <td style="font-weight: bold;">Причина отказа</td>
    <td style="font-weight: bold;">Комментарий</td>
    <td style="font-weight: bold;">Продажа</td>
    <td></td>
    </tr>
    </thead>
    <tbody id="newvstr">
    <?
    //$this->telemarket_model->get_klients_vstr_tel($id);
    $klientss_vstr = $this->telemarket_model->get_klients_vstr_tel($id,$config['per_page'],$this->uri->segment(3));
    if($klientss_vstr!=0)
    {
        foreach($klientss_vstr as $klientus_vstr):
        ?>
        <tr <?if($klientus_vstr['otkaz']==1){echo'style="background: #FF0303;"';}?>>
        <?if($klientus_vstr['sproc']==""){?>
        <td><?if($klientus_vstr['otkaz']==0){?><div class="edit_vstr"><img title="Редактировать встречу" src="<?= base_url();?>/images/edit_vstr.png" width="20" height="20" onclick="edit_vstr('<?=$klientus_vstr['date_vstr'];?>')" style="cursor: pointer;"/></div><?}?></td>
        <td><?if($configs['otkz_vstr_tm']=='on'){if($klientus_vstr['otkaz']==0){?><div class="edit_vstr"><img title="Отказ от встречи" src="<?= base_url();?>/images/otkz.png" width="20" height="20" onclick="otkz_vstr_tm('<?=$klientus_vstr['id'];?>','<?=$id;?>')" style="cursor: pointer;"/></div><?}}?></td>        
        <td><?if($configs['del_vstr_tm']=='on'){if($klientus_vstr['otkaz']==0){?><div class="edit_vstr"><img title="Удалить встречу" src="<?= base_url();?>/images/otkz.png" width="20" height="20" onclick="del_vstr_tm('<?=$klientus_vstr['id'];?>','<?=$id;?>')" style="cursor: pointer;"/></div><?}}?></td>
        <?}else{?>
        <td></td>
        <td></td>
        <td></td>
        <?}?>
        <td><input type="text" class="add1 <?if($klientus_vstr['otkaz']!=1){echo 'datepicker';}?> edit<?=$klientus_vstr['date_vstr'];?>" name="dd<?=$klientus_vstr['date_vstr'];?>" value="<?=$this->user_model->rotate_date2($klientus_vstr['date_vstr']);?>" readonly="readonly"></td>
        <td><input type="text" class="add1 <?if($klientus_vstr['otkaz']!=1){echo 'time';}?> edit<?=$klientus_vstr['date_vstr'];?>" name="tt<?=$klientus_vstr['date_vstr'];?>" value="<?=$klientus_vstr['time_vstr'];?>" readonly="readonly"></td>
        <td>
        <?if($klientus_vstr['sproc']!=""){echo $klientus_vstr['sproc'];}else{?>
        <select name="tpr<?=$klientus_vstr['date_vstr'];?>" class="select1" disabled="disabled">
        <option value="" <?if($klientus_vstr['type_procedur']==""){echo 'selected="selected"';}?>>&nbsp;</option>
        <option value="СПА Волосы" <?if($klientus_vstr['type_procedur']=="СПА Волосы"){echo 'selected="selected"';}?>>СПА Волосы</option>
        <option value="СПА Лицо" <?if($klientus_vstr['type_procedur']=="СПА Лицо"){echo 'selected="selected"';}?>>СПА Лицо</option>
        <option value="СПА Тело" <?if($klientus_vstr['type_procedur']=="СПА Тело"){echo 'selected="selected"';}?>>СПА Тело</option>
        </select>
        <?}?>
        </td>
        <td><input type="text" class="add1" name="uu<?=$klientus_vstr['date_vstr'];?>" value="<?=$klientus_vstr['user'];?>" readonly="readonly"></td>
        <td><input type="text" class="add1" value="<?=$klientus_vstr['kosmetolog'];?>" readonly="readonly"></td>
        <td><input type="text" class="add1" value="<?=$klientus_vstr['office'];?>" readonly="readonly"></td>
        <td><input type="text" class="add1" value="<?=$klientus_vstr['recomendation'];?>" readonly="readonly"></td>
        <td><input type="text" class="add1" value="<?=$klientus_vstr['perenos'];?>" readonly="readonly"></td>
        <td><input type="text" class="add1" value="<?=$klientus_vstr['text_prichotkaza'];?>" readonly="readonly"></td>
        <td>
        <textarea style="resize: none;border: 1px solid #ccc;"><?=$klientus_vstr['comments'];?></textarea></td>
        <td><input type="text" class="add1" value="<?if($klientus_vstr['prodacha']==1){echo "Да";}else{echo "Нет";};?>" readonly="readonly"></td>
        <td>
        <?if($klientus_vstr['otkaz']==0){?>
        <input type="button" name="safe<?=$klientus_vstr["date_vstr"];?>" class="add1 podtv" value="Сохранить" onclick="safe_ok_tm('<?=$klientus_vstr['id'];?>','<?=$id;?>','<?=$klientus_vstr["date_vstr"];?>')" style="display: none;">
        <?}?>
        </td>
        </tr>
        <?
        endforeach;
    }?>
      <tr class="Sel1" style="display: none;">
  <td></td>
  <td></td>
  <td></td>
  <td><input type="text" name="date_vstr" class="vstr add1 datepicker required" value="" ></td>
  <td><input type="text" name="time_vstr" class="add1 time required" value="" ></td>
  <td><select name="type_procedur" class="select1">
  <option value="" selected="selected">&nbsp;</option>
  <option value="СПА Волосы">СПА Волосы</option>
  <option value="СПА Лицо">СПА Лицо</option>
  <option value="СПА Тело">СПА Тело</option>
  </select></td>
  <td><input name="user" type="text" class="add1" value="<?=$us;?>" readonly="readonly"></td>
  <td><select name="office" class="select1">
  <option value="Офис 1">Офис 1</option>
  <option value="Офис 2">Офис 2</option>
  </select></td>
  <td colspan="6">Комментарий: <input type="text" name="comments" style="border: 1px solid #ccc;  border-radius: 3px;  padding: 2px;  width: 560px;" value=""></td>
  </tr>
    <tr><td colspan="11" align="center" class="ss1" style="height: 40px;"><a class="buttons" id="avst" onclick="newvstr_tm()">Добавить встречу</a></td></tr>
    </tbody>
    </table>
  </td>
  </tr>
  <tr class="Sel1" style="display: none; background: #F16C6C;">
    <td height="23">Отказ от встречи</td>
    <td>
    <select name="otkaz" class="select" onchange="otkazvstr()">
    <option value="0" <?php echo set_select('otkaz', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php echo set_select('otkaz', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>
  <tr class="Sel2" style="display: none; background: #EDF3A8;">
    <td height="23">Причина отказа</td>
    <td><textarea name="prichotkaza" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"><?=set_value('prichotkaza');?></textarea></td>
  </tr>
  <tr class="Sel3" style="display: none;background: #A8F3AE;text-align: center;">
    <td height="23" colspan="2" style="padding: 10px;"><a class="buttons" id="svst" onclick="savevstr()">Сохранить встречу</a></td>
  </tr>
  
  <tr style="background: #EDF3A8;<?if($otkaz_tm==1){echo'display:none;';}?>" class="otkz otkz_vstr">
    <td height="23" style="font-size: 18px;">Перезвон</td>
    <td>
    <!--<select name="perezvon" class="select" onchange="perezzzzvon()"> можно удалить
    <option value="0" <?php if($perezvon==0){echo 'selected="selected"';} ?><?php echo set_select('perezvon', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php if($perezvon==1){echo 'selected="selected"';} ?><?php echo set_select('perezvon', '1'); ?>>Да</option>
    </select>-->
    </td>
  </tr>
  
  <tr class="otkz otkz_vstr"<?if($otkaz_tm==1){echo'style="display:none;"';}?>>
  <td colspan="2">
    <table style="background: #EDF3A8;padding: 0 0px;"  width="100%" border='0' cellspacing="0" cellpadding="0">
    <thead>
    <tr>
    <td style="font-weight: bold;">Дата звонка</td>
    <td style="font-weight: bold;">Время звонка</td>
    <td style="font-weight: bold;">Тема звонка</td>
    <td style="font-weight: bold;">Коментарий</td>
    </tr>
    </thead>
    <tbody id="newzvon">
    <?if($klientss_zvon!=0)
    {
        foreach($klientss_zvon as $klientus_zvon):
        ?>
        <tr>
        <td><input type="text" class="add" value="<?=$this->user_model->rotate_date2($klientus_zvon['date_perezvon']);?>" readonly="readonly"></td>
        <td><input type="text" class="add" value="<?=$klientus_zvon['time_perezvon'];?>" readonly="readonly"></td>
        <td><input type="text" id="time" class="add" value="<?=$klientus_zvon['tema_perezvon'];?>" readonly="readonly"></td>
        <td><textarea cols="30"  style="resize: none;border: 1px solid #ccc;" readonly="readonly"><?=$klientus_zvon['comment_perezvon'];?></textarea></td>
        </tr>
        <?
        endforeach;
    }?>
    <tr class="Selp" style="display: none;">
    <td><input type="text" name="date_perezvon" class="add1 datepicker" value=""></td>
    <td><input type="text" name="time_perezvon" class="add1 time" value=""></td>
    <td><input type="text" name="tema_perezvon" id="time" class="add1" value=""></td>
    <td><textarea name="comment_perezvon" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"></textarea></td>
    </tr>
    <tr><td colspan="4" align="center" class="ss2" style="height: 40px;"><a class="buttons" id="azvon" onclick="newzvon()">Добавить Звонок</a></td></tr>
     <tr class="Selp" style="display: none;background: #EDF3A8;text-align: center;"><td height="23" colspan="4" style="padding: 10px;"><a class="buttons" id="svst" onclick="newpzvon()">Сохранить перезвон</a></td></tr> 
   </tbody>
    </table>

  </td>
  </tr>

</table>



<a href="javascript:javascript:history.go(-1)"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a>
<input name="edit_ok" type="submit" value="Сохранить" class="buttons">
</form>
</div>