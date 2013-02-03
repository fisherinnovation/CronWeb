<?php

	require_once('crontab.php');

	$cron = new Crontab();
	$cron->deleteAllJobs();

?>