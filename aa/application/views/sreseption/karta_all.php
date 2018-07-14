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
div.storoni {
//float: left;
width: 500px;
display: table-cell;
}
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
font-size: 10px;
padding: 1px;
margin: 0;
}
</style>
<?
$vstr=$this->stelemarket_model->get_vstr_serv_karta_all();
?>
<div id="textnew">
	<p style="text-align: center;"><span style="font-weight: bold;">СПИСОК КЛИЕНТОВ НА <?=date('d.m.Y');?></span></p>  
 <?foreach($vstr as $item):
 $klient=$this->stelemarket_model->get_klients_serv_karta($item["id_client"]);
if(!empty($klient))
{
 ?>
<table width="80%" border="1px" cellspacing="0" cellpadding="0" class='karta_print'>
  <tr>
    <td width="33%" style="text-align: center;">Фамилия</td>
    <td width="67%" style="text-align: center;"><?=$klient["family"];?></td>
  </tr>
  <tr>
    <td width="33%" style="text-align: center;">Имя</td>
    <td width="67%" style="text-align: center;"><?=$klient["name"];?></td>
  </tr>
  <tr>
    <td width="33%" style="text-align: center;">Отчество</td>
    <td width="67%" style="text-align: center;"><?=$klient["lastname"];?></td>
  </tr>
  <tr>
    <td width="33%" style="text-align: center;">Дата рождения</td>
    <td width="67%" style="text-align: center;"><?if($klient["brichday"]!=''){echo $this->user_model->rotate_date2($klient["brichday"]);}?></td>
  </tr>
  <tr>
    <td width="33%" style="text-align: center;">Возраст</td>
    <td width="67%" style="text-align: center;"><?=$klient["vozrast"];?></td>
  </tr>  
  <tr>
    <td style="text-align: center;">Телефон</td>
    <td style="text-align: center;"><?=$klient["phone"];?></td>
  </tr>
  <tr>
    <td style="text-align: center;">Назначил:</td>
    <td style="text-align: center;"><?=$klient["user"];?></td>
  </tr>
  <tr>
    <td style="text-align: center;">Дата встречи</td>
    <td style="text-align: center;"><?=$this->user_model->rotate_date2($item["date_vstr"]);?></td>
  </tr>
    <tr>
    <td style="text-align: center;">Время встречи</td>
    <td style="text-align: center;"><?=$item["time_vstr"];?></td>
  </tr>
  <tr>
    <td style="text-align: center;">Процедуру выполняет</td>
    <td style="text-align: center;"><?if($item["doctor"]==''){echo 'Врач не назначен';}else{echo $item["doctor"];}?></td>
  </tr>
    <tr>
    <td style="text-align: center;">Тип процедуры</td>
    <td style="text-align: center;"><?=$item["sproc"];?> </td>
  </tr>
</table>
<br />
<hr>
<br />
<?
}
endforeach;?>

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
location.href="/sreseption";
//}
</script>