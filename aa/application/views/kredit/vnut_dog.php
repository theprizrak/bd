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
<p align="center">
    Договор купли-продажи № _<u><b><?=$_POST["number_dog"];?></b></u>_
</p>
<p>
    г.Волгоград <u><b><?=date('d');?></b></u>_»_<u><b><?=$mount;?></b></u>_ <span style="text-decoration: underline;"><u><b><?=date('Y');?></b></u></span>_года
</p>
<p>
    <strong>Исполнитель: </strong>
    Общество с ограниченной ответственностью «Академия Красоты», расположенное по адресу: 400005, г.Волгоград, ул. Рабоче-Крестьянская, д.9 «Б», в лице
    Генерального директора Рожковой Татьяны Викторовны, действующей на основании Устава, с одной стороны, и
</p>
<p>
    <strong>Заказчик: </strong>
    _<u><b><?=$_POST["family"];?></b></u>_<u><b><?=$_POST["name"];?></b></u>_<u><b><?=$_POST["lastname"];?></b></u>_, с другой стороны, вместе именуемые «Стороны», заключили настоящий Договор о нижеследующем:
</p>
<p align="center">
    <strong>1. </strong>
    <strong>Предмет Договора</strong>
</p>
<p>
    1.1. В соответствии с настоящим Договором, Исполнитель обязуется оказать Заказчику на возмездной основе сервисный продукт (указывается в соответствии с
    Прайс - листом) – в количестве <strong><u>_<u><b><?=$_POST["prodobespech"];?></b></u>_ штук на сумму _<b><?=$_POST["summa_proced"];?></b></u>_рублей,</u></strong> а Заказчик обязуется оплатить
    стоимость предоставленных сервисного продукта, а также выполнять требования Исполнителя, обеспечивающие качественное предоставление сервисного продукта,
    включая сообщение необходимых для этого сведений.
</p>
<p>
    1.2. Перечень и стоимость сервисного продукта, предоставляемых Заказчику, оговариваются действующим Прайс-листом Исполнителя.
</p>
<p>
    1.3. При исполнении настоящего Договора Стороны руководствуются действующим российским законодательством.
</p>
<p align="center">
    <strong>2. </strong>
    <strong>Условия и порядок оказания сервисного продукта</strong>
</p>
<p>
    2.1. Исполнитель оказывает услуги по настоящему Договору в помещении Исполнителя, расположенного по адресу: 400005, г.Волгоград, ул. Рабоче-Крестьянская,
    д.9 «Б».
</p>
<p>
    2.2. Исполнитель оказывает сервисный продукт по настоящему Договору в дни и часы работы, которые устанавливаются Администрацией Исполнителя и доводятся до
    сведения Заказчика.
</p>
<p>
    2.3. Предоставление сервисного продукта по настоящему Договору происходит в порядке предварительной записи Заказчика на прием.
</p>
<p>
    2.4. Срок оказания сервисного продукта: _<u><b><?=$_POST["srokproced"];?></b></u>_ месяц (а) (ев). Исполнитель имеет право оказать сервисный продукт досрочно.
</p>
<p align="center">
    <strong>3. </strong>
    <strong>Цена и порядок оказания сервисного продукта</strong>
</p>
<p>
    3.1. Стоимость указанной в пункте 1.1. настоящего Договора сервисного продукта составляет _<u><b><?=$_POST["summa_proced"];?></b></u>_
    (_<u><b style="font-size: 13px;"><? echo num_propis($_POST["summa_proced"]);?></b></u>_) рублей.
</p>
<p>
    3.2. Оплата сервисного продукта по Договору производится Заказчиком в следующем порядке (нужное отметить знаком «V»):
</p>
<table border="1" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td width="25" valign="top">
            </td>
            <td width="565" valign="top">
                <p>
                    Полная оплата сервисного продукта Исполнителя в день подписания Договора;
                </p>
            </td>
        </tr>
        <tr>
            <td width="25" valign="top">
            </td>
            <td width="565" valign="top">
            </td>
        </tr>
        <tr>
            <td width="25" valign="top">
            </td>
            <td width="565" valign="top">
                <p>
                    рассрочка оплаты;
                </p>
            </td>
        </tr>
        <tr>
            <td width="25" valign="top">
            </td>
            <td width="565" valign="top">
            </td>
        </tr>
        <tr>
            <td width="25" valign="top">
            </td>
            <td width="565" valign="top">
                <p>
                    Пут путем заключения кредитного договора с Банком.
                </p>
            </td>
        </tr>
    </tbody>
</table>
<p>
    3.3. На момент подписания настоящего Договора Заказчиком в счет обеспечения исполнения обязательств по настоящему Договору и в доказательство его
    заключения внесен задаток в размере:_<u><b><?=$_POST["first_vznos"];?></b></u>_ (_<u><b style="font-size: 13px;"><? echo num_propis($_POST["first_vznos"]);?></b></u>_) рублей. Указанная в настоящем пункте сумма задатка, в случае оплаты Заказчиком сервисного продукта в
    рассрочку, в том числе, путем заключения с Банком договора на предоставление кредита на срок на 36 месяцев, засчитывается в счет первоначального взноса
    Заказчика по кредитному договору с Банком. Оплата за сервисный продукт может вносится Заказчиком за счет денежных средств, полученных Заказчиком по
    кредитному договору с Банком. Механизм оплаты, сроки оплаты, размер первоначального взноса, размер ежемесячного платежа определяется кредитным договором
    Заказчика с Банком.
</p>
<p align="center">
    <strong>4.1. </strong>
    <strong>Права и обязанности Сторон</strong>
</p>
<p>
    Исполнитель обязуется:
</p>
<p>
    4.1.1. Своевременно и качественно оказать сервисный продукт в соответствии с условиями настоящего Договора.
</p>
<p>
    4.1.2. Обеспечить Заказчика в установленном порядке информацией, включающей в себя сведения о месте оказания сервисного продукта, режиме работы, перечне
    платных сервисных продуктов с указанием их стоимости, об условиях предоставления и получения этих сервисных продуктов.
</p>
<p align="center">
    <strong>4.2. </strong>
    <strong>Права и обязанности Заказчика:</strong>
</p>
<p>
    4.2.1. Заказчик обязуется надлежащим образом исполнять условия настоящего Договора и своевременно информировать Исполнителя о любых обстоятельствах,
    препятствующих исполнению Заказчиком настоящего Договора.
</p>
<p>
    4.2.2. Заказчик обязуется заблаговременно информировать Исполнителя о необходимости отмены или изменении назначенного ему времени получения сервисного
    продукта. В случае опоздания Заказчика более чем на 20 (двадцать) минут по отношению к назначенному Заказчику времени получения сервисного продукта,
    Исполнитель оставляет за собой право на перенос или отмену срока получения услуги.
</p>
<p align="center">
    <strong>5. </strong>
    <strong>Конфиденциальность</strong>
</p>
<p>
    5.1. Заказчик обязуется хранить в тайне информацию о факте обращения Заказчика за сервисным продуктом.
</p>
<p align="center">
    <a name="_GoBack"></a>
    <strong>6. </strong>
    <strong>Заключительные положения</strong>
</p>
<p>
    6.1. Настоящий Договор вступает в силу с момента его подписания Сторонами.
</p>
<p>
    6.2. Срок действия настоящего Договора: с момента подписания настоящего Договора до исполнения Сторонами обязательств по настоящему Договору.
</p>
<p>
    6.3. Настоящий Договор может быть расторгнут по соглашению Сторон.
</p>
<p>
    6.4. Настоящий Договор составлен в двух подлинных экземплярах, по одному для каждой из Сторон, вступает в силу с момента его подписания и действует до
    полного исполнения Сторонами своих обязательств. Использование факсимильного воспроизведения подписи допускается в порядке, предусмотренном ст. 160
    Гражданского кодекса Российской Федерации.
</p>
<p align="center">
    <strong>7. </strong>
    <strong>Реквизиты Сторон</strong>
</p>
<div class="storoni">
    <p style="text-align: justify;"><span style="font-weight: bold;">Продавец:</span></p>
	<p style="text-align: justify;"><span style="font-weight: bold;">ООО «Академия Красоты»</span></p>
	<p style="text-align: justify;"><span style="width: 10px;"> </span></p>
	<p style="text-align: justify;">Юр. Адрес:400001, г. Волгоград, ул. Канунникова, д .6/1</p>
	<p style="text-align: justify;">Факт. Адрес: 400001, г. Волгоград,</p>
	<p style="text-align: justify;">ул. Рабоче-Крестьянская, д. 9б</p>
	<p style="text-align: justify;">ИНН 3445127952; КПП 346001001;</p>
	<p style="text-align: justify;">ОГРН 1123460006009</p>
	<p style="text-align: justify;">р/счет № 40702810726000465518</p>
	<p style="text-align: justify;">в Южный филиал ЗАО «Райффайзенбанк» г. Краснодар</p>
	<p style="text-align: justify;">кор. счет 30101810900000000556</p>
	<p style="text-align: justify;">БИК: 040349556</p>
	<p style="text-align: justify;">Телефон: (8442) 25-30-33</p>
	<p style="text-align: justify;">________________ Генеральный директор</p>
	<p style="text-align: justify;">(Рожкова Т.В.)</p>
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