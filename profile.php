<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>Relationshipsmanager</title>
<link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	</head>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
</head>
<body>

<table border=1 width=100%><tr><td><h1>Profile</h1></td><td>&nbsp;</td><td valign=top><font color=gray><span title="Visible to all users">Public</span></font></td><td>&nbsp;</td><td valign=top><u id="" class="link" title="Add new entries">Add new entries</u></td><td align=right valign=top><u class="link" title="See how others see my profile">See how others see my profile</u></td></tr></table><table  border=1><tr><td valign=top width=48%>Profile ID: "web_id" <font color=gray><span title="Only you can see this">Private</span></font><br><br>Profile address: <br><br>"Profile address" https://site_address/ID <font color=gray><span title="Only you can see this">Private</span></font> <br><br>Вася <font color=gray><span title="Visible to all users">Public</span></font><br>Пупкин <font color=gray><span title="Visible to all users">Public</span></font><br><br>E-Mail: <font color=gray><span title="Visible to all users">Public</span></font><br><br>vasya.pupkin@pupkin.com <u class="link" id="">Delete</u><br><br>Telefon: <font color=gray>Visible only to friends</font><br><br>+ 49 175 4523 6543 <u class="link" id="">Delete</u><br><br>Date of birth: <font color=gray>Visible to all</font><br><br>15 апреля 1990 <u class="link" id="" title="Delete this entry">Delete</u>	<br><br>																	<a name="settings"></a><h2>Settings</h2>Who can add me:<br><br><input type="radio" id="contacted_by_everyone" value="everyone" name="who_can_add_me">Everyone<br><input type="radio" id="contacted_by_only_authorised" value="only_authorised" name="who_can_add_me">Only authorised people<br><input type="radio" id="contacted_by_no_one" value="no_one" name="who_can_add_me">No one<br><br>    Who can contact (message) me:<br><br><input type="radio" id="contacted_by_everyone" value="everyone" name="who_can_contact_me">Everyone<br><input type="radio" id="contacted_by_only_authorised" value="only_authorised" name="who_can_contact_me">Only authorised people<br><input type="radio" id="contacted_by_no_one" value="no_one" name="who_can_contact_me">No one							<br><br> 																			<a name="general_contact_settings"></a>I want to be informed: <br><br><input type="checkbox"> About company news<br> <input type="checkbox"> About cool and new features<h2>General contact settings</h2>How frequently to contact your contacts:<br><br><input type="checkbox" id="notification_weekly" value="weekly">weekly<br><input type="checkbox" id="notification_monthly" value="monthly">monthly<br><input type="checkbox" id="notification_quarterly" value="quarterly">quarterly<br><input type="checkbox" id="notification_halfyearly" value="halfyearly">half-yearly<br><input type="checkbox" id="notification_yearly" value="yearly">yearly<br><br>How to be notified:<br><br><input type="checkbox" id="notification_by_email" value="email">per e-mail<br><input type="checkbox" id="notification_by_sms" value="sms">per sms<br><input type="checkbox" id="notification_onsite" value="onsite">on-site notifications</td><td width=4%>&nbsp;</td><td valign=top width=48%>Notes: <font color=gray><span title="Visible to nobody">Private</span></font><br><br>Text of the note(s)<br><br></td></tr></table>

<table border=1 width=100%>
<tr>
<td width=48% valign=top>
<form name="" id="">
<input type="hidden" value="NULL" id="web_id" name=""><br>
  First name: <input type="text" id="first_name" name=""> <span title="Define here, who can see this entry?">Privacy:</span> <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>
Last name: <input type="text" id="last_name" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>
Father's name: <input type="text" placeholder="In some countries it's important" title="In some countries it's important" id="father_name" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>

<br>

Nickname: <input type="text" title="Just in case he or she had one" placeholder="Real nickname in real life :)" id="nickname" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>

<br>

Date of birth: <input type="date" id="date_of_birth" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>

<h4>Email(s)</h4>
<select><option>Private email</option><option>Business email</option><option>Other email</option></select> <u id="add_email_click">Add</u>
<div id="emails">
Private email: <input type="email" id="email_private" name=""> <span title="Define here, who can see this entry?">Privacy:</span> <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>
Business email: <input type="email" id="email_business" name=""> <span title="Define here, who can see this entry?">Privacy:</span> <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>
Other email: <input type="email" id="email_other" name=""> <span title="Define here, who can see this entry?">Privacy:</span> <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
</div>
  <br>

<h4>Phone(s)</h4>



<select id="phone_select1"><option value="private">private</option><option value="business">business</option><option value="other1">other</option></select> <select id="phone_select2"><option value="mobile_phone">mobile phone</option><option value="landline_phone">landline phone</option><option value="other2">other</option></select> <u id="add_phone_click">Add</u>
<br><br>
<div id="phones">
Private mobile phone: <input type="telephone" id="private_mobile_phone" name=""> Privacy: [<u class="link" title="Who can see this entry?">?</u>] <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>
Private landline phone: <input type="telephone" id="telephone_private" name=""> Privacy: [<u class="link" title="Who can see this entry?">?</u>] <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>
Business landline phone: <input type="telephone" id="business_landline_phone" name=""> Privacy: [<u class="link" title="Who can see this entry?">?</u>] <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>
Business mobile phone: <input type="telephone" id="telephone_business_mobile" name=""> Privacy: [<u class="link" title="Who can see this entry?">?</u>] <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
  <br>
Other phone: <input type="telephone" id="telephone_other" name=""> Privacy: [<u class="link" title="Who can see this entry?">?</u>] <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
</div>
  <br>

<h4>Address(es)</h4>

<select><option>private address</option><option>business address</option><option>other address</option></select> <u id="add_address_click">Add</u>

<br><br>

<div id="addresses_div">

<br>
<table border="1"><tbody><tr><td valign="middle"><h4>Business address</h4></td><td>&nbsp;</td><td valign="top"><span title="Define here, who can see this entry?">Privacy:</span> <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select></td></tr></tbody></table>
Address line: <input type="text" id="business_address_street_n_house" name=""><br>
Additional line: <input type="text" id="business_address_additional_line" name=""><br>
Postcode: <input type="text" id="business_address_postcode" name=""><br>
City: <input type="text" id="business_address_city" name=""><br>
Country: <input type="text" id="business_address_country" name=""><br>

<table border="1"><tbody><tr><td valign="middle"><h4>Private address</h4></td><td>&nbsp;</td><td valign="top"><span title="Define here, who can see this entry?">Privacy:</span> <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select></td></tr></tbody></table>

Address line: <input type="text" id="private_address_street_n_house" name=""><br>
Additional line: <input type="text" id="private_address_additional_line" name=""><br>
Postcode: <input type="text" id="private_address_postcode" name=""><br>
City: <input type="text" id="private_address_city" name=""><br>
Country: <input type="text" id="private_address_country" name=""><br>

<table border="1"><tbody><tr><td valign="middle"><h4>Other address</h4></td><td>&nbsp;</td><td valign="top"><span title="Define here, who can see this entry?">Privacy:</span> <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select></td></tr></tbody></table>

Address line: <input type="text" id="other_address_street_n_house" name=""><br>
Additional line: <input type="text" id="other_address_additional_line" name=""><br>
Postcode: <input type="text" id="other_address_postcode" name=""><br>
City: <input type="text" id="other_address_city" name=""><br>
Country: <input type="text" id="other_address_country" name=""><br>

</div>
<br>

<table border="1"><tbody><tr><td valign="middle"><h4>Website(s)</h4></td><td>&nbsp;</td><td valign="top"><span title="Define here, who can see this entry?">Privacy:</span> <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select></td></tr></tbody></table>

<select><option>Mobile</option><option>Business</option><option>Private</option><option>Family</option><option>Other</option></select> <select><option>website</option><option>blog</option></select> <u id="add_website_click">Add</u>

<br><br>
<div id="websites_div">
Mobile website: <input type="website" id="mobile_website" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Business website: <input type="website" id="business_website" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Private website: <input type="website" id="private_website" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Family website: <input type="website" id="family_website" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Other website: <input type="website" id="other_website" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Mobile blog: <input type="website" id="mobile_blog" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Business blog: <input type="website" id="business_blog" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Private blog: <input type="website" id="private_blog" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Family blog: <input type="website" id="family_blog" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Other blog: <input type="website" id="other_blog" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
</div>

<br><br>

<table border=1 ><tr><td><h4>Social network accounts</h4></td><td>&nbsp;</td><td><span title="Define here, who can see this section">Privacy:</span><select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select></td></tr></table>
<br>

<select>
<option>Facebook</option>
<option>VK</option>
<option>Weibo</option>
<option>Linkedin</option>
<option>Xing</option>
<option>Google Plus</option>
<option>Instagram</option>
<option>Twitter</option>
<option>Tumblr</option>
<option>Pinterest</option>
<option>Snapchat</option>
<option>Other</option>
</select> <u id="add_social_n_business_networks_click">Add</u>
<br><br>
<div id="social_networks_div">
Facebook: <input type="website" id="facebook" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
VK: <input type="website" title="" id="vk" name="vk">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Twitter:<input type="website" id="twitter" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Tumblr: <input type="website" id="tumblr" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Pinterest: <input type="website" id="pinterest" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Google Plus: <input type="website" id="google_plus" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Weibo: <input type="website" id="weibo" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Instagram: <input type="website" id="instagram" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Linkedin: <input type="website" id="linkedin" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Xing: <input type="website" id="xing" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br>
Other: <input type="website" id="other_social_network" name="">  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
</div>
</td>
<td width=4%></td>
<td width=48% valign=top>
Notes: <textarea id="notes" name=""></textarea>  <span title="Define here, who can see this entry?">Privacy:</span>  <select><option>Everyone (Public)</option><option>Only selected contacts</option><option>Only me (Private)</option></select>
<br> 
</form>

</td>
</tr>
</table>


<script>

var web_id; //wird automatically generated
var first_name;
var last_name;
var father_name;
var nickname;
var email_business;
var email_private;
var email_other;
var private_mobile_phone;
var telephone_business;
var telephone_private;
var telephone_other;
var date_of_birth;
var business_address_street_n_house;
var business_address_additional_line;
var business_address_postcode;
var business_address_city;
var business_address_country;
var private_address_street_n_house;
var private_address_additional_line;
var private_address_postcode;
var private_address_city;
var private_address_country;
var other_address_street_n_house;
var other_address_additional_line;
var other_address_postcode;
var other_address_city;
var other_address_country;
var mobile_website;
var business_website;
var private_website;
var family_website;
var other_website;
var mobile_blog;
var business_blog;
var private_blog;
var family_blog;
var other_blog;
var facebook;
var vk;
var twitter;
var tumblr;
var pinterest;
var google_plus;
var weibo;
var instagram;
var linkedin;
var xing;
var other_social_network;
var message_history;  //will be gotten by function
var ip_address; //will be gotten by function
var notes;
var admin_notes;


var contacts = '{ "web_id": web_id, "first_name": first_name, "last_name": last_name, "father_name": father_name, "nickname": nickname, "email": [' + 
'{ "business": email_business },' + '{ "private": email_private },' + '{ "other": email_other }], "telephone": [' + 
'{ "mobile": mobile_phone },' + '{ "business": telephone_business },' + '{ "private": telephone_private },' + '{ "other": telephone_other }], "date_of_birth": date_of_birth, "address": [' + 
'{ "business": [' + 
'{ "street_n_house": business_address_street_n_house },' + '{ "additional_line": business_address_additional_line },' +'{ "postcode": business_address_postcode },' + '{ "city": business_address_city },' +  '{ "country": business_address_country }], { "private": [' + '{ "street_n_house": private_address_street_n_house },' + '{ "additional_line": private_address_additional_line },' +'{ "postcode": private_address_postcode },' + '{ "city": private_address_city },' +  '{ "country": private_address_country }], { "other": [' + ' { "street_n_house": other_address_street_n_house },' + '{ "additional_line": other_address_additional_line },' +'{ "postcode": other_address_postcode },' + '{ "city": other_address_city },' +  '{ "country": other_address_country }],  "website": [' + 
'{ "mobile": mobile_website },' + '{ "business": business_website },' + '{ "private": private_website },' + '{ "family": family_website },' + '{ "other": other_website }], "blog": [' + 
'{ "mobile": mobile_blog },' + '{ "business": business_blog },' + '{ "private": private_blog },' + '{ "family": family_blog },' + '{ "other": other_blog }], "social_networks": [' + 
'{ "tumblr": tumblr },' + '{ "twitter": twitter },' + '{ "facebook": facebook },' + '{ "google_plus": google_plus },' + '{ "weibo": weibo },' + '{ "vk": vk },' + '{ "instagram": instagram },' + '{ "pinterest": pinterest },' + '{ "linkedin": linkedin },' + '{ "xing": xing },' + '{ "other": other_social_network }], "last_contacted": date_last_contacted, "message_history": message_history, "ip_address": ip_address, "notes": notes, "admin_notes": admin_notes }';



$(function(){

$('#phones').hide();
$('#emails').hide();
$('#social_networks_div').hide();
$('#websites_div').hide();
$('#addresses_div').hide();


var var1 = $('#phone_select1').val();
var var2 = $('#phone_select2').val();


if ($var1==="private" && $var2==="mobile_phone"){

}
else if ($var1==="private" && $var2==="mobile_phone") {

}
else {

}
if ($var1==="business" && $var2==="mobile_phone"){

}
else if ($var1==="business" && $var2==="mobile_phone") {

}
else {

}
if ($var1==="business" && $var2==="mobile_phone"){

}
else if ($var1==="business" && $var2==="mobile_phone") {

}
else {

}

$('#add_phone_click').click (function() {

});
});

</script>

</body>
</html>
