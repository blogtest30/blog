<?if(isset($_COOKIE['auth'])):?>Написать новое сообщение в блог<form method="post" action="index.php?display=set"><textarea cols="80" rows="4" name="message"></textarea><br>
Добавить метки к сообщению (через запятую): <input type="text" name="usertag"> или выбрать из списка:
<select name="tag[]" size="3" multiple="true">
<?foreach($array['tags'] as $vl):?>
<option><?=$vl['tagname']?></option>
<?endforeach;?>
</select><br>
<input type="submit" value="Отправить"></form>
<br>
<?else:?>
Вы должны авторизироваться для того, чтобы иметь возможность писать сообщения в блог
<?endif?>
<br><br>В блоге всего <?=count($array['messages'])?> сообщение(й)
<?foreach ($array['messages'] as $v):?>
<?$ve=kare($array['users'],'id',$v['id_users'])?>
<hr><table width=100%><tr><td width=100%><p><b><a href="index.php?display=get&user=<?=$ve['id']?>"><?=$ve['firstname']?> <?=$ve['lastname']?></a></b> написал(а): <?if($_COOKIE['name']===$ve['id']):?><a href="index.php?display=delete&message=<?=$v['id']?>">удалить</a><?endif?><br><br /><?=$v['message']?><br /><br />
<?$msgtag=kare($array['messages_tags'],'id_messages',$v['id'],true)?>
<?if(is_array($msgtag)):?>
Метки этого сообщения:
<?foreach ($msgtag as $ke=>$va):?>
<?$tag=kare($array['tags'],'id',$va['id_tags'])?>
<a href="index.php?display=get&tag=<?=$tag['id']?>"><?=$tag['tagname']?></a>
<?endforeach;?>
<?else:?>
У этого сообщения нет тегов
<?endif?></tr></table>
<?endforeach;?>