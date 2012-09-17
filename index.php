<?php
$l = '<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Index of /</title>
<style type="text/css">
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
<body><h2>Directory listing</h2><div class="list"><table summary="Directory Listing" cellpadding="0" cellspacing="0">
<thead><tr><th class="n">Name</th><th class="m">Last Modified</th><th class="s">Size</th><th class="t">Type</th></tr></thead><tbody>';

//directories
$dir=opendir(".");
while ($d = readdir($dir)) {
	if (!is_file($d) /*&& 
		($d != 'some_dir') && 
		($d != 'report') && 
		($d != 'log')*/) { //list of excluded dirs
			$l = $l . "<tr><td class=\"n\"><b><a href=\"$d\">$d</a>/</td><td class=\"m\">".date("F d Y H:i:s",@fileatime($d))."</td><td class=\"s\"></td><td class=\"t\">Directory</td></b></tr>";
	}
}

//files
$dir=opendir(".");
while ($d = readdir($dir)) {
	if (is_file($d)/* && 
		($d != 'index.php') && 
		($d != 'index.html') && 
		($d != 'favicon.ico')*/) { //list of excluded files
			$l = $l . "<tr><td class=\"n\"><a href=\"$d\">$d</a></td><td class=\"m\">".date("F d Y H:i:s",@fileatime($d))."</td><td class=\"s\">".@filesize($d)."</td><td class=\"t\">File</td></tr>";
	}
}

$l = $l . '</tbody></table></div><div class="foot"></div><p>Directory listing v.0.0.11-alpha</p></body></html>';

echo $l;
?>