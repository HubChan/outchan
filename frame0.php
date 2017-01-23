<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--Cтили-->
<link type="text/css" rel="stylesheet" id="theme" href="css/theme1.css" />
<script type="text/javascript" src="css/jquery.min.js"></script>

<link rel="SHORTCUT ICON" href="/favicon.svg" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.svg" />

<style type="text/css">
body{
width:655px;
margin:auto;
color : #000;
font-size : 13pt;
font-family: 'Noto Sans', sans-serif;
line-height : 1.3;
letter-spacing : 0;
cursor : default;
text-align:  center;
}
.text {
font-size : 10pt;
font-family: 'Noto Sans', sans-serif;
}
.logo {
margin: 0px;
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
 
 
/*
//   * ПОСЛЕ ЭТОЙ ФРАЗЫ БОЛЬШЕ НЕТ КОНФИГУРАЦИИ*
*/
 
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

<br>
<br>
<center>
<br>
<div class="reply">
<h1>Исходочан</h1>
<div class="text">Добавь свою борду, <?php
$quotes[] = 'ЕФГ';
$quotes[] = 'Зой';
$quotes[] = 'Покемон';
$quotes[] = 'абу';
$quotes[] = 'Лина';
$quotes[] = 'андрюшка';
$quotes[] = 'Сниви';
$quotes[] = 'маламут';
$quotes[] = 'анон';
	srand ((double) microtime() * 1000000);
	$random_number = rand(0,count($quotes)-1);
echo
	($quotes[$random_number]);
?></div>
<br>
Это минималистичный саморегулирующийся оверчан имиджборд. Здесь нет админов, которые добавляют борды и модерируют обсуждения. Аноны это делают сами. Так же пользователи могут бампать обсуждения борды, что бы их борда прыгала вверх по списку борд. Well, добавь свою борду!
<br>
<a href="frame4.php">Правила разметки</a>
<br>
<br>
</div>
<br>
</center>

</body>
</html>