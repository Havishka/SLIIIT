<?php


$emp_id = '22077';
$user_id = '509';


function get_emp_name($uid)
{
	
	include 'crewpoint_config.php';
	$select_name = mysql_fetch_assoc(mysql_query("select field_name_value from field_data_field_name where entity_id='$uid'"));
	$emp_name = $select_name['field_name_value'];
	return $emp_name;
}

function get_emp_email($uid)
{
	include 'crewpoint_config.php';
	$select_email = mysql_fetch_assoc(mysql_query("select mail from users where uid='$uid'"));
	$emp_email = $select_email['mail'];
	return $emp_email;
}

function get_emp_phone($uid)
{
	include 'crewpoint_config.php';
	$select_phone = mysql_fetch_assoc(mysql_query("select field_phone_value from field_data_field_phone where entity_id='$uid'"));
	$emp_phone = $select_phone['field_phone_value'];
	return $emp_phone;
}

function get_emp_head($uid)
{
	
	include 'crewpoint_config.php';
	$select_head = mysql_fetch_assoc(mysql_query("select field_emp_id_head_value from field_revision_field_emp_id_head where entity_id='$uid'"));
	$rep_head_id = $select_head['field_emp_id_head_value'];
	
	$select_uid = mysql_fetch_assoc(mysql_query("select uid from users where name='$rep_head_id'"));
	
	$head_name = get_emp_name($select_uid['uid']);
	
	return $head_name;
}

function get_emp_head_email($uid)
{
	
	include 'crewpoint_config.php';
	$select_head = mysql_fetch_assoc(mysql_query("select field_emp_id_head_value from field_revision_field_emp_id_head where entity_id='$uid'"));
	$rep_head_id = $select_head['field_emp_id_head_value'];
	
	$select_uid = mysql_fetch_assoc(mysql_query("select uid from users where name='$rep_head_id'"));
	
	$head_email = get_emp_email($select_uid['uid']);
	
	return $head_email;
}

?>