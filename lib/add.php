<?php

	require_once('crontab.php');

	$cron = new Crontab();

	if(isset($_POST['minute']) && $_POST['minute'] != '') $cron->onMinute($_POST['minute']);
	if(isset($_POST['hour']) && $_POST['hour'] != '') $cron->onHour($_POST['hour']);
	if(isset($_POST['month']) && $_POST['month'] != '') $cron->onMonth($_POST['month']);
	if(isset($_POST['dayweek']) && $_POST['dayweek'] != '') $cron->onDayOfWeek($_POST['dayweek']);
	if(isset($_POST['daymonth']) && $_POST['daymonth'] != '') $cron->onDayOfMonth($_POST['daymonth']);
	if(isset($_POST['command']) && $_POST['command'] != '') $cron->doJob($_POST['command']);	

	if($cron->activate()) {
		echo json_encode($cron);
	} else {
		echo false;
	}

?>