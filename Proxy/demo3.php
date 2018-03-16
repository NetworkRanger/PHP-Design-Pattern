<?php
header('Content-Type:text/html; charset=utf-8');

$db = Factory::getDatabase('slave');
$info = $db->query('select * from user where id=1');
var_dump($info);

$db = Factory::getDatabase('master');
$db->query("update user set name='suse' where id =1");

