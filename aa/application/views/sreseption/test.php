<div id="filter">
<input type="submit" value="Печать" class="buttons_fil"  onClick="print_otch()"/>
</div>

<div id="middle">
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

<form method="get">
<select name="doctor" class="select">
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
        <option value="<?=$doctors["family"].' '.$doctors["name"];?>" <?if(isset($_GET['doctor']) && $_GET['doctor']!='' && $_GET['doctor']===$doctors["family"].' '.$doctors["name"]){echo 'selected';}?>><?=$doctors["family"].' '.$doctors["name"];?></option>
   <? endforeach;
    }
    ?>
    </select>
<input name="date1" class="datepicker" type="text" <?if(isset($_GET['date1']) && $_GET['date1']!=''){echo 'value="'.$_GET['date1'].'"';}?>>
<input type="submit" value="Составить отчет"/>
</form>
<hr /><br>

<?
if(isset($_GET['doctor']) && isset($_GET['date1']))
{
//$vstr=$this->stelemarket_model->get_vstr_serv_karta_all();

    $que=$this->user_model->doc_print($_GET['doctor'],$_GET['date1']);
?>
<div id="textnew">
	<p style="text-align: center;"><span style="font-weight: bold;">СПИСОК ПРОЦЕДУР - <?=$_GET['doctor'];?></span></p>  
 <?foreach($que as $item):
 $klient=$this->stelemarket_model->get_klients_serv_karta($item["id_client"]);
if(!empty($klient))
{
 ?>
 <style>
 /*печать карты клиентов на сегодня */
.karta_print {
border: 0;
margin: 0 auto;
}
.karta_print tr {
border: 0;
}
.karta_print td {
border: 1px solid #CDCDCD;
font-size: 11px;
}
</style>
<table width="80%" border="1px" cellspacing="0" cellpadding="0" class='karta_print'>
  <tr>
    <td width="33%" style="text-align: center;">ФИО</td>
    <td width="67%" style="text-align: center;"><?=$klient["family"].' '.$klient["name"].' '.$klient["lastname"];?></td>
  </tr>
  <tr>
    <td style="text-align: center;">Телефон</td>
    <td style="text-align: center;"><?=$klient["phone"];?></td>
  </tr>
    <tr>
    <td style="text-align: center;">Тип процедуры</td>
    <td style="text-align: center;"><?=$item["sproc"];?> </td>
  </tr>
    <tr>
    <td style="text-align: center;">Время</td>
    <td style="text-align: center;"><?=$item["time_vstr"];?></td>
  </tr>
</table>
<br />
<hr>
<br />
<?
}
endforeach; }?>

</div>
<script type="text/javascript">
function print_otch()
{
pr = document.getElementById('textnew').innerHTML;
prs = "<?=$_SERVER['REQUEST_URI']?>";
//newWin=window.open('','printWindow','Toolbar=0,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0'); 
//newWin.document.open(pr);  
document.write(pr);
window.print(pr);
//newWin.window.close();
location.href=prs;
}
</script>
</div>