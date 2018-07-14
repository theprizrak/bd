<script>
$(document).ready(function()
{
   $('#kredit').css('color', '#cccccc');
   $('#kredit input').attr('readonly', 'readonly'); 
   $('select[name=prodacha]').css('border','1px solid #FD1010');

}
);

function prodazha()
{
    var el=$('select[name=prodacha]').val();
    if(el==1)
    {
        $('#kredit').css('color', '#000000');
        $('#kredit input').removeAttr('readonly');
        $('#kredit input[name=user]').attr('readonly', 'readonly');
        $('#kredit input[name=kosmetolog]').attr('readonly', 'readonly');
        $('select[name=prodacha]').css('border','1px solid #45EE0F');
    }
    else
    {
        $('#kredit').css('color', '#cccccc');
        $('#kredit input').attr('readonly', 'readonly');
        $('select[name=prodacha]').css('border','1px solid #FD1010');
    }
}
</script>
<?
$last_dog=$this->user_model->get_last_dog($id);
$all_dog=$this->user_model->get_five_dog($id);
?>
<div id="middle">
<form method="post" name="add_klients" id="add_klients">
<span style="font-size: 16px;">Дата последней встречи клиента: <?if(isset($klient_vstr['date_vstr']) && isset($klient_vstr['time_vstr'])){echo $this->user_model->rotate_date2($klient_vstr['date_vstr']).' '.$klient_vstr['time_vstr'];}else{echo "У клиента не назначено ни одной встречи";}?></span>
<hr />
<input type="text" name="id" class="add" value="<?=$id;?>" readonly="readonly" style="visibility:hidden;width: 1px;height: 1px;">
<input type="text" name="date_vstr" class="add" value="<?if(isset($klient_vstr['date_vstr'])){echo $klient_vstr['date_vstr'];}?>" readonly="readonly" style="visibility:hidden;width: 1px;height: 1px;">
<input type="text" name="time_vstr" class="add" value="<?if(isset($klient_vstr['time_vstr'])){echo $klient_vstr['time_vstr'];}?>" readonly="readonly" style="visibility:hidden;width: 1px;height: 1px;">
<input type="text" name="edit_kred_ok" class="add" value="edit_kred_ok" readonly="readonly" style="visibility:hidden;width: 1px;height: 1px;">
<table width="100%" border="0" cellspacing="0">
<tr>
    <td width="33%" height="23">Продажа</td>
    <td width="67%">
    <select name="prodacha" class="add" onclick="prodazha()">
    <option value="0" <?if(!isset($klient_vstr['prodacha']) || $klient_vstr['prodacha']==0){echo'selected="selected"';}?>>Нет</option>
    <option value="1" <?if(isset($klient_vstr['prodacha']) && $klient_vstr['prodacha']==1){echo'selected="selected"';}?>>Да</option>
    </select>
   </td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" id="kredit">
<tr>
    <td width="33%" height="23">Фамилия</td>
    <td width="67%">
    <input type="text" name="family" class="add" value="<?=$family;?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Имя</td>
    <td width="67%">
    <input type="text" name="name" class="add" value="<?=$name;?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Отчество</td>
    <td width="67%">
    <input type="text" name="lastname" class="add" value="<?=$lastname;?>" >
   </td>
</tr>
<tr>
<td width="33%" height="23">Дата рождения</td>
<td width="67%">
<input type="text" name="brichday"  class="add datepicker" value="<?if($brichday!=''){echo $this->user_model->rotate_date2($brichday);}?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Место рождения</td>
<td width="67%">
<input type="text" name="mesto_rozd" class="add" value="" >
</td>
</tr>
<tr>
<td width="33%" height="23">Паспорт серия</td>
<td width="67%">
<input type="text" name="ser_pasp" class="add pseria" value="" >
</td>
</tr>
<tr>
<td width="33%" height="23">№</td>
<td width="67%">
<input type="text" name="nom_pasp" class="add pnomer" value="" >
</td>
</tr>
<tr>
<td width="33%" height="23">Выдан</td>
<td width="67%">
<input type="text" name="vidan" class="add" value="" >
</td>
</tr>
<tr>
<td width="33%" height="23">Дата выдачи</td>
<td width="67%">
<input type="text" name="date_vidan" class="add datepicker" value="" >
</td>
</tr>
<tr>
<td width="33%" height="23">Тел. дом</td>
<td width="67%">
<input type="text" name="teldom" class="add numberhome" value="" >
</td>
</tr>
<tr>
<td width="33%" height="23">Тел. Рабочий</td>
<td width="67%">
<input type="text" name="telrab" class="add numberhome" value="" >
</td>
</tr>
<tr>
<td width="33%" height="23">Тел. Сотовый</td>
<td width="67%">
<input type="text" name="sotov" class="add tel" value="" >
</td>
</tr>
<tr>
    <td width="33%" height="23">Банк</td>
    <td width="67%">
    <input type="text" name="bank" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Номер договора</td>
    <td width="67%">
    <input type="text" name="number_dog" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Дата заключения договора</td>
    <td width="67%">
    <input type="text" name="date_dog" class="add datepicker" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Цена товара</td>
    <td width="67%">
    <input type="text" name="summa" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Вид продукта</td>
    <td width="67%">
    <input type="text" name="produkt" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Срок платежа</td>
    <td width="67%">
    <input type="text" name="srok_kred" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Дата первого платежа</td>
    <td width="67%">
    <input type="text" name="date_kred" class="add datepicker" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Сумма в месяц</td>
    <td width="67%">
    <input type="text" name="summa_mount" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Сумма первого взноса</td>
    <td width="67%">
    <input type="text" name="first_vznos" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Сумма кредита</td>
    <td width="67%">
    <input type="text" name="summa_kred" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Расторгнуто с банком</td>
    <td width="67%">
    <input type="text" name="off_bonk" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Комментарий</td>
    <td width="67%">
    <input type="text" name="comments" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Адресс проживания</td>
    <td width="67%">
    <input type="text" name="mesto_proz" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Адресс проживания по прописке</td>
    <td width="67%">
    <input type="text" name="mesto_prop" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Продавец обеспечивает</td>
    <td width="67%">
    <input type="text" name="prodobespech" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">В течении</td>
    <td width="67%">
    <input type="text" name="srokproced" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Цена на процедуры</td>
    <td width="67%">
    <input type="text" name="summa_proced" class="add" value="" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">ФИО оператора</td>
    <td width="67%">
    <input type="text" name="user" class="add" value="<?if(isset($klient_vstr['user'])){echo $klient_vstr['user'];}?>" readonly>
   </td>
</tr>
<tr>
    <td width="33%" height="23">ФИО косметолога</td>
    <td width="67%">
    <input type="text" name="kosmetolog" class="add" value="<?if(isset($klient_vstr['kosmetolog'])){echo $klient_vstr['kosmetolog'];}?>" readonly>
   </td>
</tr>
</table>
<?include "list_all_dog.php";?>

<a href="javascript:javascript:history.go(-1)"><input type="button" value="Вернуться назад" class="buttons"></a>

<input name="edit_kred_ok" type="button" value="Сохранить" class="buttons" onClick="safeklientkredit()">
<!--<input type="submit" value="Распечатать догов купли/продажи" class="buttons" onClick="document.getElementById('add_klients').action='/kredit/dogovor'">
<input type="submit" value="Распечатать акт приёма/передачи" class="buttons" onClick="document.getElementById('add_klients').action='/kredit/akt'">
<input type="submit" value="Распечатать внутренний догов купли/продажи" class="buttons" onClick="document.getElementById('add_klients').action='/kredit/vnut_dog'">--> 

</form>
</div>