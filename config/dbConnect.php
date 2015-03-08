<?php
$link = mysql_connect('localhost', 'root', 'shazad');
//mysql_connect('host', 'user', 'password');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('invite_workspaces', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}


?>
