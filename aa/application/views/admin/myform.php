<html>
<head>
<title>Моя Форма</title>
</head>
<body>

<?=$this->validation->error_string; ?>

<?=form_open('form'); ?>

<h5>Логин</h5>
<input type="text" name="username" value="" size="50" />

<h5>Пароль</h5>
<input type="text" name="password" value="" size="50" />

<h5>Подтверждение пароля</h5>
<input type="text" name="passconf" value="" size="50" />

<h5>Email</h5>
<input type="text" name="email" value="" size="50" />

<div><input type="submit" value="Отправить" /></div>

</form>

</body>
</html>