<?php 
// --Config Start--
define('BOARD_TEXTMODE', true); //false - борда с картинками, true - текстовая борда
define('BOARD_BLOGMODE', false); //false - все могут создавать треды, true - только админ может создавать треды.
define('BOARD_PAGETITLE', 'Исходочан'); // Название борды
define('BOARD_ADMINPASS',  "12345"); // Пароль админ-панели
define('BOARD_MODPASS',    ""); // Оставьте пустым, чтобы отключить
define('BOARD_THREADSPERPAGE', 15);
define('BOARD_REPLIESTOSHOW',  0);
define('BOARD_MAXTHREADS',     0);    // 0 отключает удаление старых тредов
define('BOARD_DELETE_TIMEOUT', 999);  // секунд для удаления своих постов
define('BOARD_MAXPOSTSIZE',    500); // Characters
define('BOARD_RATELIMIT',      1);   // Delay between posts from same IP
define('BOARD_TRIPSEED',   "securetrips");
define('BOARD_USECAPTCHA',   false);
define('BOARD_CAPTCHASALT',  'captchasalt');
define('BOARD_THUMBWIDTH',  200);
define('BOARD_THUMBHEIGHT', 300);
define('BOARD_REPLYWIDTH',  200);
define('BOARD_REPLYHEIGHT', 300);
define('BOARD_TIMEZONE',   ''); // Leave blank to use server default timezone
define('BOARD_DATEFORMAT', '');
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
        <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>$page_title</title>   
<!--Cтили-->
<link type="text/css" rel="stylesheet" id="theme" href="css/theme1.css" />
<script type="text/javascript" src="css/jquery.min.js"></script>
<style>
*{font-size:16px;}

body{
width:180px;
color: #000;
font-size: 13pt;
font-family: 'Noto Sans', sans-serif;
margin:0;
cursor: default;
}

.replylink{
	float:right;
	padding:15px 0 15px 0;
	opacity: 0.5;
	}


a,a{color:#696969;text-decoration:none;}
a:hover{text-decoration:underline;color:#000;transition:2s;}
a:not(:hover) {transition: 3s;}


/* спойлер2 */
.spoiler > input + label:after{content: "+";float: right;font-family: monospace;font-weight: bold;}
.spoiler > input:checked + label:after{content: "-";float: right;font-family: monospace;font-weight: bold;}
.spoiler > input{display:none;}
.spoiler > input + label + .spoiler_body{display:none;}
.spoiler > input:checked + label + .spoiler_body{display: block;}

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
	font-size: 15px;
}
.input:hover { text-decoration: none; }

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
	font-size: 15px;
}
.btn:hover {text-decoration: none;}
.reply #formfap {width: 120px;}

.config{
    display: none;
}
::-webkit-scrollbar{
    width:0px;
}
img {
  -webkit-filter: grayscale(100%);
  -moz-filter: grayscale(100%);
  -ms-filter: grayscale(100%);
  -o-filter: grayscale(100%);
  filter: grayscale(100%);
  filter: gray; /* IE 6-9 */
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
		    
	   </head>
	   <body>
EOF;
        return $return;
}
function pageFooter() {
        return <<<EOF
		</div>
        </body>
</html>
EOF;
}
function buildPost($post, $isrespage) {
  	    $return = "";
        $threadid = ($post['parent'] == 0) ? $post['id'] : $post['parent'];
        $postlink = '?do=thread&id='.$threadid.'#'.$post['id'];
        $image_desc = '';

        if ($post["parent"] != 0) {
                $return .= <<<EOF
<table>
        <tbody>
                <tr>
                        <td class="reply" id="reply${post["id"]}">
EOF;
}
        $return .= <<<EOF
		
EOF;
        if ($post['parent'] == 0 && !$isrespage) {
                $note = isLocked($threadid) ? '<img title="Борда мертва чуть менее чем полностью" src="img/lock.svg" width="20" align="left">' : ''; //&#x1f512;
                $return .=
"<span class=\"replylink\">${note}&nbsp;<a title=\"Открыть в вики\" href=\"https://wiki.1chan.ca/${post["name"]}\" target=\"board\"><img src=\"img/info.svg\" width=\"20\" align=\"left\"></a><a title=\"Обсудить борду\" href=\"board.php?do=thread&id=${post["id"]}\" target=\"board\"><img src='img/comment.svg' width='20' align='right'></a>&nbsp;</span>"
                ;
        }
        if (IS_ADMIN) {
                $return .= <<<EOF
		<a href="?do=delpost&id={$post['id']}" title="Удалить" />Х</a> <a name="${post['id']}"></a>
EOF;
}
        if ($post["subject"] != "") {
                $return .= "<span class=\"menu\"><a href='${post["subject"]}' target=\"board\"><img src='https://www.google.com/s2/favicons?domain=${post["subject"]}' width='16'>${post["name"]}</a></span>			
				";
        }
        if ($post['parent'] == 0) {
                $return .= <<<EOF
                        </td>
                </tr>
        </tbody>
</table>
EOF;
        }
        return $return;
}		
function buildPostBlock($parent) {

$body = '
<div class="reply">
<div class="spoiler">
<input type="checkbox" id="spoilerid_2"><label for="spoilerid_2">Добавить борду
</label><div class="spoiler_body">

<div id="postarea">
<form name="postform" id="postform" action="?do=post" method="post" enctype="multipart/form-data">
<input type="hidden" name="parent" value="'.htmlspecialchars($parent).'">


<input id="formfap" class="input" type="text" name="name" placeholder="Название борды"> 
<input id="formfap" class="input" type="text" name="subject" placeholder="http://">
<textarea id="formfap" class="config" name="message" cols="15" rows="0" placeholder="Описание"></textarea>						

        ';
        $post_button_name = ($parent) ? 'Ответить в тред' : 'Добавить';
        $opt_bump_thread = ($parent) ? '<label><input type="checkbox" name="bump" id="bump" checked>Bump</label>' : '';
        $opt_modpost = LOGGED_IN ? '<label><input type="checkbox" name="modpost" id="modpost">Модпост</label>' : '';
        $opt_rawhtml = ($parent) ? '<label><input type="checkbox" name="rawhtml" id="rawhtml">RawHTML</label>' : '';
        $body .= '
<center><input id="formfap" class="btn" type="submit" value="'.$post_button_name.'"></center>
</center>
</form> 
</div>
</div>
</div>
</div>
<br>
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
                        " ⬛ " :
                        ' <a href="?do=page&p=' .($thispage-1). '">⬛</a> '
                ;              
                for ($i = 0;$i <= $pages;$i++) {
                        $pagelinks .= ($thispage == $i) ? " $i " : " <a href=\"?do=page&p=$i\">$i</a> ";
                }              
                $pagelinks .= ($pages <= $thispage) ?
                        " ⬛ " :
                        ' <a href="?do=page&p='.($thispage+1). '">⬛</a> '
                ;
        } else {
                $returnlink = '<span class="replylink"><a href="?">Назад</a>';
                if (LOGGED_IN) {
                        if ($locked) {
                                $returnlink .= ' | <a alt="Открыть тред" href="?do=lock&id='.$parent.'">🔓</a>';
                        } else {
                                $returnlink .= ' | <a alt="Закрыть тред" href="?do=lock&id='.$parent.'">🔐</a>';                         
                        }
                }
                $returnlink .= '</span>';
        }
        $body = '
        <body onLoad="onFirstLoad();">';
		//шапка борды
$body = '<center>
<div class="reply">
<label class="tab"><a href="?">Обновить</a></label>
<br>
<div class="spoiler">
<input type="checkbox" id="spoilerid_1"><label for="spoilerid_1">
Настройки
</label><div class="spoiler_body">
<br>
Тема сайта:
<br>
    <a href="javascript: void(0)" title="Светлая тема" id="theme1">Photon Light</a> 
	<br>
    <a href="javascript: void(0)" title="Ночная тема" id="theme2">Photon Night</a>
	<br>
<br>
    <a href="javascript: void(0)" title="Буричан" id="theme3">Burichan</a> 
	<br>
    <a href="javascript: void(0)" title="Футаба" id="theme4">Futaba</a>
	<br>
	<a href="javascript: void(0)" title="Мята" id="theme5">0chan</a>
	<br>
	<a href="javascript: void(0)" title="Бразильчан" id="theme6">brchan</a>
	<br>
<br>
</div></div></div>
</center>';
        if ($locked) {
                $body .= '<div class="replymode">Обсуждение закрыто 🔒</div>';
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
<center>
<div class="pagelinks"><center>$pagelinks</center></div>	
<br>
</center>	
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
                $htmlposts[] = buildPost($thread, false) . implode("", array_reverse($htmlreplies)) . "\n";
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
function cleanString($string) {
        return str_replace(array("<", ">", '"'), array("&lt;", "&gt;", "&quot;"), $string);
}
function fancyDie($message, $depth=1) {
        die('<!DOCTYPE html>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
<link type="text/css" rel="stylesheet" id="theme" href="css/theme1.css" />
<script type="text/javascript" src="css/jquery.min.js"></script>

<style>
*{font-size:16px;}
html{width:100%;margin:0;padding:0;}
body{
width:180px;
color : #000;
font-family : Roboto, Sans;
line-height : 1.3;
letter-spacing : 0;
margin: 0;
cursor : default;
}
</style>  

<body>
'.$body = '<div class="adminbar">
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
        $output .= '</span>';
        return $output . ' ';
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
                checkMessageSize();
                checkFlood();
        }
        // Get options
        $modpost = (LOGGED_IN && isset($_POST['modpost']));
        $rawhtml = (isset($_POST['rawhtml']));
        $bump    = (isset($_POST['bump']));    
        // Validate captcha if necessary
        if (BOARD_USECAPTCHA && ! LOGGED_IN) {
                if($_POST['kapcha'] != $_SESSION['rand_code']) 
 {
                        fancyDie('Неправельная капча');
                }
        }
        $post = newPost();
        $post['parent'] = setParent();
        $post['ip'] = $_SERVER['REMOTE_ADDR'];
        list($post['name'], $post['tripcode']) = nameAndTripcode($_POST["name"]);
        $post['name'] = cleanString(substr($post['name'], 0, 75));
        $post['email'] = ''; // Deprecated
        $post['subject'] = isset($_POST['subject']) ? cleanString(substr($_POST["subject"], 0, 75)) : '';
        $post['password'] = ''; // Deprecated
        // Options
        if ($modpost) {
                $modposttext = IS_ADMIN ? ' <span class="moderator">🦉</span>' : ' <span class="moderator">Ханси-модер</span>';               
        } else {
                $modposttext = '';             
        }
        if ($rawhtml) {
                $post['message'] = $_POST["message"];
        
        }
        $post['nameblock'] = nameBlock($post['name'], $post['tripcode'], $post['email'], time(), $modposttext);
        // Manage file uploads

                if (str_replace('<br>', '', $post['subject']) == "") {
                        fancyDie("Вы не ввели ссылку на борду.");
                }
				if (str_replace('<br>', '', $post['name']) == "") {
                        fancyDie("Вы не ввели название борды.");
                }
        $post['id'] = insertPost($post);
        $redirect = '?do=page&p=0';
        trimThreads();
        if ($post['parent'] != '0' && $bump) bumpThreadByID($post['parent']);
}

?>
