<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

if($_SERVER["HTTP_HOST"] == "localhost" || $_SERVER["HTTP_HOST"] == "192.168.1.135") 
{
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "docustudy";

}else{

	$hostname = "localhost";
	$username = "docustudy";
	$password = "#ikLWt9dCash";
	$dbname = "docustudy";

}

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => $hostname,
	'username' => $username,
	'password' => $password,
	'database' => $dbname,
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
