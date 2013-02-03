<?php

	require_once('crontab.php');

	$cron = new Crontab();
	$cron->deleteJob($_POST['jobid']);

?>