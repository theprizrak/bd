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
    <th width="260">ФИО</th>
    <th width="105">Должность</th>
    <th width="105">Назначено</th>
    <th width="105">Пройдено</th>
    <th width="105">Отказов</th>
    <th width="105">Продаж</th>
  </tr>
  </thead>
  <tbody>
   <?php 
   if ($info==1){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотрудник успешно добавлен</strong>
    </div>
    ';
   }
   if ($info==2){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотрудник успешно отредактирован</strong>
    </div>
    ';
   }
   if ($info==3){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотрудник успешно удален</strong>
    </div>
    ';
   }
    if (count($telemarketologs)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Сотрудник не найден!</strong>
</div>
    ';
   }
   else {
   foreach ($telemarketologs as $telemarkets):

   ?>
  <tr data-href="/admin/telemarketologs_view?id=<?=$telemarkets['id'];?>">
    <td style="text-align: left;" class="names"><?=$telemarkets['family'];?>&nbsp;<?=$telemarkets['name'];?>&nbsp;<?=$telemarkets['lastname'];?></td>
    <td><?=$telemarkets['doljn'];
    /*$CI =&get_instance();
    //$user=$telemarkets['family'].' '.$telemarkets['name'];
    $user_id=$CI->user_model->get_id_telemarketologs($telemarkets['family'],$telemarkets['name']);
    echo $user_id['id'];
    */
    ?></td>
    <td><?
    $CI =&get_instance();
    $user=$telemarkets['family'].' '.$telemarkets['name'];
    $naznach=$CI->user_model->get_nazn_telemarketologs($user);
    echo $naznach;
    ?></td>
    <td><?
    $user=$telemarkets['family'].' '.$telemarkets['name'];
    $proid=$CI->user_model->get_proid_telemarketologs($user);
    echo $proid;
    ?></td>
    <td><?=$telemarkets['doljn'];?></td>
    <td><?
    $user=$telemarkets['family'].' '.$telemarkets['name'];
    $prod=$CI->user_model->get_prod_telemarketologs($user);
    echo $prod;
    ?></td>
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>
</div>