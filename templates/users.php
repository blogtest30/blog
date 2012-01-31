<form action="index.php?get=users&display=set" method="post" enctype="multipart/form-data">
Выберите себе логин:<br />
<input name="login"/>&nbsp;<?if(isset($array['loginerror'])):?><font color=red>Такой логин уже зарегистрирован или имеет неверный формат</font><?endif?><br />
Выберите пароль:<br />
<input type="password" name="password"/>&nbsp;<?if(isset($array['passworderror'])):?><font color=red>Пароль не может быть короче 3 букв</font><?endif?><br />
Укажите ваше имя:<br />
<input name="firstname" />&nbsp;<?if(isset($array['firstnameerror'])):?><font color=red>Имя не может быть короче 3 букв</font><?endif?><br />
И фамилию:<br />
<input name="lastname" />&nbsp;<?if(isset($array['lastnameerror'])):?><font color=red>Фамилиё не может быть короче 3 букв</font><?endif?><br />
Ваш E-mail:<br />
<input name="email" />&nbsp;<?if(isset($array['emailerror'])):?><font color=red>Вы ввели некорректный email</font><?endif?><br /><br>
<input type="submit" value="Зарегистрироваться">
</form>