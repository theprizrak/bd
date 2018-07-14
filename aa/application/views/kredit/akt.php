<?include 'propis.php';?>
<?
$klient = $this->user_model->edit_klients($_POST["id"]);
if(date('m')==1){$mount="Января";}
else if(date('m')==2){$mount="Февраля";}
else if(date('m')==3){$mount="Марта";}
else if(date('m')==4){$mount="Апреля";}
else if(date('m')==5){$mount="Мая";}
else if(date('m')==6){$mount="Июня";}
else if(date('m')==7){$mount="Июля";}
else if(date('m')==8){$mount="Августа";}
else if(date('m')==9){$mount="Сентября";}
else if(date('m')==10){$mount="Октября";}
else if(date('m')==11){$mount="Ноября";}
else if(date('m')==12){$mount="Декабря";}
$s=$_POST["family"].' '.$_POST["name"].' '.$_POST["lastname"];
$text = preg_split('//u',$s,-1,PREG_SPLIT_NO_EMPTY);
?>
<script type="text/javascript"> 
function print()
{
pr = document.getElementById('middle').innerHTML;  
newWin=window.open('','printWindow','Toolbar=0,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0'); 
newWin.document.open();  
newWin.document.write(pr);
newWin.window.print();
newWin.window.close();
}
</script>
<div>
<div id="middle">
<div id="filter">
<input type="button" value="Печать" class="buttons_fil" onclick="print()" />
<a href="/kredit/view_dog?id=<?=$_POST["id"];?>&id_dog=<?=$_POST["id_dog"];?>"><input type="button" value="Вернуться" class="buttons_fil"></a>
</div>
<p style="text-align: center;"><span style="font-weight: bold;">Акт приема-передачи Товара</span></p>
<p style="text-align: center;"><span style="font-weight: bold;">(содержит в себе сведения, установленные для товарного чека)</span></p>
<p style="text-align: center;"><span style="font-weight: bold;">к</span><span style="font-weight: bold;"> к Договору купли-продажи № _<u><b><?=$_POST["number_dog"];?></b></span></p>
<p style="text-align: justify;">г.Волгоград «__» __________ 2015 г. </p>

<p style="text-align: justify;">    <span style="font-weight: bold;">1. </span>Продавец в соответствии с условиями Договора передал Покупателю Товар:</p>
<p style="text-align: justify;">Комплект косметических средств(нужное отметить V):</p>
<table class="zw-table tblthme1" style="width: 6in; border-collapse: collapse;">
<tbody>
<tr>
<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
<td style="border-color: #000000; width: 0px;"><p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 586px;">
<p style="text-align: justify;">для ухода за волосами «Diamond Treasures Brilliant Hair»</p>
</td></tr>
<tr>
<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
<td style="border-color: #000000; width: 0px;"><p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 586px;">
<p style="text-align: justify;">для ухода за телом «Diamond Treasures Skin Glory»</p></td>
</tr><tr>
<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
<td style="border-color: #000000; width: 0px;"><p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 586px;">
<p style="text-align: justify;">для мужчин «Diamond Treasures Men Gear»</p></td>
</tr><tr>
<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
<td style="border-color: #000000; width: 0px;"><p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 586px;">
<p style="text-align: justify;">для ухода за кожей лица <span style="font-weight: bold;">«</span>CRYSTAL YOUTH»</p></td>
</tr>
<tr>
<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
<td style="border-color: #000000; width: 0px;"><p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 586px;">
<p style="text-align: justify;">для ухода за кожей лица <span style="font-weight: bold;">«</span>Diamond Treasures»</p></td>
</tr>
<tr>
	<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px;">
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 736px;">
	<p style="text-align: justify;" class="V">Альгинатная маска </p></td>
    </tr>
	<tr>
	<tr>
	<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px;">
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 736px;">
	<p style="text-align: justify;" class="V">___________________</p></td>
    </tr>
	<tr>
	
<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
<td style="border-color: #000000; width: 0px;">
<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 586px;">
<p style="text-align: justify;">Вторичная продукция</p></td></tr>
</tbody></table>
<!--<p style="text-align: justify;">Косметические средства, общей стоимостью _<u><b><?=$_POST["summa"];?></b></u>_ рублей:</p>-->
<p style="text-align: justify;"><span style="width: 10px;"> </span></p>


<p style="text-align: justify;">а Покупатель _<u><b><?=$_POST["family"];?></b></u>_<u><b><?=$_POST["name"];?></b></u>_<u><b><?=$_POST["lastname"];?></b></u>_</p>
<p style="text-align: justify;">принял указанные выше «Косметические средства».</p>
<p style="text-align: justify;">Настоящим подтверждает, что</p>
<p style="text-align: justify;">    - необходимая и установленная ст.ст. 6,8,10 Закона РФ «О защите прав потребителей», до сведения Покупателя Продавцом доведена.</p>
<p style="text-align: justify;">- информация об организациях, уполномоченных Изготовителем производить гарантийное обслуживание товара, в период гарантийного срока службы «Товара», адрес местонахождения рекламационного подразделения организации Продавца, адреса до сведения Покупателя работником Продавца доведена.</p>
<p style="text-align: justify;">- сведения о назначении товара, входящих в состав изделия ингредиентах, действии и оказываемом эффекте, ограничениях (противопоказаниях) для применения, способах и условиях применения, массе нетто или объеме и (или) количестве единиц изделия в потребительской упаковке, условиях хранения до сведения Покупателя доведены.</p>
<p style="text-align: justify;"> Факт передачи мне представителем Продавца:</p>
<p style="text-align: justify;">«Товара» в надлежащей таре и упаковке, надлежащего количества, в полной комплектности, надлежащего качества, в необходимом ассортименте с полным комплектом сопроводительной документации на русском языке (руководство по применению комплекта косметических средств, руководство по применению массажного прибора), а также ознакомление с копиями Деклараций о соответствии.</p>
<p>________________________________________________________________________________________________________</p>
<p>________________________________________________________________________________________________________</p>
<p>________________________________________________________________________________________________________</p>
<p style="text-align: justify;"><span style="font-weight: bold;">(Замечаний и претензий по упаковке, количеству, качеству, комплектности, ассортименту товара и сопроводительной документации не имею.</span>
<span style="font-weight: bold;"> </span><span style="font-weight: bold;">Целостность упаковки мною проверена, пломбы не сорваны.)</span></p>
<p style="text-align: justify;"><span style="width: 10px;"> </span></p>
<p style="text-align: justify;">ФИО Покупателя _<u><b><?=$_POST["family"];?></b></u>_<u><b><?=$_POST["name"];?></b></u>_<u><b><?=$_POST["lastname"];?></b></u>_                    Подтверждаю ____________________________</p>
<p style="text-align: justify;">Получил товар_____________________________</p>
<p style="text-align: justify;"></p><p style="text-align: justify;">                                                                                                      </p>
<p style="text-align: justify;">Передал товар _________________________ Т.В. Рожкова</p>
<p style="height: 20px;"><br /></p></div>
</div>