<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>404</title>  
<!--Cтили-->
<link type="text/css" rel="stylesheet" id="theme" href="css/theme1.css" />
<script type="text/javascript" src="css/jquery.min.js"></script>

<link rel="SHORTCUT ICON" href="/favicon.svg" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.svg" />

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

<style type="text/css">
body {
width:655px;
margin:auto;
color : #000;
font-size : 16pt;
font-family: 'Noto Sans', sans-serif;
line-height : 1.3;
letter-spacing : 0;
cursor : default;
text-align:  center;
text-decoration: none;
}

*reply {
margin:auto;
text-align:  center;
width:70px;
}
</style>
</head>
<body>
<script type="text/javascript" language="javascript" charset="utf-8">
			var element = document.createElement( 'div' );
			element.id = 'preloader';
			element.style.display = 'block';
			element.style.position = 'fixed';
			element.style.zIndex = 2e9;
			element.style.top = 0;
			element.style.right = 0;
			element.style.bottom = 0;
			element.style.left = 0;
			element.style.width = '100%';
			element.style.height = '100%';
			element.style.background = "#FFF";
			document.body.appendChild( element );
		</script>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<center>
<br>
<br>
<br>
<br>
<div class="reply">
<a href="http://outchan.ga/">
<br>
<h1>404</h1>
<br>
</a>
</div>
</center>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<!--JQuery-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
		<!--Bootstrap-->
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://outcomechannel.pe.hu/functions/scripts.js?version="></script>
		<script type="text/javascript" language="javascript" charset="utf-8">
			( function( $ ) {
				'use strict';

				$( window ).load( function() {
					//	For IE < 10 and Opera
					$( '.unselectable' ).attr( 'unselectable', 'on' );
					//--//
					/*
						Fade-out эффект. Ради поржать.
					*/
					$( '#preloader' ).fadeOut( 'slow', function() {
						/*
							Автофокус поля для ввода пароля.
						*/
						$( 'input[type="password"]' ).focus();
						/*
							Убираем нахуй слой-прелоадер.
						*/
						$( '#preloader' ).remove();
					} );
				} );

			} )( window.jQuery, false );
		</script>

	</body>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
</html>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->