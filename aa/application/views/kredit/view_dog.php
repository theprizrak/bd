<script>
$(document).ready(function()
{
   $('#kredit input').attr('readonly', 'readonly'); 
}
);
</script>
<?
$last_dog=$this->user_model->get_konk_dog($_GET['id_dog']);
$all_dog=$this->user_model->get_all_dog($id);

?>
<div id="middle">
<form method="post" name="add_klients" id="add_klients">
<input type="text" name="id" class="add" value="<?=$id;?>" readonly="readonly" style="visibility:hidden;width: 1px;height: 1px;">
<input type="text" name="id_dog" class="add" value="<?=$_GET['id_dog'];?>" readonly="readonly" style="visibility:hidden;width: 1px;height: 1px;">
<input type="text" name="date_vstr" class="add" value="<?if(isset($last_dog['date_vstr']) || $last_dog['date_vstr']!=''){echo $last_dog['date_vstr'];}?>" readonly="readonly" style="visibility:hidden;width: 1px;height: 1px;">
<input type="text" name="time_vstr" class="add" value="<?if(isset($last_dog['time_vstr']) || $last_dog['time_vstr']!=''){echo $last_dog['time_vstr'];}?>" readonly="readonly" style="visibility:hidden;width: 1px;height: 1px;">
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
<input type="text" name="mesto_rozd" class="add" value="<?=$mesto_rozd;?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Паспорт серия</td>
<td width="67%">
<input type="text" name="ser_pasp" class="add pseria" value="<?=$ser_pasp;?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">№</td>
<td width="67%">
<input type="text" name="nom_pasp" class="add pnomer" value="<?=$nom_pasp;?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Выдан</td>
<td width="67%">
<input type="text" name="vidan" class="add" value="<?=$vidan;?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Дата выдачи</td>
<td width="67%">
<input type="text" name="date_vidan" class="add datepicker" value="<?if($date_vidan!=''){echo $this->user_model->rotate_date2($date_vidan);}?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Тел. дом</td>
<td width="67%">
<input type="text" name="teldom" class="add numberhome" value="<?if(isset($last_dog['teldom']) && $last_dog['teldom']!=''){echo $last_dog['teldom'];}else{echo "";}?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Тел. Рабочий</td>
<td width="67%">
<input type="text" name="telrab" class="add numberhome" value="<?if(isset($last_dog['telrab']) && $last_dog['telrab']!=''){echo $last_dog['telrab'];}else{echo "";}?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Тел. Сотовый</td>
<td width="67%">
<input type="text" name="sotov" class="add tel" value="<?if(isset($last_dog['sotov']) && $last_dog['sotov']!=''){echo $last_dog['sotov'];}else{echo "";}?>" >
</td>
</tr>
<tr>
    <td width="33%" height="23">Банк</td>
    <td width="67%">
    <input type="text" name="bank" class="add" value="<?if(isset($last_dog['bank']) && $last_dog['bank']!=''){echo $last_dog['bank'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Номер договора</td>
    <td width="67%">
    <input type="text" name="number_dog" class="add" value="<?if(isset($last_dog['number_dog']) && $last_dog['number_dog']!=''){echo $last_dog['number_dog'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Дата заключения договора</td>
    <td width="67%">
    <input type="text" name="date_dog" class="add datepicker" value="<?if(isset($last_dog['date_dog']) && $last_dog['date_dog']!=''){echo $this->user_model->rotate_date2($last_dog['date_dog']);}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Цена товара</td>
    <td width="67%">
    <input type="text" name="summa" class="add" value="<?if(isset($last_dog['summa']) && $last_dog['summa']!=''){echo $last_dog['summa'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Вид продукта</td>
    <td width="67%">
    <input type="text" name="produkt" class="add" value="<?if(isset($last_dog['produkt']) && $last_dog['produkt']!=''){echo $last_dog['produkt'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Срок платежа</td>
    <td width="67%">
    <input type="text" name="srok_kred" class="add" value="<?if(isset($last_dog['srok_kred']) && $last_dog['srok_kred']!=''){echo $last_dog['srok_kred'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Дата первого платежа</td>
    <td width="67%">
    <input type="text" name="date_kred" class="add datepicker" value="<?if(isset($last_dog['date_kred']) && $last_dog['date_kred']!=''){echo $this->user_model->rotate_date2($last_dog['date_kred']);}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Сумма в месяц</td>
    <td width="67%">
    <input type="text" name="summa_mount" class="add" value="<?if(isset($last_dog['summa_mount']) && $last_dog['summa_mount']!=''){echo $last_dog['summa_mount'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Сумма первого взноса</td>
    <td width="67%">
    <input type="text" name="first_vznos" class="add" value="<?if(isset($last_dog['first_vznos']) && $last_dog['first_vznos']!=''){echo $last_dog['first_vznos'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Сумма кредита</td>
    <td width="67%">
    <input type="text" name="summa_kred" class="add" value="<?if(isset($last_dog['summa_kred']) && $last_dog['summa_kred']!=''){echo $last_dog['summa_kred'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Расторгнуто с банком</td>
    <td width="67%">
    <input type="text" name="off_bonk" class="add" value="<?if(isset($last_dog['off_bonk']) && $last_dog['off_bonk']!=''){echo $last_dog['off_bonk'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Комментарий</td>
    <td width="67%">
    <input type="text" name="comments" class="add" value="<?if(isset($last_dog['comments']) && $last_dog['comments']!=''){echo $last_dog['comments'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Адресс проживания</td>
    <td width="67%">
    <input type="text" name="mesto_proz" class="add" value="<?if(isset($last_dog['mesto_proz']) && $last_dog['mesto_proz']!=''){echo $last_dog['mesto_proz'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Адресс проживания по прописке</td>
    <td width="67%">
    <input type="text" name="mesto_prop" class="add" value="<?if(isset($last_dog['mesto_prop']) && $last_dog['mesto_prop']!=''){echo $last_dog['mesto_prop'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Продавец обеспечивает</td>
    <td width="67%">
    <input type="text" name="prodobespech" class="add" value="<?if(isset($last_dog['prodobespech']) && $last_dog['prodobespech']!=''){echo $last_dog['prodobespech'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">В течении</td>
    <td width="67%">
    <input type="text" name="srokproced" class="add" value="<?if(isset($last_dog['srokproced']) && $last_dog['srokproced']!=''){echo $last_dog['srokproced'];}else{echo "";}?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Цена на процедуры</td>
    <td width="67%">
    <input type="text" name="summa_proced" class="add" value="<?if(isset($last_dog['summa_proced']) && $last_dog['summa_proced']!=''){echo $last_dog['summa_proced'];}else{echo "";}?>" >
   </td>
</tr>
<!--<tr>
    <td width="33%" height="23">ФИО оператора</td>
    <td width="67%">
    <input type="text" name="user" class="add" value="<?if(isset($last_dog['user']) || $last_dog['user']!=''){echo $last_dog['user'];}?>" readonly>
   </td>
</tr>
<tr>
    <td width="33%" height="23">ФИО косметолога</td>
    <td width="67%">
    <input type="text" name="kosmetolog" class="add" value="<?if(isset($last_dog['kosmetolog']) || $last_dog['kosmetolog']!=''){echo $last_dog['kosmetolog'];}?>" readonly>
   </td>
</tr>-->
</table>
<?include "list_all_dog.php";?>

<a href="/kredit/all_dog?id=<?=$id;?>"><input type="button" value="Вернуться назад" class="buttons"></a>
<input type="submit" value="Распечатать догов купли/продажи Академия Красоты" class="buttons" onClick="document.getElementById('add_klients').action='/kredit/dogovor'">
<input type="submit" value="Распечатать догов купли/продажи Фаджара" class="buttons" onClick="document.getElementById('add_klients').action='/kredit/dogovor_fadjara'">
<input type="submit" value="Распечатать акт приёма/передачи Академия Красоты" class="buttons" onClick="document.getElementById('add_klients').action='/kredit/akt'">
<input type="submit" value="Распечатать акт приёма/передачи Фаджара" class="buttons" onClick="document.getElementById('add_klients').action='/kredit/akt_fadjara'">
<input type="submit" value="Распечатать внутренний догов купли/продажи" class="buttons" onClick="document.getElementById('add_klients').action='/kredit/vnut_dog'"> 

</form>
</div>