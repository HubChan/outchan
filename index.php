
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Исходочан</title>
<meta name="description" content="Каталог имиджборд. Добавь свою борду, обсуждать чужие борды, поднимай их в топ!">
<meta name="keywords" content="imageboard, chan, board, 4chan, 2channel, 2ch, 0chan, борды, хуёрды, оверчан, овернульч, двач, сосач, харкач, имиджборда, имиджборды, капчевать, кек, двачи">

<!--Cтили-->
<link type="text/css" rel="stylesheet" id="theme" href="css/theme1.css" />
<script type="text/javascript" src="css/jquery.min.js"></script>
<script type="text/javascript" src="Ass your mom"></script>

<link rel="SHORTCUT ICON" href="/favicon.webp" />
<link rel="icon" type="image/x-icon" href="/favicon.webp" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.webp" />

<style>
.hidden-menu {
  display: block;
  position: fixed;
  list-style:none;
  padding: 0px;
  margin: 0;
  box-sizing: border-box;
  width: 200px;
  height: 100%;
  top: 0;
  left: -200px;
  transition: left .2s;
  z-index: 2;
  -webkit-transform: translateZ(0);
  -webkit-backface-visibility: hidden;
}
.hidden-menu-ticker {
  display: none;
}
.btn-menu {
  color: #000;
  background-color: transparent;
  padding: 5px;
  position: fixed;
  top: 5px;
  left: 5px;
  cursor: pointer;
  transition: left .23s;
  z-index: 3;
  width: 25px;
  -webkit-transform: translateZ(0);
  -webkit-backface-visibility: hidden;
}
.btn-menu span {
  display: block;
  height: 5px;
  background-color: #000;
  margin: 5px 0 0;
  transition: all .1s linear .23s;
  position: relative;
}
.btn-menu span.first {
  margin-top: 0;
}
.hidden-menu-ticker:checked ~ .btn-menu {
  left: 160px;
}
.hidden-menu-ticker:checked ~ .hidden-menu {
  left: 0;
}
.hidden-menu-ticker:checked ~ .btn-menu span.first {
  -webkit-transform: rotate(45deg);
  top: 10px;
}
.hidden-menu-ticker:checked ~ .btn-menu span.second {
  opacity: 0;
}
.hidden-menu-ticker:checked ~ .btn-menu span.third {
  -webkit-transform: rotate(-45deg);
  top: -10px;
}

#ifr {
    position: absolute;
    top:0px;
    left:0px;
}
::-webkit-scrollbar{
    width:0px;
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

</head>
<body>
<script>
window.onload=function() {
document.getElementById("ifr").style.height=window.innerHeight+"px";
}
</script>

<input type="checkbox" id="hmt" class="hidden-menu-ticker">
<label class="btn-menu" for="hmt">
  <span class="first"></span>
  <span class="second"></span>
  <span class="third"></span>
</label>
<ul class="hidden-menu">
<iframe src="list.php" name="list" noresize="" scrolling="auto" width="100%" height="100%" style="display: block" frameborder="no">  </iframe>
</ul>

<div class="site-wrap">

 <iframe seamless id="ifr" src="frame0.php" name="board" width="100%" height="100%" frameborder="no" style="display: block"></iframe>

</div>
</body>
</html>