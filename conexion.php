<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'dario12345';
$dbname = 'appweb';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Ocurrio un error al conectarse al servidor mysql');
	mysql_select_db($dbname);
    //mysql_set_charset('utf8');

?>