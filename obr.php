<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.03.2018
 * Time: 14:03
 */
if(!$_POST) die();
include_once('db.php');
$value = $_POST['array'];
$page = $_POST['page'];
$key = $_POST['id'];
$change = $_POST['change'];
$start = new burn($value,$page,$key,$change);
$start -> start_burn();