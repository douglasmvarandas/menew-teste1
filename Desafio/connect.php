<?php
$HOST= '127.0.0.1';
$USER= 'root';
$PASSWORD ='';
$DB ='agenda';

$connect = mysqli_connect($HOST, $USER, $PASSWORD, $DB, 3306) or die ('Não foi possivel estabelecer conexão.')

?>