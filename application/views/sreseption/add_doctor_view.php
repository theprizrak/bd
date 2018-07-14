<script>
<?if(isset($okays) && $okays==1){?>
$('#info').text("Врач успешно добавлен").show('blind').delay(1500).fadeOut(800);
<?}?>
</script>
<div id="middle">
<form action="/sreseption/add_doctor" method="post" name="add_klients" id="jform">
<table width="50%" border="0" cellspacing="0" cellpadding="0">
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
</table>
<input name="add_ok" type="submit" id="add_okkk" value="Сохранить"  class="buttons">
</form>
</div>