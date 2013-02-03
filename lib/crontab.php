<?php
/**
 * @author Ryan Faerman <ryan.faerman@gmail.com>
 * @version 0.1
 * @package PHPCronTab
 *
 * Copyright (c) 2009 Ryan Faerman <ryan.faerman@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 */
 
class Crontab {
	
	/**
	 * Location of the crontab executable
	 * @var string
	 */
	var $crontab = '/usr/bin/crontab';
	
	/**
	 * Location to save the crontab file.
	 * @var string
	 */
	var $destination = '/tmp/CronManager';
	
	/**
	 * Minute (0 - 59)
	 * @var string
	 */
	var $minute	= '*';
	
	/**
	 * Hour (0 - 23)
	 * @var string
	 */
	var $hour = '*';
	
	/**
	 * Day of Month (1 - 31)
	 * @var string
	 */
	var	$dayOfMonth = '*';
	
	/**
	 * Month (1 - 12) OR jan,feb,mar,apr...
	 * @var string
	 */
	var $month = '*';
	
	/**
	 * Day of week (0 - 6) (Sunday=0 or 7) OR sun,mon,tue,wed,thu,fri,sat
	 * @var string
	 */
	var $dayOfWeek = '*';
	
	/**
	 * @var array
	 */
	var $jobs = array();
	
	function Crontab() { }
	
	/**
	* Set minute or minutes
	* @param string $minute required
	* @return object
	*/
	function onMinute($minute) {
		$this->minute = $minute;
		return $this;
	}
	
	/**
	* Set hour or hours
	* @param string $hour required
	* @return object
	*/
	function onHour($hour) {
		$this->hour = $hour;
		return $this;
	}
	
	/**
	* Set day of month or days of month
	* @param string $dayOfMonth required
	* @return object
	*/
	function onDayOfMonth($dayOfMonth) {
		$this->dayOfMonth = $dayOfMonth;
		return $this;
	}
	
	/**
	* Set month or months
	* @param string $month required
	* @return object
	*/
	function onMonth($month) {
		$this->month = $month;
		return $this;
	}
	
	/**
	* Set day of week or days of week
	* @param string $minute required
	* @return object
	*/
	function onDayOfWeek($dayOfWeek) {
		$this->dayOfWeek = $dayOfWeek;
		return $this;
	}
	
	/**
	* Set entire time code with one function. This has to be a complete entry. See http://en.wikipedia.org/wiki/Cron#crontab_syntax
	* @param string $timeCode required
	* @return object
	*/
	function on($timeCode) {
		list(
			$this->minute, 
			$this->hour, 
			$this->dayOfMonth, 
			$this->month, 
			$this->dayOfWeek
		) = explode(' ', $timeCode);
		
		return $this;
	}
	
	/**
	* Add job to the jobs array. Each time segment should be set before calling this method. The job should include the absolute path to the commands being used.
	* @param string $job required
	* @return object
	*/
	function doJob($job) {
		$this->jobs[] =	$this->minute.' '.
						$this->hour.' '.
						$this->dayOfMonth.' '.
						$this->month.' '.
						$this->dayOfWeek.' '.
						$job;
		
		return $this;
	}
	
	/**
	* Save the jobs to disk, remove existing cron
	* @param boolean $includeOldJobs optional
	* @return boolean
	*/
	function activate($includeOldJobs = true) {
		$contents  = implode("\n", $this->jobs);
		$contents .= "\n";
		
		if($includeOldJobs) {
			$oldJobs = $this->listJobs();
			foreach ($oldJobs as $job) {
				$contents .= $job;
				$contents .= "\n";
			}
		}
		
		if(is_writable($this->destination) || !file_exists($this->destination)){
			exec($this->crontab.' -r;');
			file_put_contents($this->destination, $contents, LOCK_EX);
			exec($this->crontab.' '.$this->destination.';');
			return true;
		}
		
		return false;
	}

	/**
	* Deletes all crontab entries.
	*/
	function deleteAllJobs() {
		if(is_writable($this->destination) || !file_exists($this->destination)){
			exec($this->crontab.' -r;');
			file_put_contents($this->destination, '', LOCK_EX);
			exec($this->crontab.' '.$this->destination.';');
			return true;
		}
	}

	/**
	* Deletes a specific crontab entry.
	*/
	function deleteJob($id) {
		$allJobs = $this->listJobs();
		foreach ($allJobs as $key => $job) {
			if($key == $id) {
				unset($allJobs[$key]);
			}
		}

		// Update the crontab
		$this->deleteAllJobs();

		$contents = '';
		foreach ($allJobs as $job) {
			$contents .= $job;
			$contents .= "\n";
		}
		
		if(is_writable($this->destination) || !file_exists($this->destination)){
			exec($this->crontab.' -r;');
			file_put_contents($this->destination, $contents, LOCK_EX);
			exec($this->crontab.' '.$this->destination.';');
			return true;
		}
	}
	
	/**
	* List current cron jobs
	* @return string
	*/
	function listJobs() {
		$result = exec($this->crontab.' -l;', $output, $retval);
		return $output;
	}
}

?>