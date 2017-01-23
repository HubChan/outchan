<?php 
// --Config Start--
define('BOARD_TEXTMODE', true); //false - борда с картинками, true - текстовая борда
define('BOARD_BLOGMODE', true); //false - все могут создавать треды, true - только админ может создавать треды.
define('BOARD_PAGETITLE', 'Оверчан'); // Название борды
define('BOARD_ADMINPASS',  "616161"); // Пароль админ-панели
define('BOARD_MODPASS',    ""); // Оставьте пустым, чтобы отключить
define('BOARD_THREADSPERPAGE', 10);
define('BOARD_REPLIESTOSHOW',  1);
define('BOARD_MAXTHREADS',     0);    // 0 отключает удаление старых тредов
define('BOARD_DELETE_TIMEOUT', 666);  // секунд для удаления своих постов
define('BOARD_MAXPOSTSIZE',    12000); // Characters
define('BOARD_RATELIMIT',      30);   // Delay between posts from same IP
define('BOARD_TRIPSEED',   "securetrips");
define('BOARD_USECAPTCHA',   false);
define('BOARD_CAPTCHASALT',  'captchasalt');
define('BOARD_THUMBWIDTH',  200);
define('BOARD_THUMBHEIGHT', 300);
define('BOARD_REPLYWIDTH',  200);
define('BOARD_REPLYHEIGHT', 300);
define('BOARD_TIMEZONE',   ''); // Leave blank to use server default timezone
define('BOARD_DATEFORMAT', 'D Y-m-d g:ia');
define('BOARD_DBPOSTS','posts');
define('BOARD_DBBANS', 'bans');
define('BOARD_DBLOCKS','locked_threads');
define('BOARD_DBPATH', 'datas/ower.db');
// --Config End--
error_reporting(E_ALL);
session_start();if (!file_exists('img')){mkdir('img', 0777, true);}
function pageHeader() {
        $page_title = BOARD_PAGETITLE;
        $return = <<<EOF
<!DOCTYPE html>
<html>
        <head>
<title>$page_title</title>   

<link rel="SHORTCUT ICON" href="/favicon.svg" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.svg" />

<!--Cтили-->
<link type="text/css" rel="stylesheet" id="theme" href="css/theme1.css" />


<style>
html, body {
    color: #37474F;
    font-family: 'Noto Sans', sans-serif;
    line-height: 1.5;
    font-size: 12px;
    position: relative;
    -webkit-font-smoothing: subpixel-antialiased;
    -moz-osx-font-smoothing: auto;}

.adminbar{text-align:right;clear:both;float:right;}
blockquote blockquote{margin-left:0;}
#postarea table{text-align:left;margin:0 auto;}
.replylink{float:right;}
.thumb{border:none;float:left;margin:2px 20px;}
.nothumb{float:left;background:#fff;border:2px solid #aaa;text-align:center;margin:2px 20px;padding:1em .5em;}
.doubledash{vertical-align:top;clear:both;float:left;}
.moderator{color:red;}
.managebutton{font-size:15px;height:28px;margin:.2em;}
.footer{clear:both;text-align:center;font-size:12px;font-family:Roboto;}
.rules ul{padding-left:0;margin:0;}
.floatpost{float:right;clear:both;}

.replymode{background:#fff;text-align:center;color:#000;width:100%;padding:2px;}
.rules{width:300px;text-align:justify;font-size:6px;}
.postblock{text-align:right;color:#000;font-weight:800;font-size:11px;}
.row1{background:#fff;color:maroon;}
.row2{background:#fff;color:maroon;}
.unkfunc{background:inherit;color:#789922;}
.filesize{text-decoration:none;}
.filetitle{background:inherit;font-size:1.2em;color:#000;font-weight:800;}

.omittedposts{color:#707070;font-style:Roboto;}

.replyhl{background:#fff;color:maroon;}
.replytitle{font-size:1.2em;color:#CC1105;font-weight:800;}
.commentpostername{color:#000;font-weight:800;}
.thumbnailmsg{font-size:small;color:maroon;}
.abbrev{color:#707070;}
.highlight{background:#fff;color:maroon;border:2px solid #EA8;}
form,.reply blockquote,blockquote :last-child{margin-bottom:0;}
#postarea,.login{text-align:center;}

.spoiler3{color:#fff;background-color:#fff;border-radius: 4px;}
.spoiler3:hover{color:#000;background-color:transparent;transition: 1s;}
.spoiler3:not(:hover) {transition: 3s;}
/* спойлер2 */
.spoiler > input + label:after{content: "+";float: right;font-family: monospace;font-weight: bold;}
.spoiler > input:checked + label:after{content: "-";float: right;font-family: monospace;font-weight: bold;}
.spoiler > input{display:none;}
.spoiler > input + label + .spoiler_body{display:none;}
.spoiler > input:checked + label + .spoiler_body{display: block;}

.kapcha
	{
	color: #fff;
	text-align: center;
	width: 180px;
	background-position: left top;
	display: inline-block;
	cursor: pointer;
	border-radius: 3px;
	border: 1px solid #fff;
	}
.leftimg {
    float:left;
    margin: 7px 7px 7px 0;
/* скругление углов */
-webkit-border-radius: 6px;
-moz-border-radius: 6px;
-ms-border-radius: 6px;
border-radius: 6px;
   }
   
.audiobot {
float:left;
margin: 7px 7px 7px 0;
background-color : #fff;
/* скругление углов */
-webkit-border-radius: 6px;
-moz-border-radius: 6px;
-ms-border-radius: 6px;
border-radius: 6px;
   }
   
/* Скрытие */
.config{
    display: none;
}
/* Обтекание картинок */
.leftimg {
    float:left;
    margin: 7px 7px 7px 0;
/* скругление углов */
-webkit-border-radius: 6px;
-moz-border-radius: 6px;
-ms-border-radius: 6px;
border-radius: 6px;
   }
::-webkit-scrollbar{
    width:10px;
}

::-webkit-scrollbar-thumb{
    border-width:1px 1px 1px 2px;
    border-color: #777;
    background-color: #aaa;
}

::-webkit-scrollbar-thumb:hover{
    border-width: 1px 1px 1px 2px;
    border-color: #555;
    background-color: #777;
}

::-webkit-scrollbar-track{
    border-width:0;
}

::-webkit-scrollbar-track:hover{
    border-left: solid 1px #aaa;
    background-color: #eee;
}
::-webkit-scrollbar-track-piece{
    background-color: transparent;
}

.input {
	padding: 6px 10px;
	display: inline-block;
	outline: none;
	-webkit-transition: border .3s, background .3s, color .3s;
	transition: border .3s, background .3s, color .3s;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	-o-border-radius: 4px;
	border-radius: 4px;
	font-size: 12px;
}

.btn {
	padding: 6px 10px;
	display: inline-block;
	outline: none;
	text-align: center;
	text-decoration: none;
	cursor: pointer;
	-webkit-transition: border .3s, background .3s, color .3s;
	transition: border .3s, background .3s, color .3s;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	-o-border-radius: 4px;
	border-radius: 4px;
	font-size: 12px;
}



.board-add {
	width: 500px;
	margin: 10px auto;
	border-radius: 5px;
	padding: 0 5px;

}
.board-add #attach {width: 478px; word-wrap: normal;}
.board-add #attachname {width: 393px;}

.topbutton {
text-align:center;
padding:10px;
position:fixed;
bottom:50px;
right:50px;
cursor:pointer;
color:#333;
font-size:50px;
}
</style>

<script type="text/javascript">var stsw = {};

stsw.Billion = 2 * 1000 * 1000 * 1000;

stsw.getCookie = function(name) {
    var matches = document.cookie.match(
        new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
    return matches ? decodeURIComponent(matches[1]) : undefined;
};

stsw.setCookie = function(name, value, options) {
    options = options || {};
    var expires = options.expires;
    if (typeof expires == "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires * 1000);
        expires = options.expires = d;
    }
    if (expires && expires.toUTCString)
        options.expires = expires.toUTCString();
    value = encodeURIComponent(value);
    var updatedCookie = name + "=" + value;
    for (var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true)
            updatedCookie += "=" + propValue;
    }
    document.cookie = updatedCookie;
};

stsw.options = {
    "prefix": "css",
    "default": "theme1",
    "count": 6
};

stsw.style = document.getElementById("theme");

stsw.current = stsw.getCookie("stsw_theme") || stsw.options.default;

stsw.style.href = stsw.options.prefix + "/" + stsw.current + ".css";

stsw.initOnLoad = function() {
    for (var i = 1; i <= stsw.options.count; ++i) {
        var theme = "theme" + i;
        var a = document.getElementById(theme);
        a.onmouseover = (function(theme) {
            stsw.style.href = stsw.options.prefix + "/" + theme + ".css";
        }).bind(stsw, theme);
        a.onmouseout = function() {
            stsw.style.href = stsw.options.prefix + "/" + stsw.current + ".css";
        };
        a.onclick = (function(theme) {
            stsw.style.href = stsw.options.prefix + "/" + theme + ".css";
            stsw.current = theme;
            stsw.setCookie("stsw_theme", theme, {
                "expires": stsw,
                "path": "/"
            });
        }).bind(stsw, theme);
    }
};</script>
	

<script>function insertTag(e,t){var n=document.getElementsByName("message")[0];var r=n.selectionStart;var i=n.selectionEnd;var s=n.value.length;var o=e+n.value.substring(r,i)+t;n.value=n.value.substring(0,r)+o+n.value.substring(i,s)}function quote(e){var t=document.forms.postform.message;e=">>"+e;if(t){if(t.createTextRange&&t.caretPos){var n=t.caretPos;n.text=n.text.charAt(n.text.length-1)==" "?e+" ":e}else if(t.setSelectionRange){var r=t.selectionStart;var i=t.selectionEnd;t.value=t.value.substr(0,r)+e+t.value.substr(i);t.setSelectionRange(r+e.length,r+e.length)}else{t.value+=e+" "}}}</script>
<script type="text/javascript">
$(document).ready(function() {
	stsw.initOnLoad();
});
</script>

<script>		
$(function() {
  if(!localStorage.getItem('width')) {
    $('#width').attr('href', 'css/width1.css');
  } else {
     $('#width').attr('href', 'css/width' + localStorage.getItem('width') + '.css');
  };
});

function apochangeme(a) {
  if(a == 1) {
    $('#width').attr('href', 'css/width1.css');
    localStorage.removeItem('width');
  } else {
    $('#width').attr('href', 'css/width' + a + '.css');
    localStorage.setItem('width', a);
  };
};
</script>
 
 <!--CНЕЕЕЕЕГ-->
<SCRIPT type="text/javascript">
// Количество снежинок на странице (Ставьте в границах 30-40, больше не рекомендую)
var snowmax=35;
 
// Установите цвет снега, добавьте столько цветов сколько пожелаете
var snowcolor=new Array("#AAAACC","#DDDDFF","#CCCCDD","#F3F3F3","#F0FFFF","#FFFFFF","#EFF5FF")
 
// Поставьте шрифты из которых будет создана снежинка ставьте столько шрифтом сколько хотите
var snowtype=new Array("Arial Black","Arial Narrow","Times","Comic Sans MS");
 
// Символ из какого будут сделаны снежинки (по умолчанию * )
var snowletter="*";
 
// Скорость падения снега (рекомендую в границах от 0.3 до 2)
var sinkspeed=0.6; 
 
// Максимальный размер снежинки
var snowmaxsize=22;
 
// Установите минимальный размер снежинки
var snowminsize=8;
 
// Устанавливаем положение снега
// Впишите 1 чтобы снег был по всему сайту, 2 только слева 
// 3 только по центру, 4 снег справа
var snowingzone=1;

// НИЧЕГО НЕ ИЗМЕНЯТЬ
var snow=new Array();
var marginbottom;
var marginright;
var timer;
var i_snow=0;
var x_mv=new Array();
var crds=new Array();
var lftrght=new Array();
var browserinfos=navigator.userAgent;
var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/);
var ns6=document.getElementById&&!document.all;
var opera=browserinfos.match(/Opera/);
var browserok=ie5||ns6||opera;
function randommaker(range) {
	rand=Math.floor(range*Math.random());
	return rand;
}
function initsnow() {
	if (ie5 || opera) {
		marginbottom=document.body.clientHeight;
		marginright=document.body.clientWidth;
	}
	else if (ns6) {
		marginbottom=window.innerHeight;
		marginright=window.innerWidth;
	}
	var snowsizerange=snowmaxsize-snowminsize;
	for (i=0;i<=snowmax;i++) {
		crds[i]=0;
		lftrght[i]=Math.random()*15;
		x_mv[i]=0.03+Math.random()/10;
		snow[i]=document.getElementById("s"+i);
		snow[i].style.fontFamily=snowtype[randommaker(snowtype/length)];
		snow[i].size=randommaker(snowsizerange)+snowminsize;
		snow[i].style.fontSize=snow[i].size+"px";
		snow[i].style.color=snowcolor[randommaker(snowcolor.length)];
		snow[i].sink=sinkspeed*snow[i].size/5;
		if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
		if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
		if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
		if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
		snow[i].posy=randommaker(2*marginbottom-marginbottom-2*snow[i].size);
		snow[i].style.left=snow[i].posx+"px";
		snow[i].style.top=snow[i].posy+"px";
	}
	movesnow();
}
function movesnow() {
	for(i=0;i<=snowmax;i++) {
		crds[i]+=x_mv[i];
		snow[i].posy+=snow[i].sink;
		snow[i].style.left=snow[i].posx+lftrght[i]*Math.sin(crds[i])+"px";
		snow[i].style.top=snow[i].posy+"px";
		if (snow[i].posy>=marginbottom-2*snow[i].size || parseInt(snow[i].style.left)>(marginright-3*lftrght[i])) {
			if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
			if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
			if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
			if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
			snow[i].posy=0;
		}
	}
	var timer=setTimeout("movesnow()",50);
}
for (i=0;i<=snowmax;i++) {
	document.write("<span id='s"+i+"' style='position:absolute;top:-"+snowmaxsize+"px;'>"+snowletter+"</span>");
}
if (browserok) {
	window.onload=initsnow;
}
</SCRIPT>
<!--конец CНЕЕЕЕЕГа-->
 
</head>
<body>
EOF;
        return $return;
}
function pageFooter() {
        return <<<EOF
		</div>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<a href="#" title="Вернуться к началу" class="topbutton">^</a>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<div class="config">	
<link id="width" rel="stylesheet" src=""/>
<a href="#" onclick="apochangeme2(1); return false;" id="width1" class="width">Посты по центру</a> 
<a href="#" onclick="apochangeme2(2); return false;" id="width2" class="width">Растянуть посты</a>
</div>
</body>
</html>
EOF;
}
function buildPost($post, $isrespage) {
$post = preg_replace("#\*\*(.*?)\*\*#","<b>\\1</b>",$post);
    $post = preg_replace("#\[s\](.*?)\[/s\]#","<strike>\\1</strike>",$post);
    $post = preg_replace("#\*(.*?)\*#","<i>\\1</i>",$post);
    $post = preg_replace("#\[u\](.*?)\[/u\]#","<span style=\"border-bottom: 1px solid\">\\1</span>",$post);
    $post = preg_replace("#\%\%(.*?)\%\%#","<span class=\"spoiler3\">\\1</span>",$post);
	$post = preg_replace("~(ftp|ftps)://(.*?)(\s|\n|[,.?!](\s|\n)|$)~", '<a href="$1://$2" target="_blank">$1://$2</a>$3',$post);
	$post = preg_replace( "#\[quote\](.+?)\[/quote\]#is", "<span class=\"quote\">\\1</span>", $post );
	$post = preg_replace( "#\[b\](.+?)\[/b\]#is", "<b>\\1</b>", $post);
	$post = preg_replace( "#\[i\](.+?)\[/i\]#is", "<i>\\1</i>", $post);
	$post = preg_replace( "#\[u\](.+?)\[/u\]#is", "<ins>\\1</ins>", $post);
	$post = preg_replace("#\-\-(.*?)\-\-#","<del>\\1</del>",$post);
	$post = preg_replace( "#\[s\](.+?)\[/s\]#is", "<del>\\1</del>", $post);
	$post = preg_replace("#\_\_(.*?)\_\_#","<ins>\\1</ins>",$post);
	$post = preg_replace( "#\[spoiler\](.+?)\[/spoiler\]#is", "<span class=\"spoiler3\">\\1</span>", $post);
	$post = preg_replace("#((&lt;iframe)(.+?)(vk.com)(.+?)(oid=[\d\w-]+)(.+?)(id=[0-9]+)(.+?)(hash=[\d\w]+)(.+?)(&lt;/iframe&gt;))#is", "<span class=\"btn btn-default\"><img src=\"http://xgm.guru/files/649/173346/vkvideo.png\" alt=\"\" onclick=\"this.parentNode.innerHTML=' <iframe src=\'http://vk.com/video_ext.php?$6&amp;$8&amp;$10\' width=\'607\' height=\'360\' frameborder=\'0\'></iframe> ';\"></span>",$post);
	$post = preg_replace("#\[coub\](.+?)\[/coub\]#is", "<span class=\"btn btn-default\"><img src=\"http://xgm.guru/files/649/173346/coubvideo.png\" alt=\"\" onclick=\"this.parentNode.innerHTML=' <iframe src=\'\\1\' width=\'607\' height=\'360\' frameborder=\'0\'></iframe> ';\"></span>",$post);   
    $post = preg_replace("/\[youtube\](.*)youtube.com(.*)watch\?v\=(.*)\&?\[\/youtube\]/i", "<span class=\"btn btn-default\"><img src=\"http://xgm.guru/files/649/173346/youtubevideo.png\" alt=\"\" onclick=\"this.parentNode.innerHTML='<iframe src=\'http://www.youtube.com/embed/\\3\' width=\'607\' height=\'360\' frameborder=\'0\'></iframe> ';\"></span>", $post);
	$post = preg_replace("/(сука|шалава|блядь|проститутка|девушка|женщина)/si","тян",$post);
	$post = preg_replace("/(украинец|бандера|хохол|бандеровец)/si","рoссиянин",$post);
	$post = preg_replace("/(русский|россиянин)/si","хoхол",$post);
	$post = preg_replace("/(двач|Двач)/si","Сосач",$post);
	$post = preg_replace("/(лол|Лол)/si","(смех)",$post);
	$post = preg_replace("/(говно|понос|говнище|калл|кал|сру|ссу|политика|политота|оллчан|олчан|аллчан|allchan)/si","💩",$post);
	$post = preg_replace("#\[spoiler2\](.+?)\[/spoiler2\]#is",'<div class="spoiler">
<input type="checkbox" id="spoilerid_1"><label for="spoilerid_1">Спойлер</label><div class="spoiler_body">\\1</div></div>',$post);
	$post = preg_replace( "#\[code\](.+?)\[/code\]#is", "<code><div class=\"instructions\">\\1</div></code>", $post);

	$post = preg_replace( "#\[url\](.+?)\[/url\]#is", '<a href="\\1" target="_blank">\\1</a><img src="https://www.google.com/s2/favicons?domain=\\1" width="16" />', $post);
	$post = preg_replace( "#\[url=(.+?)\](.+?)\[\/url\]#is", '<a href="\\2" title="\\2" target="_blank">\\1</a><img src="https://www.google.com/s2/favicons?domain=\\1" width="16" />', $post);

	$post = preg_replace( "#\[color=(.+?)\](.+?)\[\/color\]#is", '<span style="color:\\1">\\2</span>', $post);
	$post = preg_replace( "#\[size=(.+?)\](.+?)\[\/size\]#is", '<span style="font-size:\\1%">\\2</span>', $post);
	
	$post = preg_replace( "#\[audiobot\](.+?)\[/audiobot\]#is", '<div class="audiobot">Анон говорит:<br>https://tts.voicetech.yandex.net/tts?text=\\1.&amp;lang=ru_RU&amp;format=mp3</div>', $post);
	
	$post = str_replace(':)',"<div class=\"smile1\" width=\"20\" height=\"20\">😊</div>",$post);
	$post = str_replace(':(',"<div class=\"smile2\" width=\"20\" height=\"20\">😩</div>",$post);
	$post = str_replace(';)',"<div class=\"smile3\" width=\"20\" height=\"20\">😉</div>",$post);
	$post = str_replace(':о',"<div class=\"smile4\" width=\"20\" height=\"20\">😱</div>",$post);
	$post = str_replace(':D',"<div class=\"smile5\" width=\"20\" height=\"20\">😀</div>",$post);
	$post = str_replace(':|',"<div class=\"smile6\" width=\"20\" height=\"20\">😐</div>",$post);
	$post = str_replace(':ь',"<div class=\"smile7\" width=\"20\" height=\"20\">😛</div>",$post);
	$post = str_replace(':х',"<div class=\"smile8\" width=\"20\" height=\"20\">🤢</div>",$post);
	$post = str_replace('D:<',"<div class=\"smile9\" width=\"20\" height=\"20\">😠</div>",$post);
	$post = str_replace(';`(',"<div class=\"smile10\" width=\"20\" height=\"20\">😭</div>",$post);
		
	$post = str_replace('ъp1','<img src="img/favicon1.webp" width="16" title="Колчок">',$post);
	$post = str_replace('ъp2','<img src="img/favicon2.webp" width="16" title="Нульчер">',$post);
	$post = str_replace('ъp3','<img src="img/favicon3.webp" width="16" title="Сосачер">',$post);
	$post = str_replace('ъp4','<img src="img/favicon4.webp" width="16" title="Бананер">',$post);
	$post = str_replace('ъp5','<img src="img/favicon5.webp" width="16" title="Луркоёб">',$post);
	$post = str_replace('ъp6','<img src="img/favicon6.webp" width="16" title="Сырна">',$post);
	$post = str_replace('ъp7','<img src="img/favicon7.webp" width="16" title="Тумба">',$post);
	$post = str_replace('ъp8','<img src="img/favicon8.webp" width="16" title="Олдфаг">',$post);
	$post = str_replace('ъp9','<img src="img/favicon9.webp" width="16" title="Вконтактодебил">',$post);
	$post = str_replace('ъp-10','<img src="img/favicon10.webp" width="16" title="Питард">',$post);
	$post = str_replace('ъp-11','<img src="img/favicon11.webp" width="16" title="Шизик">',$post);
	$post = str_replace('ъp-12','<img src="img/favicon12.webp" width="16" title="Экзачер">',$post);
	$post = str_replace('ъp0','',$post);
	
$post = preg_replace("~(http|https)\:\/\/(.*?)?(\w+.(jpg|jpeg|png|gif|webp))~", 
'<a target="_blank" href="https://$2$3"><img class="leftimg" src="https://$2$3" width="256"></a>
<br><a target="_blank" href="https://www.google.com/searchbyimage?image_url=https://$2$3">Найти в гугле</a>
<br><a target="_blank" href="https://saucenao.com/search.php?url=https://$2$3">Найти в saucenao</a>
<br><a target="_blank" href="https://tineye.com/search/?url=https://$2$3">Найти в tineye</a>
<br><a target="_blank" href="http://iqdb.org/?url=https://$2$3">Найти в iqdb</a>
<br><a target="_blank" href="https://whatanime.ga/?url=https://$2$3">Найти в whatanime</a>
',$post);

$post = preg_replace( "~(http|https)\:\/\/(.*?)?(\w+.(mpeg|webm|mp4))~", '<div class="audiobot"><video loop="loop" width="360" title="https://$2$3" controls><source src="https://$2$3" type=\'video/webm; codecs="vp9, vorbis"\'></video></div>', $post);
$post = preg_replace( "~(http|https)\:\/\/(.*?)?(\w+.(mp3|ogg))~", '<div class="audiobot"><audio controls><source src="https://$2$3" type="audio/mpeg" codecs="vorbis"></audio><a download href="https://$2$3" title="Скачать">📥</a></div>', $post);
$post = preg_replace("~(http|https)\:\/\/(.*?)?(\w+.(html|php))~", '<a href="https://$2$3" target="_blank">https://$2$3</a>',$post);
	
	
  	    $return = "";
        $threadid = ($post['parent'] == 0) ? $post['id'] : $post['parent'];
        $postlink = '?do=thread&id='.$threadid.'#'.$post['id'];
        $image_desc = '';
        if ($post['file'] != '') {
                $image_desc =
                        cleanString($post['file_original']) .' ('.$post["image_width"].'x'.
                        $post["image_height"].', '.$post["file_size_formatted"].')'
                ;
        }
        if ($post['parent'] == 0 && !$isrespage) {
                $note = isLocked($threadid) ? '<em>🔒</em>' : ''; //&#x1f512;
                $return .=
                        "<span class=\"replylink\">${note}&nbsp;<a href=\"?do=thread&id=${post["id"]}\">".
                        "Открыть тред</a>&nbsp;</span>"
                ;
        }
         if ($post["parent"] != 0) {
                $return .= <<<EOF
<table>
        <tbody>
                <tr>
                        <td class="doubledash">&gt;&gt;</td>
                        <td class="reply" id="reply${post["id"]}">
EOF;
        } elseif ($post["file"] != "") {
                $return .= <<<EOF

EOF;
        }
        $return .= <<<EOF
		
<a href="?do=delpost&id={$post['id']}" title="Удалить" />X</a> <a name="${post['id']}"></a>
EOF;
        if ($post["subject"] != "") {
                $return .= "    <span class=\"filetitle\">${post["subject"]}</span> ";
        }
        $return .= <<<EOF
${post["nameblock"]} 

EOF;
        if (IS_ADMIN) {
                $return .= ' [<a href="?do=manage&p=bans&bans='.urlencode($post['ip']).'" title="Бан постера">'.htmlspecialchars($post['ip']).'</a>]';
        }
        $return .= <<<EOF
<span class="reflink">
        <a href="$postlink">№</a><a href="javascript:quote('${post["id"]}')">${post['id']}</a>
</span>
EOF;
        if ($post['parent'] != 0 && $post["file"] != "") {
                $return .= <<<EOF
<br>


EOF;
        }
        $return .= <<<EOF
<blockquote>
<p class="leftimg">${post["file"]}</p>
{$post['message']}
</blockquote>
EOF;
        if ($post['parent'] == 0) {
                if (!$isrespage && $post["omitted"] > 0) {
                        $return .=
                                '<span class="omittedposts">'.$post['omitted'].' постов пропущено. '.
                                '<a href="?do=thread&id='.$post["id"].'">Нажмите сюда</a> для просмотра.</span>'
                        ;
                }
        } else {
                $return .= <<<EOF
                        </td>
                </tr>
        </tbody>
</table>
<br>
EOF;
        }
        return $return;
}		
function buildPostBlock($parent) {
        $body = '
<center>
<div class="board-add" id="postarea">
<form name="postform" id="postform" action="?do=post" method="post" enctype="multipart/form-data" data-ajax="true">
        ';
        $post_button_name = ($parent) ? 'Ответить в тред' : 'Создать тред';
        $opt_bump_thread = ($parent) ? '<label><input type="checkbox" name="bump" id="bump" checked>Bump</label>' : '';
        $opt_modpost = LOGGED_IN ? '<label><input type="checkbox" name="modpost" id="modpost">Модпост</label>' : '';
        $opt_rawhtml = LOGGED_IN ? '<label><input type="checkbox" name="rawhtml" id="rawhtml">RawHTML</label>' : '';
        $body .= '
		
	<input type="hidden" id="parent" name="parent" value="'.htmlspecialchars($parent).'">
<br>
<div class="form-group">
<input class="input" id="attach" type="text" name="name" size="60" maxlength="75" placeholder="Никнейм"> 
<textarea class="input" id="attach" name="message" cols="44" rows="6" placeholder="Сообщение поста"></textarea>
<input class="input" id="attach" type="text" name="file" size="75" placeholder="Ссылка на файл: jpeg, png, gif, webp, webm, mp3 и другие">
<br>
<br>
<input class="btn" id="attach" type="submit" value="'.$post_button_name.'" >
'.$opt_bump_thread.'
'.$opt_modpost.'
'.$opt_rawhtml.'
<select class="subj" form="postform" name="subject" title="Выбрать принадлежность к имиджборде">
<option value=\'ъp0\'>Нет</option>
<option value=\'ъp1\'>Колчок</option>
<option value=\'ъp2\'>Нульчер</option>
<option value=\'ъp3\'>Сосачер</option>
<option value=\'ъp4\'>Бананер</option>
<option value=\'ъp5\'>Луркоёб</option>
<option value=\'ъp8\'>Олдфаг</option>
<option value=\'ъp9\'>Вконтактодебил</option>
<option value=\'ъp-11\'>Шизик</option>
 </select>

</div>
</form>
</div>
</center>  
        ';
        return $body;
		}
		

function buildPage($htmlposts, $parent, $pages=0, $thispage=0) {
        $locked = $parent ? isLocked($parent) : false;
        $returnlink = ''; $pagelinks = '';
        if ($parent == 0) {
                $pages = max($pages, 0);
                $pagelinks =
                        ($thispage == 0) ?
                        " ◀️ " :
                        ' <a href="?do=page&p=' .($thispage-1). '">◀️</a> '
                ;              
                for ($i = 0;$i <= $pages;$i++) {
                        $pagelinks .= ($thispage == $i) ? " $i " : " <a href=\"?do=page&p=$i\">$i</a> ";
                }              
                $pagelinks .= ($pages <= $thispage) ?
                        " ▶️ " :
                        ' <a href="?do=page&p='.($thispage+1). '">▶️</a> '
                ;
        } else {
                $returnlink = '<span class="replylink"><a href="?"></a>';
                if (LOGGED_IN) {
                        if ($locked) {
                                $returnlink .= ' <a alt="Открыть тред" href="?do=lock&id='.$parent.'">🔓</a>';
                        } else {
                                $returnlink .= ' <a alt="Закрыть тред" href="?do=lock&id='.$parent.'">🔐</a>';                         
                        }
                }
                $returnlink .= '</span>';
        }
        $body = '
        <body onLoad="onFirstLoad();">';
		//шапка борды
$body = '
<br><br>';
        if ($locked) {
                $body .= '<div class="replymode">Этот тред закрыт <img title=\"Обсуждение закрыто\" src="img/lock.svg" width="16"></div>';
        }
        if ($parent) {
                $body .= $returnlink . "\n" . $htmlposts;
        }
        if (!$locked) {
                $body .= buildPostBlock($parent);
        }
        if (!$parent) {
                $body .= $returnlink . "\n" . $htmlposts;
        }
		//подвал борды
        $body .= <<<EOF
<div class="pagelinks"><center>$pagelinks</center></div>
	
<div class="config">	
<link id="smile" rel="stylesheet" src=""/><h1>Тема смайликов:</h1>
<br>
    <a href="#" onclick="apochangeme(1); return false;" id="smile1" class="theme">Default</a> 
	<br>
    <a href="#" onclick="apochangeme(2); return false;" id="smile2" class="theme">Набор Колобки</a>
	<br>
	<a href="#" onclick="apochangeme(3); return false;" id="smile3" class="theme">Набор FFFUUU Rage Face</a>
	<br>
	<a href="#" onclick="apochangeme(4); return false;" id="smile4" class="theme">Набор Sad Frog</a>
	<br>
	<a href="#" onclick="apochangeme(5); return false;" id="smile5" class="theme">Набор YOBA</a>
	<br>
<link id="mother" rel="stylesheet" src=""/><h1>Мамка в комнате:</h1>
<br>
    <a href="#" onclick="apochangeme2(1); return false;" id="mother1" class="mother">Отключить</a> 
	<br>
    <a href="#" onclick="apochangeme2(2); return false;" id="mother2" class="mother">Включить</a>
	<br>
</div>	
<br>
<br>
<br>			
EOF;
        return pageHeader() . $body . pageFooter();
		
}
function viewPage($pagenum) {
        $page = intval($pagenum);
        $pagecount = max(0, ceil(countThreads() / BOARD_THREADSPERPAGE) - 1);
        if (!is_numeric($pagenum) || $page < 0 || $page > $pagecount) fancyDie('Неправильный номер страницы');
        $htmlposts = array();
        $threads = getThreadRange(BOARD_THREADSPERPAGE, $pagenum * BOARD_THREADSPERPAGE );
        foreach ($threads as $thread) {
                $replies = latestRepliesInThreadByID($thread['id']);
                $htmlreplies = array();
                foreach ($replies as $reply) {
                        $htmlreplies[] = buildPost($reply, False);
                }
                $thread["omitted"] = (count($htmlreplies) == 3) ? (count(postsInThreadByID($thread['id'])) - 4) : 0;
                $htmlposts[] = buildPost($thread, false) . implode("", array_reverse($htmlreplies)) . "<br clear=\"left\">\n<hr>";
        }
        return buildPage(implode('', $htmlposts), 0, $pagecount, $page);
}
function viewThread($id) {
        $htmlposts = array();
        $posts = postsInThreadByID($id);
        foreach ($posts as $post) $htmlposts[] = buildPost($post, True);
        $htmlposts[] = "<br clear=\"left\">\n<hr>";
        return buildPage(implode('',$htmlposts), $id);
}
function adminBar() {
        if (! LOGGED_IN) { return ''; }
        $text = IS_ADMIN ? '<p class="input"><a class="btn" href="?do=manage&p=bans">Баны</a> ' : '';
        $text .=
                '<a class="btn" href="?do=manage&p=threads">Список тредов</a> '.
                '<a class="btn" href="?do=manage&p=moderate">Модерировать пост</a> '.
                '<a class="btn" href="?do=manage&p=logout">Выйти</a> '.
                '<a class="btn" href="?">Назад</a></p>'

        ;
        return $text;
}
function managePage($text) {
        $adminbar = adminBar();
        $body = <<<EOF
        <body>
                
                <div class="logo">
                </div>
				<div class="board-add" id="postarea">	
				$adminbar
				<br>
                <div class="input" id="attachname">Панель админа</div>
				<br>
                $text

EOF;
        return pageHeader() . $body . pageFooter();
}
function manageLogInForm() {
        return <<<EOF
        <form id="BOARD" name="BOARD" method="post" action="?do=manage&p=home">
    			
<div class="login">	
<br>			
<div class="form-group">		
<input class="input" type="password" id="password" name="password" placeholder="Введите код доступа"> 
<input class="btn" type="submit" value="Войти" >	</div>
<br>
					    </div>	
						</div>
						</div>

        </form>
		
		
        <br/>
EOF;
}
function manageBanForm() {
        $banstr = isset($_GET['bans']) ? $_GET['bans'] : '';
        return <<<EOF
        <form id="BOARD" name="BOARD" method="post" action="?do=manage&p=bans">
                <fieldset>
                        <legend>Бан IP адреса для постинга</legend>
                        <label for="ip">IP адрес:</label>
                        <input class="form-control" type="text" name="ip" id="ip" value="$banstr" autofocus>   
                        <br/>
                        <label for="expire">Истекает(sec):</label>
                        <input class="form-control" type="text" name="expire" id="expire" value="0">&nbsp;&nbsp;
                        <small>
                                <a href="#" onclick="document.BOARD.expire.value='3600';return false;">1час</a>&nbsp;
                                <a href="#" onclick="document.BOARD.expire.value='86400';return false;">1день</a>&nbsp;
                                <a href="#" onclick="document.BOARD.expire.value='172800';return false;">2дня</a>&nbsp;
                                <a href="#" onclick="document.BOARD.expire.value='604800';return false;">1неделя</a>&nbsp;
                                <a href="#" onclick="document.BOARD.expire.value='1209600';return false;">2недели</a>&nbsp;
                                <a href="#" onclick="document.BOARD.expire.value='2592000';return false;">30дней</a>&nbsp;
                                <a href="#" onclick="document.BOARD.expire.value='0';return false;">Никогда</a>
                        </small>
                        <br/>
                        <label for="reason">Причина:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input class="form-control" type="text" name="reason" id="reason" placeholder="(Необязательна)">&nbsp;&nbsp;<small></small>
                <center><input class="btn btn-default" type="submit" value="Пидорнуть" class="managebutton"></center>
				</fieldset>
        </form>
        <br/>
EOF;
}
function manageBansTable() {
        $text = '';
        $allbans = allBans();
        if (count($allbans) > 0) {
                $text .= '<table border="1"><tr><th>IP адрес</th><th>Бан действует с:</th><th>До:</th><th>Причина:</th><th>&nbsp;</th></tr>';
                foreach ($allbans as $ban) {
                        $expire = ($ban['expire'] > 0) ? date('y/m/d(D)H:i:s', $ban['expire']) : 'Never';
                        $reason = ($ban['reason'] == '') ? '&nbsp;' : htmlentities($ban['reason']);
                        $text .= '<tr><td>' . $ban['ip'] . '</td><td>' . date('y/m/d(D)H:i:s', $ban['timestamp']) . '</td><td>' . $expire . '</td><td>' . $reason . '</td><td><a href="?do=manage&p=bans&lift=' . $ban['id'] . '">Помиловать</a></td></tr>';
                }
                $text .= '</table>';
        }
        return $text;
}
function manageModeratePostForm() {
        return <<<EOF
        <form id="BOARD" name="BOARD" method="get" action="?">
                <input type="hidden" name="manage" value="">
                <fieldset>
                        <legend>Модерировать пост</legend>
                        <input type="hidden" name="do" value="manage">
                        <input type="hidden" name="p" value="moderate">
                        <label for="moderate">Post ID:</label>
						<div class="form-group">
						<div class="input-group">
                        <input type="text" class="form-control" name="moderate" id="moderate" autofocus>
						<div class="input-group-btn">
                       
						<button class="btn btn-default" type="submit">
									Открыть
								</button>
							</div>
						</div>
					</div>
                        <br/>
                </fieldset>
        </form>
        <br/>
EOF;
}
function manageModeratePost($post) {
        $ban = banByIP($post['ip']);
        $ban_disabled = (!$ban && IS_ADMIN) ? '' : ' disabled';
        $ban_disabled_info = (!$ban) ? '' : (' Бан уже существует ' . $post['ip']);
        $post_html = buildPost($post, true);
        $post_or_thread = ($post['parent'] == 0) ? 'тред' : 'пост';
        return <<<EOF
        <fieldset>
                <legend>Модерация поста №.${post['id']}</legend>              
                <div class="floatpost">
                        <fieldset>
                                <legend>$post_or_thread</legend>       
                                $post_html
                        </fieldset>
                </div>         
                <fieldset>
                        <legend>Действия</legend>                                
                        <form method="get" action="?">
                                <input type="hidden" name="do" value="manage" />
                                <input type="hidden" name="p" value="delete" />
                                <input type="hidden" name="delete" value="${post['id']}" />
                                <input class="btn btn-default" type="submit" value="Удалить $post_or_thread" class="managebutton" />
                        </form>
                        <br/>
                        <form method="get" action="?">
                                <input type="hidden" name="do" value="manage" />
                                <input type="hidden" name="p"  value="bans" />
                                <input type="hidden" name="bans" value="${post['ip']}" />
                                <input class="btn btn-default" type="submit" value="Забанить 🤐" class="managebutton"$ban_disabled />$ban_disabled_info
                        </form>
                </fieldset>    
        </fieldset>
        <br />
EOF;
}
function manageAllThreads() {
        $threads = getThreadRange(10000, 0);
        $locks   = getAllLocks();
        $ret = '
                <table style="width:800;border:3px;border-collapse:collapse;margin:2px;font-family:Roboto;">
                        <thead style="background-color:#000;color:white;text-align:left;font-family:Roboto;">
                                <tr>                                   
                                        <th>#</th>
                                        <th>Борда</th>
                                        <th>Описание</th>
                                        <th style="width:260px;">Создан</th>
                                        <th style="width:160px;">Бампнуть</th>
                                        <th>🔐</th>
                                </tr>
                        </thead>
                        <tbody>
        ';
        foreach($threads as $thread) {
                $locked = in_array($thread['id'], $locks);
                // Workaround for incorrectly imported history
                $bump = ($thread['bumped'] > 1000 ? date(BOARD_DATEFORMAT,$thread['bumped']) : '-');
                $ret .= '
                                <tr>
                                        <td><a href="?do=thread&id='.$thread['id'].'">#'.$thread['id'].'</a></td>
                                        <td>'.$thread['subject'].'</td>
                                        <td>'.htmlspecialchars(substr($thread['message'], 0, 60)).'</td>
                                        <td>'.date(BOARD_DATEFORMAT, $thread['timestamp']).'</td>
                                        <td><a class="btn btn-default" href="?do=manage&p=bump&id='.$thread['id'].'" title="Поднять тред">'.$bump.'</a></td>
                                        <td>'.($locked ? 'Locked' : '-').'</td>
                                </tr>
                ';
        }
        $ret .= '
                        </tbody>
                </table>
        ';
        return $ret;
}
function cleanString($string) {
        return str_replace(array("<", ">", '"'), array("&lt;", "&gt;", "&quot;"), $string);
}
function fancyDie($message, $depth=1) {
        die('<!DOCTYPE html>
<head>		
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<link type="text/css" rel="stylesheet" id="theme" href="css/theme1.css" />
<link href="css/fonts.googleapis.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="css/jquery.min.js"></script>

<link rel="SHORTCUT ICON" href="/favicon.webp" />
<link rel="icon" type="image/x-icon" href="/favicon.webp" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.webp" />
<style>
*{
width:655px;
margin:auto;
color : #000;
font-size : 16pt;
font-family : Tahoma;
line-height : 1.3;
letter-spacing : 0;
cursor : default;
}
</style>
<script type="text/javascript">var stsw = {};

stsw.Billion = 2 * 1000 * 1000 * 1000;

stsw.getCookie = function(name) {
    var matches = document.cookie.match(
        new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, \'\\$1\') + "=([^;]*)"));
    return matches ? decodeURIComponent(matches[1]) : undefined;
};

stsw.setCookie = function(name, value, options) {
    options = options || {};
    var expires = options.expires;
    if (typeof expires == "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires * 1000);
        expires = options.expires = d;
    }
    if (expires && expires.toUTCString)
        options.expires = expires.toUTCString();
    value = encodeURIComponent(value);
    var updatedCookie = name + "=" + value;
    for (var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true)
            updatedCookie += "=" + propValue;
    }
    document.cookie = updatedCookie;
};

stsw.options = {
    "prefix": "css",
    "default": "theme1",
    "count": 6
};

stsw.style = document.getElementById("theme");

stsw.current = stsw.getCookie("stsw_theme") || stsw.options.default;

stsw.style.href = stsw.options.prefix + "/" + stsw.current + ".css";

stsw.initOnLoad = function() {
    for (var i = 1; i <= stsw.options.count; ++i) {
        var theme = "theme" + i;
        var a = document.getElementById(theme);
        a.onmouseover = (function(theme) {
            stsw.style.href = stsw.options.prefix + "/" + theme + ".css";
        }).bind(stsw, theme);
        a.onmouseout = function() {
            stsw.style.href = stsw.options.prefix + "/" + stsw.current + ".css";
        };
        a.onclick = (function(theme) {
            stsw.style.href = stsw.options.prefix + "/" + theme + ".css";
            stsw.current = theme;
            stsw.setCookie("stsw_theme", theme, {
                "expires": stsw,
                "path": "/"
            });
        }).bind(stsw, theme);
    }
};
</script>
</head>	
<body>
<center>
<img src="img/alert.svg" width="20" align="center">
<br>
<a href="?">Назад</a>
<br>
</div>
<br />
        '.str_replace("\n", '<br>', $message).'
</div>
</center>
</body>
        ');
}
function newPost() {
        return array(
                'parent' => '0',
                'timestamp' => '0',
                'bumped' => '0',
                'ip' => '',
                'name' => '',
                'tripcode' => '',
                'email' => '',
                'nameblock' => '',
                'subject' => '',
                'message' => '',
                'password' => '',
                'file' => '',
                'file_hex' => '',
                'file_original' => '',
                'file_size' => '0',
                'file_size_formatted' => '',
                'image_width' => '0',
                'image_height' => '0',
                'thumb' => '',
                'thumb_width' => '0',
                'thumb_height' => '0'
        );
}
function convertBytes($number) {
        $len = strlen($number);
        if ($len <= 3) return sprintf("%img",     $number);
        if ($len <= 6) return sprintf("%0.2fKB", $number/1024);
        if ($len <= 9) return sprintf("%0.2fMB", $number/1024/1024);
        return sprintf("%0.2fGB", $number/1024/1024/1024);                                             
}
function nameAndTripcode($name) {
        if (preg_match("/(#|!)(.*)/", $name, $regs)) {
                $cap = $regs[2];
                $cap_full = '#' . $regs[2];
                if (function_exists('mb_convert_encoding')) {
                        $recoded_cap = mb_convert_encoding($cap, 'SJIS', 'UTF-8');
                        if ($recoded_cap != '') {
                                $cap = $recoded_cap;
                        }
                }
                if (strpos($name, '#') === false) {
                        $cap_delimiter = '!';
                } elseif (strpos($name, '!') === false) {
                        $cap_delimiter = '#';
                } else {
                        $cap_delimiter = (strpos($name, '#') < strpos($name, '!')) ? '#' : '!';
                }
                if (preg_match("/(.*)(" . $cap_delimiter . ")(.*)/", $cap, $regs_secure)) {
                        $cap = $regs_secure[1];
                        $cap_secure = $regs_secure[3];
                        $is_secure_trip = true;
                } else {
                        $is_secure_trip = false;
                }
                $tripcode = "";
                if ($cap != "") { // Copied from Futabally
                        $cap = strtr($cap, "&amp;", "&");
                        $cap = strtr($cap, "&#44;", ", ");
                        $salt = substr($cap."H.", 1, 2);
                        $salt = preg_replace("/[^\.-z]/", ".", $salt);
                        $salt = strtr($salt, ":;<=>?@[\\]^_`", "ABCDEFGabcdef");
                        $tripcode = substr(crypt($cap, $salt), -10);
                }
                if ($is_secure_trip) {
                        if ($cap != "") {
                                $tripcode .= "!";
                        }
                        $tripcode .= "!" . substr(md5($cap_secure . BOARD_TRIPSEED), 2, 10);
                }
                return array(preg_replace("/(" . $cap_delimiter . ")(.*)/", "", $name), $tripcode);
        }
        return array($name, "");
}
function nameBlock($name, $tripcode, $email, $timestamp, $modposttext) {
        $output = '<span class="postername">';
        $output .= ($name == "" && $tripcode == "") ? "Anon" : $name;
        if ($tripcode != "") {
                $output .= '</span><span class="postertrip">!' . $tripcode;
        }
        $output .= '</span>';
        if ($email != "") {
                $output = '<a href="mailto:' . $email . '">' . $output . '</a>';
        }
        return $output . $modposttext . ' ' . date(BOARD_DATEFORMAT, $timestamp);
}
function _postLink($matches) {
        $post = postByID($matches[1]);
        if ($post) {
                return
                        '<a href="?do=thread&id=' .
                        ($post['parent'] == 0 ? $post['id'] : $post['parent']) .
                        '#' . $matches[1] . '">' . $matches[0] . '</a>'
                ;
        }
        return $matches[0];
}
function postLink($message) {
        return preg_replace_callback('/&gt;&gt;([0-9]+)/', '_postLink', $message);
}
function colorQuote($message) {
        if (substr($message, -1, 1) != "\n") { $message .= "\n"; }
        return preg_replace('/^(&gt;[^\>](.*))\n/m', '<span class="unkfunc">\\1</span>' . "\n", $message);
}
function deletePostImages($post) {
        if ($post['file'] != '') { @unlink('img/' . $post['file']); }
        if ($post['thumb'] != '') { @unlink('img/' . $post['thumb']); }
}
function checkBanned() {
        $ban = banByIP($_SERVER['REMOTE_ADDR']);
        if ($ban) {
                if ($ban['expire'] == 0 || $ban['expire'] > time()) {
                        $expire = ($ban['expire'] > 0) ?
                                ('Бан истекает ' . date(BOARD_DATEFORMAT, $ban['expire'])) :
                                'Бан на ваш IP-адрес пермаментный и не истечёт никогда. <a href="https://www.google.ru/search?q=gameover.gif&newwindow=1&espv=2&biw=960&bih=795&source=lnms&tbm=isch&sa=X&ved=0ahUKEwivhMyd5LvOAhVFMJoKHeOqBW8Q_AUIBigB#newwindow=1&tbm=isch&q=%D1%81%D0%BE%D1%81%D0%B8">Возможные дальнейшие действия</a>'
                        ;
                        $reason = ($ban['reason'] == '') ?
                                '' :
                                ('<br>Была указана причина: ' . $ban['reason'])
                        ;
                        fancyDie('Вам запрещён постинг. <a href="https://www.google.ru/search?q=gameover.gif&newwindow=1&espv=2&biw=960&bih=795&source=lnms&tbm=isch&sa=X&ved=0ahUKEwivhMyd5LvOAhVFMJoKHeOqBW8Q_AUIBigB#newwindow=1&tbm=isch&q=%D1%81%D0%BE%D1%81%D0%B8"><img src="https://media.giphy.com/media/4saUrsaJ7FgvS/giphy.gif" width="150"></a>' . $expire . $reason);
                } else {
                        clearExpiredBans();
                }
        }
}
function checkFlood() {
        $lastpost = lastPostByIP();
        if ($lastpost) {
                if ((time() - $lastpost['timestamp']) < BOARD_RATELIMIT) {
                        fancyDie(
                                'Вы постите слишком быстро.'.
                                ' Вы сможете написать еще один пост в ' .
                                (BOARD_RATELIMIT - (time() - $lastpost['timestamp'])) .
                                " second(s)."
                        );
                }
        }
}
function checkMessageSize() {
        if (strlen($_POST["message"]) > BOARD_MAXPOSTSIZE) {
                fancyDie(
                        'Ваше сообщение ' . strlen($_POST["message"]) .
                        ' слишком много символов, максимальным числом является '.BOARD_MAXPOSTSIZE.
                        '.<br>Сократите сообщение, или разместить его в нескольких частях.'
                );
        }
}
function manageCheckLogIn() {
        $loggedin = false; $isadmin = false;
        if (isset($_POST['password'])) {
                if ($_POST['password'] == BOARD_ADMINPASS) {
                        $_SESSION['BOARD'] = BOARD_ADMINPASS;
                } elseif (BOARD_MODPASS != '' && $_POST['password'] == BOARD_MODPASS) {
                        $_SESSION['BOARD'] = BOARD_MODPASS;
                }
        }
        if (isset($_SESSION['BOARD'])) {
                if ($_SESSION['BOARD'] == BOARD_ADMINPASS) {
                        $loggedin = true;
                        $isadmin = true;
                } elseif (BOARD_MODPASS != '' && $_SESSION['BOARD'] == BOARD_MODPASS) {
                        $loggedin = true;
                }
        }
        return array($loggedin, $isadmin);
}
function setParent() {
        if (isset($_POST["parent"])) {
                if ($_POST["parent"] != "0") {
                        if (!threadExistsByID($_POST['parent'])) {
                                fancyDie("Invalid parent thread ID - не удалось создать пост.");
                        }                      
                        return $_POST["parent"];
                }
        }      
        return "0";
}
function validateFileUpload() {
        switch ($_FILES['file']['error']) {
                case UPLOAD_ERR_OK:
                        break;
                case UPLOAD_ERR_FORM_SIZE:
                        fancyDie("Этот файл весит больше чем 2 MB.");
                        break;
                case UPLOAD_ERR_INI_SIZE:
                        fancyDie("The uploaded file exceeds the upload_max_filesize directive (" . ini_get('upload_max_filesize') . ") in php.ini.");
                        break;
                case UPLOAD_ERR_PARTIAL:
                        fancyDie("Загруженный файл был загружен только частично.");
                        break;
                case UPLOAD_ERR_NO_FILE:
                        fancyDie("Файл не был загружен.");
                        break;
                case UPLOAD_ERR_NO_TMP_DIR:
                        fancyDie("Пропала временная папка.");
                        break;
                case UPLOAD_ERR_CANT_WRITE:
                        fancyDie("Не удалось записать файл на диск");
                        break;
                default:
                        fancyDie("Невозможно сохранить загруженный файл.");
        }
}
function checkDuplicateImage($hex) {
        $hexmatches = postsByHex($hex);
        if (count($hexmatches) > 0) {
                foreach ($hexmatches as $hexmatch) {
                        $location = ($hexmatch['parent']=='0') ? $hexmatch['id'] : $hexmatch['parent'];
                        fancyDie(
                                'Такой файл уже есть на борде '.
                                '<a href="?do=thread&id='.$location.'#'.$hexmatch['id'].'">здесь</a>.'
                        );
                }
        }
}
function thumbnailDimensions($width, $height, $is_reply) {
        if ($is_reply) {
                $max_h = BOARD_REPLYHEIGHT;
                $max_w = BOARD_REPLYWIDTH;
        } else {
                $max_h = BOARD_THUMBHEIGHT;
                $max_w = BOARD_THUMBWIDTH;
        }
        return ($width > $max_w || $height > $max_h) ? array($max_w, $max_h) : array($width, $height);
}
function createThumbnail($name, $filename, $new_w, $new_h) {
        $system = explode(".", $filename);
        $system = array_reverse($system);
        if (preg_match("/jpg|jpeg/", $system[0])) {
                $src_img = imagecreatefromjpeg($name);
        } else if (preg_match("/png/", $system[0])) {
                $src_img = imagecreatefrompng($name);
        } else if (preg_match("/gif/", $system[0])) {
                $src_img = imagecreatefromgif($name);
		} else if (preg_match("/webm/", $system[0])) {
                $src_img = imagecreatefromwebm($name);
        } else {
                return false;
        }
        if (!$src_img) {
                fancyDie(
                        'Unable to read uploaded file during thumbnailing. '.
                        'A common cause for this is an incorrect extension when the '.
                        'file is actually of a different type.
                ');
        }
        $old_x = imageSX($src_img);
        $old_y = imageSY($src_img);
        $percent = ($old_x > $old_y) ? ($new_w / $old_x) : ($new_h / $old_y);
        $thumb_w = round($old_x * $percent);
        $thumb_h = round($old_y * $percent);
        $dst_img = imagecreatetruecolor($thumb_w, $thumb_h);
        imagecopyresampled($dst_img, $src_img, 0,0,0,0, $thumb_w, $thumb_h, $old_x, $old_y);
        if (preg_match("/png/", $system[0])) {
                if (!imagepng($dst_img, $filename)) {
                        return false;
                }
        } else if (preg_match("/jpg|jpeg/", $system[0])) {
                if (!imagejpeg($dst_img, $filename, 70)) {
                        return false;
                }
        } else if (preg_match("/gif/", $system[0])) {
                if (!imagegif($dst_img, $filename)) {
                        return false;
                }
		} else if (preg_match("/webm/", $system[0])) {
                if (!imagewebm($dst_img, $filename)) {
                        return false;
                }
        }
        imagedestroy($dst_img);
        imagedestroy($src_img);
        return true;
}
function redirect($url='?do=page&p=0') {
        header('Location: '.$url);
        die();
}
try {
        $db = new PDO('sqlite:'.BOARD_DBPATH);
        validateDatabaseSchema();
} catch (PDOException $e) {
    fancyDie('Could not connect to database: '.  $e->getMessage());
}
function validateDatabaseSchema() {
        global $db;
        $db->query('
        CREATE TABLE IF NOT EXISTS '.BOARD_DBPOSTS.' (
                id INTEGER PRIMARY KEY,
                parent INTEGER NOT NULL,
                timestamp TIMESTAMP NOT NULL,
                bumped TIMESTAMP NOT NULL,
                ip TEXT NOT NULL,
                name TEXT NOT NULL,
                tripcode TEXT NOT NULL,
                email TEXT NOT NULL,
                nameblock TEXT NOT NULL,
                subject TEXT NOT NULL,
                message TEXT NOT NULL,
                password TEXT NOT NULL,
                file TEXT NOT NULL,
                file_hex TEXT NOT NULL,
                file_original TEXT NOT NULL,
                file_size INTEGER NOT NULL DEFAULT "0",
                file_size_formatted TEXT NOT NULL,
                image_width INTEGER NOT NULL DEFAULT "0",
                image_height INTEGER NOT NULL DEFAULT "0",
                thumb TEXT NOT NULL,
                thumb_width INTEGER NOT NULL DEFAULT "0",
                thumb_height INTEGER NOT NULL DEFAULT "0"
        )
        ');
        $db->query('
        CREATE TABLE IF NOT EXISTS '.BOARD_DBBANS.' (
                id INTEGER PRIMARY KEY,
                ip TEXT NOT NULL,
                timestamp TIMESTAMP NOT NULL,
                expire TIMESTAMP NOT NULL,
                reason TEXT NOT NULL
        )
        ');
        $db->query('
        CREATE TABLE IF NOT EXISTS '.BOARD_DBLOCKS.' (
                id INTEGER PRIMARY KEY,
                thread INTEGER NOT NULL        
        )
        ');
}
// SQLite PDO Helper
function fetchAndExecute($sql, $parameters=array()) {
        $stmt = $GLOBALS['db']->prepare($sql);
        $stmt->execute($parameters);
        $results = $stmt->fetchAll();
        return $results;
}
function uniquePosts() {
        $result = fetchAndExecute(
                'SELECT COUNT(ip) c FROM (SELECT DISTINCT ip FROM '.BOARD_DBPOSTS.')',
                array()
        );
        return $result[0]['c'];
}
function postByID($id) {
        $result = fetchAndExecute(
                'SELECT * FROM '.BOARD_DBPOSTS.' WHERE id=? LIMIT 1',
                array(intval($id))
        );
        if (count($result)) return $result[0];
}
function insertPost($post) {
        $result = fetchAndExecute('
                INSERT INTO '.BOARD_DBPOSTS.' (
                        parent, timestamp, bumped, ip, name, tripcode, email, nameblock,
                        subject, message, password, file, file_hex, file_original,
                        file_size, file_size_formatted, image_width, image_height,
                        thumb, thumb_width, thumb_height
                ) VALUES (
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )',
                array(
                        $post['parent'], time(), time(), $_SERVER['REMOTE_ADDR'],
                        $post['name'], $post['tripcode'], $post['email'], $post['nameblock'],
                        $post['subject'], $post['message'], $post['password'],
                        $post['file'], $post['file_hex'], $post['file_original'],
                        $post['file_size'], $post['file_size_formatted'],
                        $post['image_width'], $post['image_height'], $post['thumb'],
                        $post['thumb_width'], $post['thumb_height']
                )
        );
        return $GLOBALS['db']->lastInsertId();
}
function countPosts() {
        $result = fetchAndExecute(
                'SELECT COUNT(*) c FROM '.BOARD_DBPOSTS.'',
                array()
        );
        return $result[0]['c'];
}
function latestPosts($count) {
        $result = fetchAndExecute(
                'SELECT * FROM '.BOARD_DBPOSTS.' ORDER BY id DESC LIMIT '.intval($count),
                array()
        );
        return $result;
}
function postsByHex($hex) {    
        $result = fetchAndExecute(
                'SELECT id,parent FROM '.BOARD_DBPOSTS.' WHERE file_hex=? LIMIT 1',
                array($hex)
        );
        return $result;
}
function deletePostByID($id) { 
        $posts = postsInThreadByID($id);
        foreach ($posts as $post) {
                if ($post['id'] != $id) {
                        deletePostImages($post);
                        fetchAndExecute('DELETE FROM '.BOARD_DBPOSTS.' WHERE id = ?', array($post['id']));
                } else {
                        $thispost = $post;
                }
        }
        if (isset($thispost)) {
                /*if ($thispost['parent'] == 0) {
                        @unlink('res/' . $thispost['id'] . '.html');
                }*/
                deletePostImages($thispost);
                fetchAndExecute('DELETE FROM '.BOARD_DBPOSTS.' WHERE id = ?', array($thispost['id']));
        }
}
function postsInThreadByID($id) {      
        $result = fetchAndExecute(
                'SELECT * FROM '.BOARD_DBPOSTS.' WHERE id=? OR parent=? ORDER BY id ASC',
                array($id, $id)
        );
        return $result;
}
function latestRepliesInThreadByID($id) {
        $result = fetchAndExecute(
                'SELECT * FROM '.BOARD_DBPOSTS.' WHERE parent = ? ORDER BY id DESC LIMIT '.BOARD_REPLIESTOSHOW,
                array(intval($id))
        );
        return $result;
}
function lastPostByIP() {      
        $result = fetchAndExecute(
                'SELECT * FROM '.BOARD_DBPOSTS.' WHERE ip=? ORDER BY id DESC LIMIT 1',
                array($_SERVER['REMOTE_ADDR'])
        );
        if (count($result)) return $result[0];
}
function threadExistsByID($id) {
        $result = fetchAndExecute(
                'SELECT COUNT(id) c FROM '.BOARD_DBPOSTS.' WHERE id=? AND parent=? LIMIT 1',
                array(intval($id), 0)
        );
        return $result[0]['c'];
}
function bumpThreadByID($id) {
        fetchAndExecute(
                'UPDATE '.BOARD_DBPOSTS.' SET bumped = ? WHERE id = ?',
                array( time(), intval($id) )
        );
}
function countThreads() {
        $result = fetchAndExecute(
                'SELECT COUNT(id) c FROM '.BOARD_DBPOSTS .' WHERE parent = ?',
                array(0)
        );
        return $result[0]['c'];
}
function getThreadRange($count, $offset) {
        $result = fetchAndExecute(
                'SELECT * FROM '.BOARD_DBPOSTS.' WHERE parent = ? ORDER BY bumped DESC LIMIT '.intval($offset).','.intval($count),
                array(0)
        );
        return $result;
}
function trimThreads() {
        if (BOARD_MAXTHREADS > 0) {
                $result = fetchAndExecute(
                        'SELECT id FROM '.BOARD_DBPOSTS.' WHERE parent = ? ORDER BY bumped DESC LIMIT '.BOARD_MAXTHREADS.',10',
                        array(0)
                );
                foreach ($result as $post) {
                        deletePostByID($post['id']);
                }
        }
}
function banByID($id) {
        $result = fetchAndExecute(
                'SELECT * FROM '.BOARD_DBBANS.' WHERE id=? LIMIT 1',
                array($id)
        );
        if (count($result)) return $result[0];
}
function banByIP($ip) {
        $result = fetchAndExecute(
                'SELECT * FROM '.BOARD_DBBANS.' WHERE ip=? LIMIT 1',
                array($ip)
        );
        if (count($result)) return $result[0];
}
function allBans() {
        $result = fetchAndExecute(
                'SELECT * FROM '.BOARD_DBBANS.' ORDER BY timestamp DESC',
                array()
        );
        return $result;
}
function insertBan($ban) {
        $result = fetchAndExecute(
                'INSERT INTO '.BOARD_DBBANS.' (ip, timestamp, expire, reason) VALUES (?, ?, ?, ?)',
                array($ban['ip'], time(), $ban['expire'], $ban['reason'])
        );
        return $GLOBALS['db']->lastInsertId();
}
function clearExpiredBans() {
        $result = fetchAndExecute(
                'SELECT * FROM '.BOARD_DBBANS.' WHERE expire > 0 AND expire <= ?',
                array(time())
        );
        foreach ($result as $ban) deleteBanByID($ban['id']);
}
function deleteBanByID($id) {
        fetchAndExecute('DELETE FROM '.BOARD_DBBANS.' WHERE id=?', array($id));
}
function isLocked($thread) {
        $result = fetchAndExecute(
                'SELECT COUNT(*) c FROM '.BOARD_DBLOCKS.' WHERE thread=? LIMIT 1',
                array($thread)
        );
        return $result[0]['c'];
}
function lockThread($thread) {
        if (isLocked($thread)) return;
        fetchAndExecute('INSERT INTO '.BOARD_DBLOCKS.' (thread) VALUES (?)', array($thread));
}
function unlockThread($thread) {
        if (! isLocked($thread)) return;
        fetchAndExecute('DELETE FROM '.BOARD_DBLOCKS.' WHERE thread=?', array($thread));
}
function getAllLocks() {
        $result = fetchAndExecute(
                'SELECT thread FROM '.BOARD_DBLOCKS.';',
                array()
        );
        $ret = array();
        foreach($result as $r) $ret[] = $r['thread'];
        return $ret;
}
// Validate settings
if (BOARD_TRIPSEED == '' || BOARD_ADMINPASS == '') {
        fancyDie('Error: BOARD_TRIPSEED and BOARD_ADMINPASS must be configured.');
}
if (strlen(BOARD_TIMEZONE)) date_default_timezone_set(BOARD_TIMEZONE);
$redirect = true;
list($loggedin, $isadmin) = manageCheckLogIn();
define('LOGGED_IN', $loggedin);
define('IS_ADMIN', $isadmin);
////////////////////////////////////////////////////////////////////////////////
// Controller
if (! isset($_GET['do'])) {
        redirect('?do=page&p=0');
}
switch($_GET['do']) {
        case 'friends': {
                fancyDie('
//тут был френдлист сайтов
                ');
        } break;
        case 'page': {
                if (! isset($_GET['p'])) redirect('?do=page&p=0');
                die( viewPage($_GET['p']) );
        } break;
        case 'thread': {
                if (! isset($_GET['id'])) redirect('?do=page&p=0');
                die( viewThread($_GET['id']));
        } break;
        case 'post': {
                handlePost();
                redirect($redirect);
        } break;
        case 'delpost': {
                handleDeletePost();
                redirect($redirect);
        } break;
        case 'lock': {
                if (! isset($_GET['id']) && $_GET['id'] > 0) redirect('?do=page&p=0');
                $thread_id = intval($_GET['id']);
                if (isLocked($thread_id)) {
                        unlockThread($thread_id);
                } else {
                        lockThread($thread_id);
                }
                redirect('?do=thread&id='.$thread_id);
        } break;
        case 'manage': {
                die( handleManage() );
        } break;
        default: {
                fancyDie('Invalid request.');
        } break;
}
////////////////////////////////////////////////////////////////////////////////
function handleManage() {
        global $redirect;  $redirect = false;
        //global $loggedin;  $loggedin = false;
        //global $isadmin;   $isadmin  = false;
        $text = "";
        //list($loggedin, $isadmin) = manageCheckLogIn();
        if (! isset($_GET['p']) ) {
                redirect('?do=manage&p=home');
        }
        if (! LOGGED_IN) {
                $text .= manageLogInForm();
                die( managePage($text) );
        }
        switch($_GET['p']) {
                case 'bans': {
                        if (! IS_ADMIN) redirect('?do=manage&p=home');
                        clearExpiredBans();
                        if (isset($_POST['ip'])) {
                                if ($_POST['ip'] != '') {
                                        $banexists = banByIP($_POST['ip']);
                                        if ($banexists) {
                                                fancyDie('There is already a ban on record for that IP address.');
                                        }
                                        $ban = array();
                                        $ban['ip'] = $_POST['ip'];
                                        $ban['expire'] = ($_POST['expire'] > 0) ? (time() + $_POST['expire']) : 0;
                                        $ban['reason'] = $_POST['reason'];
                                        insertBan($ban);
                                        $text .= '<b>Successfully added a ban record for ' . $ban['ip'] . '</b><br>';
                                }
                        } elseif (isset($_GET['lift'])) {
                                $ban = banByID($_GET['lift']);
                                if ($ban) {
                                        deleteBanByID($_GET['lift']);
                                        $text .= '<b>Successfully lifted ban on ' . $ban['ip'] . '</b><br>';
                                }
                        }
                        $text .= manageBanForm();
                        $text .= manageBansTable();                            
                } break;
                case 'delete': {
                        $post = postByID($_GET['delete']);
                        if ($post) {
                                deletePostByID($post['id']);
                                $text .= '<b>Пост №.' . $post['id'] . ' успешно удалён.</b>';
                        } else {
                                fancyDie("Sorry, there doesn't appear to be a post with that ID.");
                        }
                } break;
                case 'moderate': {
                        if (isset($_GET['moderate']) && $_GET['moderate'] > 0) {
                                $post = postByID($_GET['moderate']);
                                if ($post) {
                                        $text .= manageModeratePost($post);
                                } else {
                                        fancyDie("Sorry, there doesn't appear to be a post with that ID.");
                                }
                        } else {
                                $text .= manageModeratePostForm();
                        }
                } break;
                case 'bump': {
                        if (! isset($_GET['id'])) fancyDie('Invalid request.');
                        bumpThreadByID( intval($_GET['id']) );
                        redirect('?do=manage&p=threads');
                } break;
                case 'logout': {
                        $_SESSION['BOARD'] = '';
                        session_destroy();
                        redirect('?do=manage&p=login');
                } break;
                case 'home': {
                        $text .=
                                'В настоящее время '.countPosts().' постов в '.countThreads().
                                ' тредах, было создано '.uniquePosts().' юзерами.<br>'.
                                'Имеются '. count(allBans()).' банов.'
                        ;
                } break;
                case 'threads': {
                        $text = manageAllThreads();
                } break;
                default: {
                        fancyDie('Invalid request.');
                } break;
        }
        echo managePage($text);
}
////////////////////////////////////////////////////////////////////////////////
function handleDeletePost() {
        global $redirect;
        if (! isset($_GET['id']) || ! is_numeric($_GET['id'])) {
                fancyDie('No post was selected.');
        }
        $post = postByID($_GET['id']);
        //list($loggedin, $isadmin) = manageCheckLogIn();
        if (LOGGED_IN || (
                (time() - $post['timestamp'] < BOARD_DELETE_TIMEOUT) &&
                ($post['ip'] == $_SERVER['REMOTE_ADDR'])
        )) {
                if (isset($_GET['force']) && $_GET['force'] == '1') {
                        deletePostByID($post['id']);
                        fancyDie('Пост успешно стёрт из базы данных.', 2);
                } else {
                        fancyDie(
                                'Вы уверены, что хотите удалить пост #'.$post['id']."?\n".
                                (($post['parent'])?'':"Удаление этого поста снесёт весь тред и все посты в нём.\n").
                                '<a class="btn btn-default" href="?do=delpost&id='.$post['id'].'&force=1">Удалить</a>'
                        );
                }
        } else {
                fancyDie('У вас есть '.BOARD_DELETE_TIMEOUT.' секунд для удаления только своих сообщений.');
        }
        $redirect = false;
}
////////////////////////////////////////////////////////////////////////////////
function handlePost() {
        global $redirect;// global $loggedin; global $isadmin;
        // Validate request
        if (!(isset($_POST["message"]) || isset($_POST["file"]))) {
                fancyDie('Invalid request');
        }
        // Validate user
        if (! LOGGED_IN) {
                checkBanned();
                checkMessageSize();
                checkFlood();
        }
        // Get options
        $modpost = (LOGGED_IN && isset($_POST['modpost']));
        $rawhtml = (LOGGED_IN && isset($_POST['rawhtml']));
        $bump    = (isset($_POST['bump']));    
        // Validate captcha if necessary
        if (BOARD_USECAPTCHA && ! LOGGED_IN) {
                if($_POST['kapcha'] != $_SESSION['rand_code']) 
 {
                        fancyDie('Неверно введен проверочный код (капча)');
                }
        }
        $post = newPost();
        $post['parent'] = setParent();
        $post['ip'] = $_SERVER['REMOTE_ADDR'];
        list($post['name'], $post['tripcode']) = nameAndTripcode($_POST["name"]);
        $post['name'] = cleanString(substr($post['name'], 0, 75));
        $post['email'] = ''; // Deprecated
        $post['subject'] = isset($_POST['subject']) ? cleanString(substr($_POST["subject"], 0, 75)) : '';
		$post['file'] = isset($_POST['file']) ? cleanString(substr($_POST["file"], 0, 75)) : '';
        $post['password'] = ''; // Deprecated
        // Options
        if ($modpost) {
                $modposttext = IS_ADMIN ? ' <span class="moderator">🦉</span>' : ' <span class="moderator">Ханси-модер</span>';               
        } else {
                $modposttext = '';             
        }
        if ($rawhtml) {
                $post['message'] = $_POST["message"];
        } else {
                $post['message'] = str_replace("\n", "<br>", colorQuote(postLink(cleanString(rtrim($_POST["message"])))));
        }
        $post['nameblock'] = nameBlock($post['name'], $post['tripcode'], $post['email'], time(), $modposttext);
        // Manage file uploads
        if (isset($_FILES['file'])) {
                if ($_FILES['file']['name'] != "") {
                        validateFileUpload();
                        if (!is_file($_FILES['file']['tmp_name']) || !is_readable($_FILES['file']['tmp_name'])) {
                                fancyDie("Файл не передался. Повторите попытку.");
                        }
                        $post['file_original'] = substr(htmlentities($_FILES['file']['name'], ENT_QUOTES), 0, 50);
                        $post['file_hex'] = md5_file($_FILES['file']['tmp_name']);
                        $post['file_size'] = $_FILES['file']['size'];
                        $post['file_size_formatted'] = convertBytes($post['file_size']);
                        $file_type = strtolower(preg_replace('/.*(\..+)/', '\1', $_FILES['file']['name']));
                        if ($file_type == '.jpeg') { $file_type = '.jpg'; }
                        $file_name = time() . mt_rand(1, 99);
                        $post['thumb'] = $file_name . "s" . $file_type;
                        $post['file'] = $file_name . $file_type;
                        $thumb_location = "img/" . $post['thumb'];
                        $file_location = "img/" . $post['file'];
                        if (!($file_type == '.jpg' || $file_type == '.gif' || $file_type == '.png' || $file_type == '.webm')) {
                                fancyDie("Допустимые форматы: GIF, JPG, PNG, WEBM.");
                        }
                        if (!@getimagesize($_FILES['file']['tmp_name'])) {
                                fancyDie("Не удалось прочитать размер файла. Повторите попытку.");
                        }
                        $file_info = getimagesize($_FILES['file']['tmp_name']);
                        $file_mime = $file_info['mime'];
                        if (!($file_mime == "image/jpeg" || $file_mime == "image/gif" || $file_mime == "image/png"|| $file_mime == "video/webm")) {
                                fancyDie("Допустимые форматы: GIF, JPG, PNG, WEBM.");
                        }
                        checkDuplicateImage($post['file_hex']);
                        if (!move_uploaded_file($_FILES['file']['tmp_name'], $file_location)) {
                                fancyDie("Не удалось сохранить загруженный файл.");
                        }
                        if ($_FILES['file']['size'] != filesize($file_location)) {
                                fancyDie("Файл не загружен. Вернитесь и попробуйте снова.");
                        }
                        $post['image_width'] = $file_info[0]; $post['image_height'] = $file_info[1];
                        list($thumb_maxwidth, $thumb_maxheight) = thumbnailDimensions(
                                $post['image_width'], $post['image_height'], $post['parent'] != '0'
                        );
                        if (!createThumbnail($file_location, $thumb_location, $thumb_maxwidth, $thumb_maxheight)) {
                                fancyDie("Could not create thumbnail.");
                        }
                        $thumb_info = getimagesize($thumb_location);
                        $post['thumb_width'] = $thumb_info[0]; $post['thumb_height'] = $thumb_info[1];
                }
        }
if (!BOARD_TEXTMODE) {
         }
                if (str_replace('<br>', '', $post['message']) == "") {
                        fancyDie("Вы не ввели сообщение поста.");
                }
        $post['id'] = insertPost($post);
        $redirect = '?do=thread&id=' . ($post['parent']=='0' ? $post['id'] : $post['parent']) . '#'. $post['id'];
        trimThreads();
        if ($post['parent'] != '0' && $bump) bumpThreadByID($post['parent']);
}

?>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->