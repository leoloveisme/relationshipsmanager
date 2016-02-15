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

<form id="" name="">
<input name="" id="web_id" type="hidden" value="NULL"></input><br>
First name: <input name="" id="first_name" type="text"></input><br>
Last name: <input name="" id="last_name" type="text"></input><br>
Father's name: <input name="" id="father_name" type="text" title="In some countries it's important" placeholder="In some countries it's important"></input><br>

<br>

Nickname: <input name="" id="nickname" type="text" placeholder="Real nickname in real life :)" title="Just in case he or she had one"></input><br>

<br>

Date of birth: <input name="" id="date_of_birth" type="date"></input><br>

<h4>Email(s)</h4>

Business email: <input name="" id="email_business" type="email"></input><br>
Private email: <input name="" id="email_private" type="email"></input><br>
Other email: <input name="" id="email_other" type="email"></input><br>

<h4>Phone(s)</h4>

Private mobile phone: <input name="" id="private_mobile_phone" type="telephone"></input><br>
Private landline phone: <input name="" id="telephone_private" type="telephone"></input><br>
Business landline phone: <input name="" id="business_landline_phone" type="telephone"></input><br>
Business mobile phone: <input name="" id="telephone_business_mobile" type="telephone"></input><br>
Other phone: <input name="" id="telephone_other" type="telephone"></input><br>

<h4>Business address</h4>

Address line: <input name="" id="business_address_street_n_house" type="text"></input><br>
Additional line: <input name="" id="business_address_additional_line" type="text"></input><br>
Postcode: <input name="" id="business_address_postcode" type="text"></input><br>
City: <input name="" id="business_address_city" type="text"></input><br>
Country: <input name="" id="business_address_country" type="text"></input><br>

<h4>Private address</h4>

Address line: <input name="" id="private_address_street_n_house" type="text"></input><br>
Additional line: <input name="" id="private_address_additional_line" type="text"></input><br>
Postcode: <input name="" id="private_address_postcode" type="text"></input><br>
City: <input name="" id="private_address_city" type="text"></input><br>
Country: <input name="" id="private_address_country" type="text"></input><br>

<h4>Other address</h4>

Address line: <input name="" id="other_address_street_n_house" type="text"></input><br>
Additional line: <input name="" id="other_address_additional_line" type="text"></input><br>
Postcode: <input name="" id="other_address_postcode" type="text"></input><br>
City: <input name="" id="other_address_city" type="text"></input><br>
Country: <input name="" id="other_address_country" type="text"></input><br>

<h4>Website and social network accounts</h4>

Mobile website: <input name="" id="mobile_website" type="website"></input><br>
Business website: <input name="" id="business_website" type="website"></input><br>
Private website: <input name="" id="private_website" type="website"></input><br>
Family website: <input name="" id="family_website" type="website"></input><br>
Other website: <input name="" id="other_website" type="website"></input><br>
Mobile blog: <input name="" id="mobile_blog" type="website"></input><br>
Business blog: <input name="" id="business_blog" type="website"></input><br>
Private blog: <input name="" id="private_blog" type="website"></input><br>
Family blog: <input name="" id="family_blog" type="website"></input><br>
Other blog: <input name="" id="other_blog" type="website"></input><br>
Facebook: <input name="" id="facebook" type="website"></input><br>
VK: <input name="vk" id="vk" type="website" title=""></input><br>
Twitter:<input name="" id="twitter" type="website"></input><br>
Tumblr: <input name="" id="tumblr" type="website"></input><br>
Pinterest: <input name="" id="pinterest" type="website"></input><br>
Google Plus: <input name="" id="google_plus" type="website"></input><br>
Weibo: <input name="" id="weibo" type="website"></input><br>
Instagram: <input name="" id="instagram" type="website"></input><br>
Linkedin: <input name="" id="linkedin" type="website"></input><br>
Xing: <input name="" id="xing" type="website"></input><br>
Other: <input name="" id="other_social_network" type="website"></input><br>
Notes: <textarea name="" id="notes"></textarea><br> 
</form>

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

};

</script>

</body>
</html>
