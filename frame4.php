<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--Cтили-->
<link type="text/css" rel="stylesheet" id="theme" href="css/theme1.css" />

<link rel="SHORTCUT ICON" href="/favicon.svg" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.svg" />

</head>
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
font-family : Roboto, Sans;
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
<body>
<div>
<br>
<br>
<center>
<br>
<div class="reply">
<h1>Разметка</h1>
<table width="500" cellspacing="1" cellpadding="1" border="0"
    STYLE="table-layout:fixed">
<tr bgcolor="#eeeeee">
 <td class="zz" width="1"><b></b></td>
 <td class="zz" width="100"><b>Действие</b></td>
 <td class="zz" width="200"><b>bbCode</b></td>
 <td class="zz" width="100"><b>WakabaMark</b></td>
 </tr>
 
<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz"><b>Жирный</b></td>
<td class="zz">[b]текст[/b]</td>
<td class="zz">**текст**</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz"><i>Курсив</i></td>
<td class="zz">[i]текст[/i]</td>
<td class="zz">*текст*</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz"><s>Зачеркнуть</s></td>
<td class="zz">[s]текст[/s]</td>
<td class="zz">--текст--</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz"><u>Подчеркнуть</u></td>
<td class="zz">[u]текст[/u]</td>
<td class="zz">__текст__</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz"><span class="spoiler">Спойлер</span></td>
<td class="zz">[spoiler]текст[/spoiler]</td>
<td class="zz">%%текст%%</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz"><font color="green">>Ответ</font></td>
<td class="zz">[quote]текст[/quote]</td>
<td class="zz">>текст</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz">Текст под спойлером</td>
<td class="zz">	[spoiler2]текст[/spoiler2]</td>
<td class="zz">-</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz"><code>код</code></td>
<td class="zz">	[code]код[/code]</td>
<td class="zz">-</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz"><a href="URL">URL</a></td>
<td class="zz">		[url]ссылка[/url] или [url=Текст ссылки]ссылка[/url]</td>
<td class="zz">-</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz"><img src="URL"></td>
<td class="zz">	[img]ссылка на картинку[/img]</td>
<td class="zz">-</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz">webm</td>
<td class="zz">	[webm]ссылка на вебм[/webm]</td>
<td class="zz">-</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz">audio</td>
<td class="zz">	[audio]ссылка на трек[/audio]</td>
<td class="zz">-</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz">Синтезатор речи</td>
<td class="zz">	[audiobot]текст обращения[/audiobot]</td>
<td class="zz">-</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz">Цвет текста</td>
<td class="zz">	[color=Цвет] Текст [/color]</td>
<td class="zz">-</td>
</tr>

<tr bgcolor="transparent"><td class="zz"> </td>
<td class="zz">Размер текста</td>
<td class="zz">	[size=Значение] Текст[/size]</td>
<td class="zz">-</td>
</tr>
</table>  
<br>
</div>
	<br>
<div class="reply">
<h1>Вставка файлов</h1>	
Рекомендуемые сервисы для вставки изображений и видео:
<br>
https://imgur.com/ - загрузка картинок и гифок.
<br>
https://webmshare.com/ - загрузка webm.
<br>
http://int2.besaba.com - webp картинки и анимация.
<br>
</div>
    <br>
<div class="reply">
<h1>Смайлики</h1>	
На которые влиют стили смайлов:

<table width="300" cellspacing="1" cellpadding="1" border="0"
    STYLE="table-layout:fixed">
<tr bgcolor="#eeeeee">
 <td class="zz" width="100"><b>Тип</b></td>
 <td class="zz" width="100"><b>Графический</b></td>
 <td class="zz" width="100"><b>Печатный</b></td>
 </tr>
 
<tr bgcolor="transparent"><td class="zz">Лыбится</td>
<td class="zz"><div class=\"smile1\" width=\"20\" height=\"20\">😊</div></td>
<td class="zz">:)</td>
</tr>

<tr bgcolor="transparent"><td class="zz">Приуныл</td>
<td class="zz"><div class=\"smile2\" width=\"20\" height=\"20\">😩</div></td>
<td class="zz">:(</td>
</tr>

<tr bgcolor="transparent"><td class="zz">Хитрый</td>
<td class="zz"><div class=\"smile3\" width=\"20\" height=\"20\">😉</div></td>
<td class="zz">;)</td>
</tr>

<tr bgcolor="transparent"><td class="zz">Орёт</td>
<td class="zz"><div class=\"smile4\" width=\"20\" height=\"20\">😱</div></td>
<td class="zz">:о</td>
</tr>

<tr bgcolor="transparent"><td class="zz">Ржёт</td>
<td class="zz"><div class=\"smile5\" width=\"20\" height=\"20\">😀</div></td>
<td class="zz">:D</td>
</tr>

<tr bgcolor="transparent"><td class="zz">Покерфейс</td>
<td class="zz"><div class=\"smile6\" width=\"20\" height=\"20\">😐</div></td>
<td class="zz">:|</td>
</tr>

<tr bgcolor="transparent"><td class="zz">Язык</td>
<td class="zz"><div class=\"smile7\" width=\"20\" height=\"20\">😛</div></td>
<td class="zz">:ь</td>
</tr>

<tr bgcolor="transparent"><td class="zz">Блюёт</td>
<td class="zz"><div class=\"smile8\" width=\"20\" height=\"20\">🤢</div></td>
<td class="zz">:х</td>
</tr>

<tr bgcolor="transparent"><td class="zz">Злой</td>
<td class="zz"><div class=\"smile9\" width=\"20\" height=\"20\">😠</div></td>
<td class="zz">D:<</td>
</tr>

<tr bgcolor="transparent"><td class="zz">Ревёт</td>
<td class="zz"><div class=\"smile10\" width=\"20\" height=\"20\">😭</div></td>
<td class="zz">;`(</td>
</tr>

</table> 
<br>
</div>
</center>
<br>	
<br>
<br>
</body>
</html>