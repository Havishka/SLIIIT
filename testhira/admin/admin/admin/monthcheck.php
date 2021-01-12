<?php

function quick_enquiry($month)
{

	$date = date('Y-m-d');

	$newdate = strtotime ( '-'.$month.' month' , strtotime ( $date ) ) ;

	$s_mount = date ( 'Y-m' , $newdate );

	$month_name = date ( 'F' , $newdate );

	$start_date = $s_mount.'-01';

	$end_date = $s_mount.'-31';

	$result = 'label: "'.$month_name.'", y: '.$count;

	return $result;

}

echo quick_enquiry(0).'<br>';
echo quick_enquiry(1).'<br>';
echo quick_enquiry(2).'<br>';
echo quick_enquiry(3).'<br>';
echo quick_enquiry(4).'<br>';

?>