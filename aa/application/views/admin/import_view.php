<div id="middle">
 <?php
   if ($error==1){
    echo '
    <div id="dialog" title="Инфо">
    <strong>'.$info.'</strong>
    </div>
    ';
   }
   if ($error==2){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Ошибка!!</strong>
    </div>
    ';
   }
   if ($this->session->flashdata('success') == TRUE){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Импорт прошел успешно!</strong>
    </div>
    ';
   }
?>
            <h2>Импорт клиентов в базу</h2>
                <form method="post" action="<?php echo base_url() ?>admin/import" enctype="multipart/form-data">
                    <input type="file" name="userfile" ><br><br>
                    <input type="submit" name="import_ok" value="Загрузить" class="buttons">
                </form>
 <br />
 <br />
 <strong>Инструкция по оформлению файла для успешного импорта</strong>
<ul type="1">
 <li>В файле должны быть размещены следующие заголовки полей:<br />
 <ul>
  <li>family</li>
  <li>name</li>
  <li>lastname</li>
  <li>phone</li>
 </ul>
 </li>
  <li>Файл нужно обязательно редактировать с помощью OpenOffice</li>
  <li>Сохранять файл нужно как .csv с разделителем точка с запятой '<strong>;</strong>'</li>
  <li>1</li>
  <li>1</li>
 </ul>
 
 
</div>