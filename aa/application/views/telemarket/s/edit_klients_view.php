<? 
$us=$this->session->userdata('family')." ".$this->session->userdata('name'); 
$configs=$this->auth_lib->config_site(); // настройки сайта 
//постраничная навигация по встречам
//$this->load->view('pagination_vstr.php');
include ('pagination_vstr.php');
$config['per_page'] = $configs['num_vstr_przvn'];
$config['base_url'] = base_url().'/sreseption/edit';
$config['total_rows'] = count($this->stelemarket_model->get_klients_vstr_tel_pag($id));
$this->pagination->initialize($config);
?>
<script type="text/javascript">
//валидация формы
$(document).ready(function(){
    	$("#demoForm").validate();
  	});
	//	$.validator.messages.required = "Заполните поле!";
//открытие окна добавления встречи
function newvstr_stel()
{

$('#new_proc').css('display','block');
}
//звкрытия окна добавления встречи
function newvstr_stel_close()
{
    $('#new_proc').css('display','none');
}
//отказ клиента
function otkazvstr()
{
   var el=$('select[name="otkaz"]').val();
   if(el==1)
   { $('.Sel2').fadeIn(300);$('.otkz').fadeOut(300);}
   else
   { $('.Sel2').fadeOut(300);$('.otkz').fadeIn(300);}
}
// отказ клиента от встречи
function otkzvstr()
{
   var el=$('select[name="otkz_vstr"]').val();
   if(el==1)
   { $('.otkz_vstr').fadeOut(300);}
   else
   { $('.otkz_vstr').fadeIn(300);$('.qwe').fadeOut(300);}
}
/* удалить
function dpicker()
{
$('$dpicker').datepicker(
{
changeMonth: true,
changeYear: true,
yearRange: "c-60:+0"
}
); 
 
}*/
</script>
<div id="middle">
<form action="/stelemarketing" method="post" name="add_klients" id="demoForm">
<table width="50%" border="0" cellspacing="0" cellpadding="0" style="float: left;">
<input type="text" name="id" class="add" value="<?=$id;?>" readonly style="visibility:hidden;width: 1px;height: 1px;">
<input type="text" name="date_dobav" class="add" value="<?=date('Y-m-d');?>" style="width: 1px;height: 1px;display: none;">
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
    <input type="text" name="vozrast" class="add" value="<?=set_value('vozrast',$vozrast);?>">
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
  <?php if($otkaz_serv==1){?>
  <tr class="qwe" style="background: #E62A2A;">
    <td height="23">Отказ</td>
    <td>
    <select name="otkz_serv" class="select" onchange="otkzvstr()">
    <option value="0" <?php if($otkaz_serv==0){echo 'selected="selected"';} ?><?php echo set_select('otkaz_serv', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php if($otkaz_serv==1){echo 'selected="selected"';} ?><?php echo set_select('otkaz_serv', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>
  <?}?>
  <tr class="otkz_vstr"<?if($otkaz_serv==1){echo'style="display:none;"';}?>>
  <td colspan="2">
  </td>
  </tr>
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
    <tr><td colspan="5" height="23" style="font-size: 18px;font-weight: bold;">Список процедур клиента</td></tr>
    <tr>
    <td style="width: 10%;font-weight: bold;padding-top: 10px;">Дата встречи</td>
    <td style="width: 10%;font-weight: bold;padding-top: 10px;">Время встречи</td>
    <td style="width: 30%;font-weight: bold;padding-top: 10px;">На процедуру</td>
    <td style="width: 30%;font-weight: bold;padding-top: 10px;">Врач</td>
    <td style="width: 10%;font-weight: bold;padding-top: 10px;">Сотрудник</td>
    </tr>
    </thead>
    <tbody id="newvstr">
    <?
    $klientss_vstr = $this->stelemarket_model->get_klients_vstr_tel($id,$config['per_page'],$this->uri->segment(3));
    if($klientss_vstr!=0)
    {
        foreach($klientss_vstr as $klientus_vstr):
        ?>
        <tr <?if($klientus_vstr['otkaz']==1){echo'style="background: #FF0303;"';}?>>
        <td><input type="text" class="add1" value="<?=$this->user_model->rotate_date2($klientus_vstr['date_vstr']);?>" readonly="readonly"></td>
        <td><input type="text" class="add1" value="<?=$klientus_vstr['time_vstr'];?>" readonly="readonly"></td>
        <td style=" padding-top: 10px;">
        <?
        $spoced=explode(";", $klientus_vstr['sproc']);
        $i=0;
        foreach($spoced as $spocedurs)
        {?>
           <?=$spocedurs; if($i%4){echo "</br>";}?>
        <? $i++; } ?>
            <br><br>
        </td>
        <td><input type="text" class="add1" value="<?=$klientus_vstr['doctor'];?>" readonly="readonly"></td>
        <td><input type="text" class="add1" value="<?=$klientus_vstr['user'];?>" readonly="readonly"></td>
        </tr>
        <?
        endforeach;
    }?>
    <tr><td colspan="9" align="center" class="ss1" style="height: 40px;"><a class="buttons" id="avst" onclick="newvstr_stel()">Добавить встречу</a></td></tr>
    </tbody>
    </table>



<a href="/stelemarketing"><input type="button" value="Вернуться назад" class="buttons"></a>
<input name="edit_ok" type="submit" value="Сохранить" class="buttons">
</form>
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
      <option value=""></option>
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
<tr><td colspan="2"><input name="edit_ok" type="button" onclick="savesvstr()" value="Сохранить" class="buttons"><input type="button" onclick="newvstr_stel_close()" value="Отмена" class="buttons"></td></tr>
</table>
</div>