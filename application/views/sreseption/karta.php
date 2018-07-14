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
<?
$klient=$this->stelemarket_model->get_klients_serv_karta($_POST["id_klient"]);
if(isset($_POST["id_vstr"]))
{$vstr=$this->stelemarket_model->get_klients_vstr_karta($_POST["id_vstr"]);}
?>
<div id="textnew">
	<p style="text-align: center;">
	<span style="font-weight: bold;">КАРТА КЛИЕНТА - <b><?=$klient["family"].' '.$klient["name"].' '.$klient["lastname"];?></b></span></p>
	
<table width="100%" border="1px" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" height="23" style="text-align: center;">Фамилия</td>
    <td width="67%" style="text-align: center;"><?=$klient["family"];?></td>
  </tr>
  <tr>
    <td width="33%" height="23" style="text-align: center;">Имя</td>
    <td width="67%" style="text-align: center;"><?=$klient["name"];?></td>
  </tr>
  <tr>
    <td width="33%" height="23" style="text-align: center;">Отчество</td>
    <td width="67%" style="text-align: center;"><?=$klient["lastname"];?></td>
  </tr>
  <tr>
    <td width="33%" height="23" style="text-align: center;">Дата рождения</td>
    <td width="67%" style="text-align: center;"><?=$klient["brichday"];?></td>
  </tr>
  <tr>
    <td width="33%" height="23" style="text-align: center;">Возраст</td>
    <td width="67%" style="text-align: center;"><?=$klient["vozrast"];?></td>
  </tr>  
  <tr>
    <td height="23" style="text-align: center;">Телефон</td>
    <td style="text-align: center;"><?=$klient["phone"];?></td>
  </tr>
  <tr>
    <td height="23" style="text-align: center;">Назначил:</td>
    <td style="text-align: center;"><?=$klient["user"];?></td>
  </tr>
  <tr>
    <td height="23" style="text-align: center;">Дата встречи</td>
    <td style="text-align: center;"><?=$vstr["date_vstr"];?></td>
  </tr>
    <tr>
    <td height="23" style="text-align: center;">Время встречи</td>
    <td style="text-align: center;"><?=$vstr["time_vstr"];?></td>
  </tr>
  <tr>
    <td height="23" style="text-align: center;">Процедуру выполняет</td>
    <td style="text-align: center;"><?=$vstr["doctor"];?></td>
  </tr>
    <tr>
    <td height="23" style="text-align: center;">Тип процедуры</td>
    <td style="text-align: center;"><?=$vstr["sproc"];?> </td>
  </tr>
</table>

</div>
<script type="text/javascript">
//$(document).ready(function() {
//alert('asd');
pr = document.getElementById('middle').innerHTML;  
//newWin=window.open('','printWindow','Toolbar=0,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0'); 
//newWin.document.open();  
//document.write(pr);
window.print(pr);
//window.close();
location.href="/sreseption/edit?id=<?=$_POST["id_klient"];?>";
//}
</script>