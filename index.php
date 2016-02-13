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
День рождения сегодня:
<br><br>
<hr>
<br>
Алфавитный список (буквы появляются сами по мере появления / добавления контактов)
<br><br>
<span style="color: white; background-color: red; font-weight: bold; ">Red</span> - The contact is overdue. You need to contact this contact. Last contact: "Date"
<br><br>
<span style="color: white; background-color: orange; font-weight: bold; ">Orange</span> - The contact is due. You need to contact this contact. Last contact: "Date"
<br><br>
<span style="color: black; background-color: yellow; font-weight: bold; ">Yellow</span> - The contact will be due soon. You can contact this contact now. Last contact: "Date"
<br><br>
<span style="color: white; background-color: green; font-weight: bold; ">Green</span> - It's all good. Last contact: "Date"
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
<b>Contact's own entry</b>
</td>
<td width=4%>&nbsp;</td>
<td width=48%>
<b>Your own entry about contact</b>
</td>
</tr>
<tr>
<td width=48%>&nbsp;</td>
<td width=4%>&nbsp;</td>
<td width=48%>&nbsp;</td>
</tr>
<tr>
<td width=48% valign=top>
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
Date of birth:
<br><br>
15 апреля 1990 
<br><br>
Notes:
<br><br>
Text of the note(s)
</td>
<td width=4%>&nbsp;</td>
<td width=48% valign=top>
Василий Иванович Полетаев
<br><br>
Nickname:
<br><br>
Вася Полёт
<br><br>
E-Mail:
<br><br>
vasily@siemens.de
<br><br>
Telefon:
<br><br>
+ 49 69 4567 8954
<br><br>
Date of birth:
<br><br>
29 марта 1970 
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
E-mail или номер мобильного телефона в интернациональном формате
<br><br> 
<input name="" id="">
<br><br>
<textarea name="" id="">Your invitation text</textarea>
<br><br>
<select name="" id=""><option name="" id="" value="">E-Mail</option><option name="" id="" value="">Whatsapp</option><option name="" id="" value="">Telegram</option><option name="" id="" value="">Viber</option><option name="" id="" value="">WeChat</option><option name="" id="" value="">Line</option><option name="" id="other" value="">* Other, write us which one</option></select>
<br><br>
<span id="other_messengers"><input>
<br><br>
<button id="save_other_messengers_recommendation">Save</button>
</span>
<br><br>
<button name="" id="">Отправить сообщение</button> 
<br>(по e-mail или любому мессенжеру с API) 
</td>
</tr>
</table>

<!-- скрипт рекомендации других мессенжеров -->

<script>

$(function(){
$('#other_messengers').hide();
});

$(function(){
$('#other').click (function(){
$('#other_messengers').show();
});
});

/*

Надо написать фунцию которая будет отправлять рекомендации новых мессенжеров с ввода рекомендаций после того как человек кликнет на кнопку сохранить. 

text="Спасибо Вам за Вашу рекомендацию. Ваша рекомендация была успешно отправлена нам.";

*/

</script>

<!-- Конец скрипта рекомендации других мессенжеров -->


<!-- набор функций для верхнего меню -->

<script>

$(function(){
$('#messages_link').click(function() {
$('#main_area').html("Here will be your messages");
});
});


$(function(){
$('#profile').click(function() {
$('#main_area').html('<h1>Profile</h1><br><br>Вася Пупкин <font color=gray>Visible to all</font><br><br>E-Mail: <font color=gray>Visible to all</font><br><br>vasya.pupkin@pupkin.com<br><br>Telefon: <font color=gray>Visible only to friends</font><br><br>+ 49 175 4523 6543<br><br>Date of birth: <font color=gray>Visible to all</font><br><br>15 апреля 1990 <br><br>Notes: <font color=gray>Visible to nobody / Private</font><br><br>Text of the note(s)<br><br><a name="settings"></a><h2>Settings</h2>');
});
});


$(function(){
$('#settings').click(function() {
$('#main_area').html('<h1>Profile</h1><br><br>Вася Пупкин <font color=gray>Visible to all</font><br><br>E-Mail: <font color=gray>Visible to all</font><br><br>vasya.pupkin@pupkin.com<br><br>Telefon: <font color=gray>Visible only to friends</font><br><br>+ 49 175 4523 6543<br><br>Date of birth: <font color=gray>Visible to all</font><br><br>15 апреля 1990 <br><br>Notes: <font color=gray>Visible to nobody / Private</font><br><br>Text of the note(s)<br><br><a name="settings"></a><h2>Settings</h2>');
});
});

</script>

<!-- Конец набора функций для верхнего меню -->

<?php include("footer.php"); ?>

<p>&nbsp;</p>
</body>
</html>
