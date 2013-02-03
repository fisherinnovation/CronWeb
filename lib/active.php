<?php

	require_once('crontab.php');

	$cron = new Crontab();
	$active = $cron->listJobs();
	echo json_encode($active);

?>