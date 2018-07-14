<div id="middle">
<form action="/admin/find" method="post" name="find_klient">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%">Введите фамилию сотрудника</td>
    <td width="22%"><input name="family" type="text" value="<?if(isset($_POST['family']) && $_POST['family']!=''){echo $_POST['family'];}?>"></td>
    <td width="37%" align="left"><input name="find_ok" type="submit" value="Найти"></td>
  </tr>
</table>
</form>
<a href="/admin/add_sotrudnik">Добавить сотрудника</a>
<a href="/admin/add_users">Добавить пользователя</a>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList" id="sortTable">
  <thead>
  <tr>
    <th width="25%">ФИО</th>
    <th width="10%">Телефон</th>
    <th width="15%">Дата Рождения</th>
    <th width="20%">Должность
    <form method="GET" id="filt_doljn" action="/admin/">
    <select name="doljn" onchange="document.getElementById('filt_doljn').submit()" class="filter_select">
    <option value="all" <?if(isset($_GET['doljn']) && $_GET['doljn']=='all' || !isset($_GET['doljn'])){echo 'selected';}?>>Все</option>
    <option value="doc" <?if(isset($_GET['doljn']) && $_GET['doljn']=='doc'){echo 'selected';}?>>Врач</option>
    <option value="operator" <?if(isset($_GET['doljn']) && $_GET['doljn']=='operator'){echo 'selected';}?>>Оператор</option>
    <option value="sadmin" <?if(isset($_GET['doljn']) && $_GET['doljn']=='sadmin'){echo 'selected';}?>>Администратор Сервис</option>
    <option value="kosmet" <?if(isset($_GET['doljn']) && $_GET['doljn']=='kosmet'){echo 'selected';}?>>Косметолог</option>
    <option value="diagn" <?if(isset($_GET['doljn']) && $_GET['doljn']=='diagn'){echo 'selected';}?>>Диагност</option>
    <option value="it" <?if(isset($_GET['doljn']) && $_GET['doljn']=='it'){echo 'selected';}?>>IT</option>
    <option value="kredexp" <?if(isset($_GET['doljn']) && $_GET['doljn']=='kredexp'){echo 'selected';}?>>Кредитный эксперт</option>
    <option value="soperator" <?if(isset($_GET['doljn']) && $_GET['doljn']=='soperator'){echo 'selected';}?>>Оператор сервиса</option>
    <option value="ruktm" <?if(isset($_GET['doljn']) && $_GET['doljn']=='ruktm'){echo 'selected';}?>>Рук-ль тм1</option>
    <option value="poperator" <?if(isset($_GET['doljn']) && $_GET['doljn']=='poperator'){echo 'selected';}?>>Подтверждающий оператор</option>
    <option value="parih" <?if(isset($_GET['doljn']) && $_GET['doljn']=='parih'){echo 'selected';}?>>Парикмахер</option>
    <option value="yrist" <?if(isset($_GET['doljn']) && $_GET['doljn']=='yrist'){echo 'selected';}?>>Юрист</option>
    <option value="radmin" <?if(isset($_GET['doljn']) && $_GET['doljn']=='radmin'){echo 'selected';}?>>Администратор (ресепшен)</option>
    <option value="stkredexp" <?if(isset($_GET['doljn']) && $_GET['doljn']=='stkredexp'){echo 'selected';}?>>Старший кредитный эксперт</option>
    <option value="aup" <?if(isset($_GET['doljn']) && $_GET['doljn']=='aup'){echo 'selected';}?>>АУП</option>
    <option value="rukserv" <?if(isset($_GET['doljn']) && $_GET['doljn']=='rukserv'){echo 'selected';}?>>Рук-ль сервиса</option>
    
    </select>
    </form>
    </th>
	<th width="30%">Отдел</th>
  </tr>
  </thead>
  <tbody>
   <?php 
   if (isset($_COOKIE["info"]) && $_COOKIE["info"]==1){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотрудник успешно добавлен</strong>
    </div>
    ';
   }
   if (isset($_COOKIE["info"]) && $_COOKIE["info"]==2){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотрудник успешно отредактирован</strong>
    </div>
    ';
   }
   if (isset($_COOKIE["info"]) && $_COOKIE["info"]==3){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотрудник успешно удален</strong>
    </div>
    ';
   }
   if (isset($_COOKIE["info"]) && $_COOKIE["info"]==4){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Ошибка при сохранении. Возможно заполнены не все поля</strong>
    </div>
    ';
   }
    if (count($sotrudnik)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Сотрудник не найден!</strong>
</div>
    ';
   }
   else {
   foreach ($sotrudnik as $sotrudniks):

   ?>
  <tr data-href="/admin/sotrudnik_view?id=<?=$sotrudniks['id'];?>">
    <td style="text-align: left;" class="names"><?=$sotrudniks['family'];?>&nbsp;<?=$sotrudniks['name'];?>&nbsp;<?=$sotrudniks['lastname'];?></td>
    <td><?=$sotrudniks['phone'];?></td>
    <td><?=$this->user_model->rotate_date2($sotrudniks['date_rozd']);?></td>
    <td><?=$sotrudniks['doljn'];?></td>
    <td><?=$sotrudniks['otdel'];?></td>
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>
</div>