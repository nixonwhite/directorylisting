<?php
$ver = "0.0.13.4-alpha";

// Huge piece of HTML
$l = "<?xml version=\"1.0\" encoding=\"cp1251\"?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">
<head>
<title>Directory listing</title>
<style type=\"text/css\">
a, a:active {text-decoration: none; color: blue;}
a:visited {color: #48468F;}
a:hover, a:focus {text-decoration: underline; color: red;}
body {background-color: #F5F5F5;}
h2 {margin-bottom: 12px;}
table {margin-left: 12px;}
th, td { font: 90% monospace; text-align: left;}
th { font-weight: bold; padding-right: 14px; padding-bottom: 3px;}
td {padding-right: 14px;}
td.s, th.s {text-align: right;}
div.list { background-color: white; border-top: 1px solid #646464; border-bottom: 1px solid #646464; padding-top: 10px; padding-bottom: 14px;}
div.foot { font: 90% monospace; color: #787878; padding-top: 4px;}
</style>
</head>
<body><h2>Content:</h2><div class=\"list\"><table summary=\"Directory Listing\" cellpadding=\"0\" cellspacing=\"0\">
<thead><tr><th class=\"n\">Name</th><th class=\"m\">Last Modified</th><th class=\"s\">Size</th><th class=\"t\">Type</th></tr></thead><tbody>";

//directories
$dir = opendir(".");
while ($d = readdir($dir)) {
	if (!is_file($d) /*&& 
		($d != "some_dir") && //list of excluded dirs
		($d != "report") && 
		($d != "log")*/) { 
			$l=$l."<tr><td class=\"n\"><img src=\"./folder.ico\" height=\"12\">&nbsp;<b><a href=\"$d\">$d</a>/</td><td class=\"m\">".date("F d Y H:i:s",@fileatime($d))."</td><td class=\"s\"></td><td class=\"t\">Directory</td></b></tr>";
	}
}

//files
$dir = opendir(".");
while ($d = readdir($dir)) {
	if (is_file($d) && 
		($d != "index.php") &&  //list of excluded files
		($d != "index.html") && 
		($d != "favicon.ico") &&
		($d != "folder.ico")) { 
			$l = $l."<tr><td class=\"n\"><a href=\"$d\">$d</a></td><td class=\"m\">".date("F d Y H:i:s",@fileatime($d))."</td><td class=\"s\">".@filesize($d)."</td><td class=\"t\">File</td></tr>";
	}
}

$l = $l."</tbody></table></div><div class=\"foot\"></div><p>Directory listing v.".$ver."</p></body></html>";
echo $l;
?>