<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>Relationshipsmanager</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	</head>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
</head>
<body>
<p><a name="top"></a> <?php include ("header.php"); ?></p>

<p>&nbsp;</p>

<table width=100%>
<tr>
<td width=20% valign=top>
Папки (если таковые были созданы пользователем)
<br><br>
<hr>
<br>
Алфавитный список (буквы появляются сами по мере появления / добавления контактов)
<br><br>
<hr>
<br>
Тэги (если таковые были созданы пользователем)
</td>
<td width=5%>&nbsp;</td>
<td width=50% valign=top name="main_area" id="main_area">
<!-- здесь начинается вложенная таблица -->
<table width=100% border=0>
<tr>
<td width=48%>
<b>Contact's own entries</b>
</td>
<td width=4%>&nbsp;</td>
<td width=48%>
<b>Your own entries about contact</b>
</td>
</tr>
<tr>
<td width=48%>&nbsp;</td>
<td width=4%>&nbsp;</td>
<td width=48%>&nbsp;</td>
</tr>
<tr>
<td width=48%>
Вася Пупкин
<br><br>
E-Mail:
<br><br>
vasya.pupkin@pupkin.com
<br><br>
Telefon:
<br><br>
+ 49 175 4523 6543
<br><br>
Notes:
<br><br>
Text of the note(s)
</td>
<td width=4%>&nbsp;</td>
<td width=48%>
Василий Иванович Полетаев
<br><br>
E-Mail:
<br><br>
vasily@siemens.de
<br><br>
Telefon:
<br><br>
+ 49 69 4567 8954
<br><br>
Notes:
<br><br>
Text of the note(s)
</td>
<tr>
<td width=48%>&nbsp;</td>
<td width=4%>&nbsp;</td>
<td width=48%>&nbsp;</td>
</tr>
<tr>
<td colspan=3 align=center>
<b>History of communication</b>
<br><br>
Bla bla bla 
<br><br>
Export into DOC | Export into PDF
</td>
</tr>
<tr>
<td width=48%>&nbsp;</td>
<td width=4%>&nbsp;</td>
<td width=48%>&nbsp;</td>
</tr>
<tr>
<td colspan=3 align=center>Write a message to the contact
<br><br>
<textarea name="" id="">Your message to the contact</textarea>
<br>
<select name="" id="email_contact_contact_select"><option name="" id="email_contact_contact_option_messenger" value="platform_messenger">Using platform messenger</option><option name="" id="email_contact_contact_option_email" value="">* E-mail</option></select>
<br>
<input name="" id="email_contact_contact_input" value="E-mail address"><br>
<!-- here, in the script below, we will dynamically show or hide input field -->
<script>
$(function(){
$('#email_contact_contact_input').hide();
});

$(function(){
$('#email_contact_contact_option_email').click (function(){
$('#email_contact_contact_input').show();
});
$('#email_contact_contact_option_messenger').click (function(){
$('#email_contact_contact_input').hide();
});
});
</script>
<!-- End of the script -->
<button name="" id="">Send</button>
</td>
</tr>
<tr>
<td width=48%>&nbsp;</td>
<td width=4%>&nbsp;</td>
<td width=48%>&nbsp;</td>
</tr>
<tr>
<td colspan=3 align=center>
<button name="" id="">Delete contact</button>
<br><br>
// get confirmation before deleting contact
</td>
</tr>
<tr>
<td width=48%>&nbsp;</td>
<td width=4%>&nbsp;</td>
<td width=48%>&nbsp;</td>
</tr>
</table>
<!-- здесь заканчивается вложенная таблица -->
</td>
<td width=5%>&nbsp;</td>
<td width=20% valign=top>
Активные запросы на добавление в список контактов и возможности видеть записи сделанные контактом
<br><br>
<hr>
<br>
Приглашение друзей, родственников и / или знакомых пользоваться платформой
<br><br>
E-mail или номер мобильного телефона в интернациональном формате <input name="" id="">
<textarea name="" id="">Your invitation text</textarea>
<br>
<select name="" id=""><option name="" id="" value="">E-Mail</option><option name="" id="" value="">Whatsapp</option><option name="" id="" value="">Telegram</option><option name="" id="" value="">Viber</option><option name="" id="" value="">WeChat</option><option name="" id="" value="">Line</option><option name="" id="" value="">* Other, write us which one</option></select>
<br><br>
// On this * choice, will appear input box and button "Send"
<br><br>
<button name="" id="">Отправить сообщение</button> 
<br>(по e-mail или любому мессенжеру с API) 
</td>
</tr>
</table>
<?php include("footer.php"); ?>

<p>&nbsp;</p>
</body>
</html>
