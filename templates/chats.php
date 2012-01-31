<?if(isset($_COOKIE['auth'])):?>
<form method="post" action="index.php?get=chats&display=set">
Создать новый пост:<br><textarea cols="80" rows="4" name="post"></textarea><br />
<input type="submit" value="Запостить">
</form><br><br>
<table id="myDivElement" border="0" cellspacing="0" cellpadding="3">
<?foreach($array['chats'] as $v):?>
<?$user=kare($array['users'],'id',$v['user']);?>
<tr id="<?=$v['id'];?>"><td><?=$user['login'];?> написал: <hr color=white><td><?=$v['post']?><hr color=white></tr>
<?endforeach;?>
</table>
<?else:?>
Чтобы иметь возможность отправлять сообщения вaм необходимо авторизироваться.
<?endif?>