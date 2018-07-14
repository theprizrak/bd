<?include 'propis.php';?>
<?
$klient = $this->user_model->edit_klients($_POST["id"]);
//$dem=08;
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
<div id="filter">
<input type="button" value="Печать" class="buttons_fil" onclick="print()" />
<a href="/kredit/view_dog?id=<?=$_POST["id"];?>&id_dog=<?=$_POST["id_dog"];?>"><input type="button" value="Вернуться" class="buttons_fil"></a>
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
<div id="textnew">
	<p style="text-align: center;">
	<span style="font-weight: bold;">ДОГОВОР КУПЛИ-ПРОДАЖИ № _<u><b><?=$_POST["number_dog"];?></b></u>_</span></p>
	<p style="text-align: justify;">г. Волгоград «_<u><b><?=date('d');?></b></u>_»_<u><b><?=$mount;?></b></u>_ <span style="text-decoration: underline;"><u><b><?=date('Y');?></b></u></span> г.</p>
	<p style="text-align: justify;">
	<span style="font-weight: bold;">Общество с ограниченной ответственностью «Фаджара»</span>
	, в лице  директора Толстенко Аллы Анатольевны, действующего на основании Устава, именуемое в дальнейшем «Продавец» с одной стороны, и Гражданин (ка) РФ</p>
	<table class="zw-table tblthme1" style="width: 5in; border-collapse: collapse;"><tbody><tr>
    <?
     $i=0;
     while($i<=count($text)-1)
     {
        if($text[$i]==' '){echo '<td style="border-color: #000000; width: 5px; height: 0in;"><br /></td>';}
        else{echo '<td style="border: 1px solid #000000; width: 13px; height: 0in;text-align: center;font-weight: bold;">'.$text[$i].'</td>';}
        $i++;
     }
    ?>
	</tr>
	</tbody>
	</table>
	<p style="text-align: justify;">действующий (ая) по своей воле и в своих интересах, именуемый (ая) в дальнейшем «Покупатель», с другой стороны, заключили настоящий договор о нижеследующем:</p>
	<ol><li style="text-align: justify;">
	<p><span style="font-weight: bold;">Предмет и основные условия договора</span></p></li></ol>
	<p style="text-align: justify;">Предметом настоящего договор</p>
	<p style="text-align: justify;">а является комплекс по уходу на базе косметических средств (далее по тексту - "Комплекс")
	</p>
	<table class="zw-table tblthme1" style="width: 6in; border-collapse: collapse;">
	<tbody>
	<tr>
	<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px;"><p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 736px;">
	<p style="text-align: justify;" class="V">для ухода за волосами «Diamond Treasures Brilliant Hair»;</p></td>
    </tr>
	<tr>
	<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px;max-width: 15px;max-height: 15px;">
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 736px;">
	<p style="text-align: justify;" class="V">для ухода за телом «Diamond Treasures Skin Glory»;</p></td>
    </tr>
	<tr>
	<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px;">
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 736px;">
	<p style="text-align: justify;" class="V">для мужчин «Diamond Treasures Men Gear»;</p></td>
    </tr>
	<tr>
	<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px;">
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 736px;">
	<p style="text-align: justify;" class="V">для ухода за кожей лица  <span style="font-weight: bold;">«</span>CRYSTAL YOUTH»;</p></td>
    </tr>
	<tr>
	<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px;">
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 736px;">
	<p style="text-align: justify;" class="V">для ухода за кожей лица  <span style="font-weight: bold;">«</span>Diamond Treasures»;</p></td>
    </tr>
	<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px;">
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="34" rowspan="1" style="border: 0px solid #000000; width: 736px;">
	<p style="text-align: justify;" class="V">Вторичная продукция </p></td>
	
	
    </tr>
	
	</tbody>
	</table>
	
	<p style="text-align: justify;">1.1.Продавец обязуется передать не позднее 30 календарных дней, с момента заключения договора в собственность Покупателю «Космет. средства» комплектность, количество и ассортимент которого указаны в акте приема-передачи, а Покупатель обязуется принять  в сроки, предусмотренные настоящим Договором.</p>
	
	<p style="text-align: justify;">1.4. Продавец передает Покупателю «Космет.средства» новые, надлежащего качества, в надлежащей ненарушенной таре и упаковке. Одновременно Продавец передал сопроводительную документацию с информацией о косметических средствах - руководство по применению и компонентный состав на русском языке, гарантийный талон.</p>
	<p style="text-align: justify;">1.5. Продавец обеспечивает _<u><b><?=$_POST["prodobespech"];?></b></u>_ посещений,   по согласованию с косметологом в течении _<u><b><?=$_POST["srokproced"];?></b></u>_ месяцев с даты заключения настоящего Договора.</p>
	<p style="text-align: justify;">1.6. «Косметич. средства» передается Покупателю в торговом помещении Продавца по адресу: 400001, г. Волгоград, ул. Рабоче-Крестьянская, 9б.</p>
	<p style="text-align: justify;">1.7. Покупатель своей подписью подтверждает, что продавец полностью выполнил требования ст.6,8,10 Закона «О защите прав потребителей», довёл до Покупателя полную информацию о переданном комплекте косметических средств, которая обеспечила добровольность и правильность выбора, полностью соответствует требованиям законодателества о качестве и безопасности. Противопоказаний к применению данного вида косметических средств Покупателем не заявлено .</p>
	<p style="text-align: justify;">_______________ ______________________________________________</p>
	<p style="text-align: justify;">(подпись) (ФИО Покупателя)</p>
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p><br />
	<p style="text-align: center;"><span style="font-weight: bold;">2. Цена, порядок и сроки оплаты товара</span></p>
	<p style="text-align: center;"><span style="width: 10px;"> </span></p>
	<p style="text-align: justify;">2.1. Комплекс продан Покупателю с условием (нужное отметить знаком V):</p>
	<table class="zw-table tblthme1" style="width: 6in; border-collapse: collapse;">
	<tbody>
    <tr>
    <td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px; height: 0in;">
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="29" rowspan="1" style="border: 0px solid #000000; width: 539px; height: 0in;">
	<p style="text-align: justify;" class="V">полной оплаты при подписании Договора наличным платежом;</p></td>
    </tr>
	<tr>
	<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px; height: 0in;">
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="29" rowspan="1" style="border: 0px solid #000000; width: 539px; height: 0in;">
	<p style="text-align: justify;" class="V">рассрочки платежа;</p></td>
    </tr>
    <tr>
	<td><img src="<?= base_url();?>/images/ok.jpg" /></td>
	<td style="border-color: #000000; width: 15px;">
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p></td>
	<td colspan="29" rowspan="1" style="border: 0px solid #000000; width: 539px;">
	<p style="text-align: justify;" class="V">из средств потребительского кредита по выданному банком распоряжению об оплате ;</p></td></tr></tbody></table>
	<p><td>Покупатель , заключая Договор , ознакомлен с условиями, тарифами, способами оплаты. В случае приобретения на условиях в кредит
Покупатель понимает, что сумма в договоре купли-продажи и кредитном договоре могут быть различны т.к. продавец  
компенсирует Покупателю проценты по кредитному договору путём предаствления скидки от первоначальной стоимости комплекса. Полная стоимость, включая проценты по кредитному договору, будет равна первоначальной стоимости
указанной в договоре.	</td></p>
    
	
	<p style="text-align: justify;">2.2. Цена комплекса составляет___<u><b><?=$_POST["summa"];?></b></u>___ (<u><b style="font-size: 13px;"><? echo num_propis($_POST["summa"]);?></b></u>) рублей.</p>
	<p style="text-align: justify;">2.3. Покупатель при подписании Договора, произвел оплату «Комплекса» в размере _____<u><b><?=$_POST["first_vznos"];?></b></u>_____ рублей.</p>
	<p style="text-align: justify;">2.5. Покупатель имеет право на досрочную оплату «Комплекса».</p>
	<p style="text-align: center;"><span style="font-weight: bold;">3. Прочие условия</span></p>
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p>
	<p style="text-align: justify;">3.1. Нарушении или невыполнение Покупателем условий договора предоставляет Продавцу право истребовать понесенные расходы.</p>
	<p style="text-align: justify;">3.2. Настоящий Договор составлен в двух подлинных экземплярах, по одному для каждой из Сторон, вступает в силу с момента его подписания и действует до полного исполнения Сторонами своих обязательств. Использование факсимильного воспроизведения подписи допускается в порядке, предусмотренном ст.160 ГК РФ.</p>
	<p style="text-align: center;"><span style="font-weight: bold;">4. Адреса и реквизиты сторон</span></p>
    
    <div class="storoni">
    <p style="text-align: justify;"><span style="font-weight: bold;">Продавец:</span></p>
	<p style="text-align: justify;"><span style="font-weight: bold;">ООО «Фаджара»</span></p>
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p>
	<p style="text-align: justify;">Юр. Адрес:400006, г. Волгоград, пр-кт. Ленина, д .213</p>
	<p style="text-align: justify;">Факт. Адрес: 400001, г. Волгоград,</p>
	<p style="text-align: justify;">ул. Рабоче-Крестьянская, д. 9б</p>
	<p style="text-align: justify;">ИНН 3459060627; КПП 345901001;</p>
	<p style="text-align: justify;">ОГРН 1153443002140</p>
	<p style="text-align: justify;">р/счет № 40702810201200000123</p>
	<p style="text-align: justify;">ЗАО Акционерный Банк "Первомайский"</p>
	<p style="text-align: justify;">кор. счет 30101810000000000715</p>
	<p style="text-align: justify;">БИК: 040349715</p>
	<p style="text-align: justify;">________________ Директор</p>
	<p style="text-align: justify;">(Толстенко А.А.)</p>
    </div>
    <div class="storoni">
    <p style="text-align: justify;"><span style="font-weight: bold;">Покупатель:</span></p>
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p>
	<p style="text-align: justify;">_<u><b><?=$_POST["family"];?></b></u>_<u><b><?=$_POST["name"];?></b></u>_<u><b><?=$_POST["lastname"];?></b></u>_</p>
	<p style="text-align: justify;">Дата рождения _<u><b><?=$this->user_model->rotate_date2($klient["brichday"]);?></b></u>_ Место рождения_<u><b><?=$klient["mesto_rozd"];?></b></u>_</p>
	<p style="text-align: justify;"></p>
	<p style="text-align: justify;">Паспорт серия_<u><b><?=$_POST["ser_pasp"];?></b></u>_ №_<u><b><?=$_POST["nom_pasp"];?></b></u>_, выдан_<u><b><?=$_POST["vidan"];?></b></u>_</p>
	<p style="text-align: justify;">дата выдачи_<u><b><?=$_POST["date_vidan"];?></b></u>_</p>
	<p style="text-align: justify;">Зарегистрирован по адресу: _<u><b><?=$_POST["mesto_prop"];?></b></u>_</p>
	<p style="text-align: justify;"></p>
	<p style="text-align: justify;">Фактический адрес:_<u><b><?=$_POST["mesto_proz"];?></b></u>_</p>
	<p style="text-align: justify;"></p>
	<p style="text-align: justify;">Тел. дом.: _<u><b><?=$_POST["teldom"];?></b></u>_раб._<u><b><?=$_POST["telrab"];?></b></u>_сот._<u><b><?=$_POST["sotov"];?></b></u>_</p>
	<p style="text-align: justify;">______________________(___________________________________)</p>
	<p style="text-align: justify;">(подпись) (расшифровка подписи)</p></td></tr></tbody></table>
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p>
    </div>
    </div>
    </div>