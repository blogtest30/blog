<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
	<title>Бложек</title>
	<script type="text/javascript">
function setRequest(data)
	{
	xmlHttp=new XMLHttpRequest();
	myDiv=document.getElementById("myDivElement");
	params="param="+'{"lastid":"'+data+'"}';
	xmlHttp.open("Post","index.php?get=chats",true);
	xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlHttp.send(params);
	xmlHttp.onreadystatechange=function()
		{
		if(xmlHttp.status==200)
			{
			try
				{
				if(xmlHttp.readyState==4 && xmlHttp.responseText!="null" && xmlHttp.responseText!="")
					{
					eval("arrofc="+xmlHttp.responseText);
					for(i=0;i<arrofc.length;i++)
						{
						myDiv.lastChild.innerHTML="<tr id="+arrofc[i].id+"><td>"+arrofc[i].user+" написал: <hr color=white><td>"+arrofc[i].post+"<hr color=white></tr>"+myDiv.lastChild.innerHTML;
						}
					}
				}
			catch(e)
				{
				alert("Ошибка чтения данных: "+e.toString());
				}
			}
		else
			{
			alert("Неожиданный ответ от сервера:\n"+xmlHttp.statusText);
			}
		};
	}
window.onload= function()
	{
	setInterval('setRequest(document.getElementById("myDivElement").lastChild.firstChild.getAttribute("id"))', 3000)
	}
	</script>
</head>
<body bgcolor="fafafa">
<table width="100%" height="100%">
<tr><td height="150" colspan="2" align="center" valign="middle"><h1>Хeader</h1></tr>
<tr><td width="250" valign="top" style="padding:50px"><?if(isset($_COOKIE['auth'])):?>Привет, <?=$_COOKIE['auth'];?>!<br><a href="index.php?get=users&display=logout">Выйти</a>
<?else:?>
У тебя уже есть аккаунт?<br>Тогда заходи<br><br><form method="post" action="index.php?get=users&display=login">Login:<input name="login"><br><br>Pass: &nbsp;<input type="password" name="password"><br><br><input type="submit" value="Войти"></form><br><br><br>А если и аккаунта у тебя нет, то не отчаивайся, а <a href="index.php?get=users&display=set">регистрируйся</a>
<?endif?>
<br><br><br><br><a href="index.php">Блог</a><br><a href="index.php?get=chats">Чат</a>
<td valign="top" style="padding:50px 50px 50px 0">