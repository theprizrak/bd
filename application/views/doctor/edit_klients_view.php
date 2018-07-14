<? $us=$this->session->userdata('family')." ".$this->session->userdata('name'); ?>
<script >
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" height="23">Фамилия</td>
    <td width="67%">
    <input type="text" name="family" class="add" value="<?=set_value('family',$family);?>" readonly>
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Имя</td>
    <td width="67%">
    <input type="text" name="name" class="add" value="<?=set_value('name',$name);?>" readonly>
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Отчество</td>
    <td width="67%">
    <input type="text" name="lastname" class="add" value="<?=set_value('lastname',$lastname);?>" readonly>
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Возраст</td>
    <td width="67%">
    <input type="text" name="vozrast" maxlength="3" class="add" value="<?=set_value('vozrast',$vozrast);?>" readonly>
   </td>
  </tr>  
  <tr>
    <td height="23">Статус клиента</td>
    <td>
	<input type="text" name="status" maxlength="3" class="add" value="<?if($status==0){echo 'Лояльный';}else{echo 'Негатив';}?>" readonly>
    </td>
  </tr>
  <tr>
    <td height="23">Телефон</td>
    <td><input type="text" name="phone" class="add tel" value="<?=set_value('phone',$phone);?>" readonly></td>
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
    <td style="font-weight: bold; width: 200px;">Дата назначения</td>
    <td style="font-weight: bold; width: 250px;">Врач</td>
    <td style="font-weight: bold;">Рекомендации</td>
    <td style="font-weight: bold;">Противопоказания</td>
    </tr>
    </thead>
    <tbody id="newvstr">
    <?if(!empty($klients_recom)){?>
        <tr>
        <td><input type="text" name="id_recom" style="width: 0px;height:0px;display:none;" class="add1" value="<?=$klients_recom['id'];?>" readonly></td>
        <td><input type="text" class="add1" value="<?=$this->user_model->rotate_date2($klients_recom['date_recom']);?>" readonly></td>
        <td><input type="text" value="<?=$klients_recom['name_doctor'];?>" readonly></td>
        <td><textarea class="doc_textarea" name="recomendation<?=$klients_recom['id'];?>"><?=$klients_recom['recomendation'];?></textarea></td>
		<td><textarea class="doc_textarea" name="contraindications<?=$klients_recom['id'];?>"><?=$klients_recom['contraindications'];?></textarea></td>
        </tr>
    <?}?>
    <tr><td colspan="9" align="center" class="ss1" style="height: 40px;">
    <?if(!empty($klients_recom)){?>
    <input name="edit_ok" type="button" onclick="update_recom()" value="Сохранить" class="buttons" style="margin: 0;">
    <?}else{?>
    <a class="buttons" id="avst" onclick="newvstr_stel()">Добавить назначение</a>
    <?}?>
    </td></tr>
    
    </tbody>
    </table>
   
<a href="javascript:javascript:history.go(-1)"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a> 
<!--<a href="/sreseption"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a>
<input name="edit_ok" type="button" value="Сохранить" class="buttons" onclick="safeklientsresep('<?=$id;?>')">-->
</div>



<div id="new_proc" style="display: none;">
<input type="text" name="id_doctor" style="width: 0px;height: 0px;display: none;" value="<?=$this->session->userdata('user_id');?>" readonly>
<input type="text" name="name_doctor" style="width: 0px;height: 0px;display: none;" value="<?=$this->session->userdata('family')." ".$this->session->userdata('name');?>" readonly>
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td style="width:50%;text-align:center;"><b>Рекомендации</b></td>
<td style="width:50%;text-align:center;"><b>Противопоказания</b></td>
</tr>
<tr>
<td width="40%" style="vertical-align: top;">
<textarea name="recomendation" class="doc_textarea"></textarea>
</td>
<td width="60%" style="vertical-align: top;">
<textarea name="contraindications" class="doc_textarea"></textarea>
</td>
</tr>
<tr><td colspan="2"><input name="edit_ok" type="button" onclick="save_recom()" value="Сохранить" class="buttons"><input type="button" onclick="newvstr_stel_close()" value="Отмена" class="buttons"></td></tr>
</table>
</div>