<?php

/**
 * Timer
 */

class Timer {

	/**
	 * accuracy
	 * @var datatype
	 */

	protected $accuracy = 10;

	/**
	 * lineBreak
	 * @var string
	 */

	private static $lineBreak;

	/**
	 * outputStyle
	 * @var string
	 */

	protected static $outputStyle;

	/**
	 * outputStyle
	 * @var string
	 */

	private $printAllIterations = false;

	/**
	 * outputStyle
	 * @var string
	 */

	private $printSummary = true;

	/**
	 * outputStyle
	 * @var string
	 */

	private $printTables = true;

	/**
	 * html
	 * @var boolean
	 */

	private $html = true;

	/**
	 * bottomBar
	 * @var boolean
	 */

	private $bottomBar = true;

	/**
	 * relative
	 * @var boolean
	 */

	private $relative = true;

	/**
	 * on
	 * @var boolean
	 */

	private $on = false;

	/**
	 * isIterating
	 * @var boolean
	 */

	private $isIterating = false;

	/**
	 * checks
	 * @var array
	 */

	private $checks = array();

	/**
	 * stopTime
	 * @var int
	 */

	private $stopTime;

	/**
	 * iteration
	 * @var int
	 */

	private $iteration = 0;

	/**
	 * startTime
	 * @var int
	 */

	private $startTime;

	/**
	 * isIters
	 * @var boolean
	 */

	private $isIters = false;

	/**
	 * setAccuracy
	 * @param int $value
	 * @return Timer
	 */
	public function setAccuracy($value) {
		$this->accuracy = $value;
		return $this;
	}
	/**
	 * getAccuracy
	 * @return $this->accuracy
	 */
	public function getAccuracy() {
		return $this->accuracy;
	}

	/**
	 * setLineBreak
	 * @param $value
	 * @return Timer
	 */
	public static function setLineBreak($value) {
		$this->lineBreak = $value;
		return $this;
	}
	/**
	 * getLineBreak
	 * @return string
	 */
	public static function getLineBreak() {
		return $this->lineBreak;
	}

	/**
	 * getOutputStyle
	 * @return string
	 */
	public static function getOutputStyle() {
		return $this->outputStyle;
	}

	/**
	 * getPrintAllIterations
	 * @return boolean
	 */
	public static function getPrintAllIterations() {
		return $this->printAllIterations;
	}

	/**
	 * setPrintAllIterations
	 * @param $value
	 * @return Timer
	 */
	public function setPrintAllIterations($value) {
		$this->printAllIterations = $value;
		return $this;
	}

	/**
	 * getPrintSummary
	 * @return boolean
	 */
	public static function getPrintSummary() {
		return $this->printSummary;
	}

	/**
	 * setPrintSummary
	 * @param $value
	 * @return Timer
	 */
	public function setPrintSummary($value) {
		$this->printSummary = $value;
		return $this;
	}

	/**
	 * getPrintTables
	 * @return boolean
	 */
	public static function getPrintTables() {
		return $this->printTables;
	}

	/**
	 * setPrintTables
	 * @param $value
	 * @return Timer
	 */
	public function setPrintTables($value) {
		$this->printTables = $value;
		return $this;
	}

	/**
	 * setIteration
	 * @param $value
	 * @return Timer
	 */
	public function setIteration($value) {
		$this->iteration = $value;
		return $this;
	}
	/**
	 * getIteration
	 * @return int
	 */
	public function getIteration() {
		return $this->iteration;
	}

	/**
	 * setStartTime
	 * @param $value
	 * @return Timer
	 */
	public function setStartTime($value) {
		$this->startTime = $value;
		return $this;
	}
	/**
	 * getStartTime
	 * @return int
	 */
	public function getStartTime() {
		return $this->startTime;
	}

	/**
	 * setStopTime
	 * @param $value
	 * @return Timer
	 */
	public function setStopTime($value) {
		$this->stopTime = $value;
		return $this;
	}
	/**
	 * getStopTime
	 * @return int
	 */
	public function getStopTime() {
		return $this->stopTime;
	}

	/**
	 * setChecks
	 * @param array $value
	 * @return Timer
	 */
	public function setChecks(array $value) {
		$this->checks = $value;
		return $this;
	}
	/**
	 * getChecks
	 * @return array
	 */
	public function getChecks() {
		return $this->checks;
	}

	/**
	 * getIsIterating
	 * @return boolean
	 */
	public function getIsIterating() {
		return $this->isIterating;
	}

	/**
	 * getOn
	 * @return boolean
	 */
	public function getOn() {
		return $this->on;
	}

	/**
	 * setRelative
	 * @param $value
	 * @return Timer
	 */
	public function setRelative($value) {
		$this->relative = $value;
		return $this;
	}
	/**
	 * getRelative
	 * @return boolean
	 */
	public function getRelative() {
		return $this->relative;
	}

	/**
	 * setBottomBar
	 * @param $value
	 * @return Timer
	 */
	public function setBottomBar($value) {
		$this->bottomBar = $value;
		return $this;
	}
	/**
	 * getBottomBar
	 * @return boolean
	 */
	public function getBottomBar() {
		return $this->bottomBar;
	}

	/**
	 * setHtml
	 * @param $value
	 * @return Timer
	 */
	public function setHtml($value) {
		$this->html = $value;
		return $this;
	}
	/**
	 * getHtml
	 * @return boolean
	 */
	public function getHtml() {
		return $this->html;
	}

	/**
	 * getIsIters
	 * @return boolean
	 */
	public function getIsIters() {
		return $this->isIters;
	}

	/**
	 * __construct
	 * @param string $check = null
	 * @return Timer
	 */
	public function __construct($check = null, $lbreak = "\n") {
		$this->lbreak = $lbreak;
		if ($check !== null) {
			$this->start($check);
		}
		// Set timezone
		date_default_timezone_set('UTC');
		return $this;
	}

	/**
	 * start
	 * @param string $check = null
	 * @return Timer
	 */
	public function start($check = null) {
		$this->startTime = microtime(true);
		$this->iteration = 0;
		$this->on        = true;
		$this->iterating = false;
		$this->isIters   = false;
		if ($check != null) {
			$this->setCheck($check);
		}

		return $this;
	}

	/**
	 * stop
	 * @param string $check = null
	 * @return Timer
	 */
	public function stop($check = "Shut Down Timer") {
		if ($check !== null) {
			$this->setCheck($check);
		}

		$this->stopTime  = microtime(true);
		$this->on        = false;
		$this->iterating = false;
		return $this;

	}

	/**
	 * isOn
	 * @return boolean
	 */
	public function isOn() {
		return $this->on;
	}

	/**
	 * setCheck
	 * @param string $check
	 * @param int|boolean $iteration
	 * @return Timer
	 */
	public function setCheck($check, $iteration = false) {
		if ($this->iterating === true) {
			end($this->checks["_functionIteration"]);
			$lastKey                                                          = key($this->checks["_functionIteration"]);
			$this->checks["_functionIteration"][$lastKey][$this->iteration][] = array(
				"name" => $check,
				"time" => $this->getElapsedTime()
			);
		} else {
			$this->checks[] = array(
				"name" => $check,
				"time" => $this->getElapsedTime()
			);
		}
		return $this;
	}

	/**
	 * addCheck
	 * @param string $check
	 * @param boolean $iteration
	 * @return Timer
	 */
	public function addCheck($check, $iteration = false) {
		return $this->setCheck($check);
	}

	/**
	 * startIteration
	 * @param string $check
	 * @return Timer
	 */
	public function startIteration($check = "Starting Iteration") {
		if ($check !== null) {$this->setCheck($check);
		}

		$this->iterating = true;
		if ($this->isIters === false) {
			$this->checks["_functionIteration"] = array();
		}
		end($this->checks["_functionIteration"]);
		$lastKey                                                = key($this->checks["_functionIteration"]);
		$this->checks["_functionIteration"][$lastKey]["_start"] = array(
			"time" => $this->getElapsedTime()
		);
		$this->isIters = true;
		return $this;
	}

	/**
	 * stopIteration
	 * @param string $check
	 * @return Timer
	 */
	public function stopIteration($check = "Stopping Iteration") {
		$this->iterating = false;
		$this->iteration = 0;
		if ($check !== null) {$this->setCheck($check);
		}

		return $this;
	}

	/**
	 * startIters
	 * @param string $check
	 * @return Timer
	 */
	public function startIters($check = "Starting Iteration") {
		return $this->startIteration();
	}

	/**
	 * stopIters
	 * @param string $check
	 * @return Timer
	 */
	public function stopIters($check = "Stopping Iteration") {
		return $this->stopIteration();
	}

	/**
	 * stopIters
	 * @return Timer
	 */
	public function iterate() {
		$this->iteration++;
		return $this;
	}

	/**
	 * printChecks
	 * @return Timer
	 */
	public function printChecks() {
		if ($this->html === true) {
			echo $this->getChecksFormatted();
		} else {
			$this->printrChecks();
		}
	}

	/**
	 * printChecksComment
	 * @return Timer
	 */
	public function printChecksComment() {
		echo $this->getChecksComment();
		return $this;
	}

	/**
	 * printrChecks
	 * @return Timer
	 */
	public function printrChecks() {
		echo "<pre>";
		print_r($this->checks);
		echo "</pre>";
		return $this;
	}

	/**
	 * printElapsedTime
	 * @return Timer
	 */
	public function printElapsedTime() {
		echo $this->getElapsedTime();
		return $this;
	}

	/**
	 * printTotalExecutionTime
	 * @return Timer
	 */
	public function printTotalExecutionTime() {
		echo $this->getTotalExecutionTime();
		return $this;
	}

	/**
	 * printFullStats
	 * @return Timer
	 */
	public function printFullStats() {
		if (!$this->stopTime) {
			return false;
		}

		echo $this->lbreak . $this->lbreak;
		echo "Script start date and time: " .
		$this->getDateTime($this->startTime);
		echo $this->lbreak;
		echo "Script stop end date and time: " .
		$this->getDateTime($this->stopTime);
		echo $this->lbreak . $this->lbreak;
		echo "Total execution time: " . $this->getExecutionTime(
			$this->stopTime);
		echo $this->lbreak . $this->lbreak;
		return $this;
	}

	/**
	 * getChecksFormatted
	 * @return string
	 */
	public function getChecksFormatted() {
		$container = "<div class='manticorp-timing-container";
		if ($this->bottomBar) {
			$container .= " manticorp-timing-bottom-bar";
		}
		$container .= "' style='" . self::$outputStyle . "'>";

		$overallStats = array(
			"totalExecutionTime" => $this->getTotalExecutionTime()
		);

		if ($this->isIters === true) {$overallStats["iterations"] = array();
		}

		$output                 = "";
		$t                      = 0;
		$this->relative ? $text = "Taken" : $text = "Elapsed";
		if ($this->isIters === true) {
			foreach ($this->checks["_functionIteration"] as $itNum => $it) {
				$t = $startTime = $it["_start"]["time"];
				unset($it["_start"]);
				$itNum = $itNum + 1;
				$output .= "<div class='manticorp-timing-iterators-table-title manticorp-timing-title'>Iterator $itNum</div>";
				$amntChecks = count(current($it));
				$amntIters  = count($it);
				end($it);
				$lastIter = key($it);
				reset($it);
				$firstIter  = key($it);
				$checkNames = array();
				foreach (current($it) as $k => $check) {
					$checkNames[] = $check["name"];
				}
				end($checkNames);
				$lastKey = key($checkNames);
				reset($checkNames);
				$output .= "<table class='mainticorp-timing-iterators-table'>
	                <tr><th>Check Name</th>";
				if ($this->printAllIterations) {
					for ($i = $firstIter; $i <= $firstIter + $amntIters - 1; $i++) {
						$output .= "<th>Iteration $i</th>";
					}
				}
				$output .= "<th>avg</th><th>max</th><th>min</th></tr>";

				$overallStats["iterations"][$itNum]['_total']["avgExecutionTime"]   = 0;
				$overallStats["iterations"][$itNum]['_total']["totalExecutionTime"] = 0;
				$overallStats["iterations"][$itNum]['_total']["maxExecutionTime"]   = 0;
				$overallStats["iterations"][$itNum]['_total']["minExecutionTime"]   = 0;
				foreach ($checkNames as $key => $check) {
					$output .= "<tr><th> $check </th>";
					$val = array();
					for ($i = $firstIter; $i <= $firstIter + $amntIters - 1; $i++) {
						$prevIter = $firstIter;
						if ($key == 0) {
							$prevKey = $amntChecks - 1;
							if ($i != $firstIter) {
								$prevIter--;
							}
						} else {
							$prevKey = $key - 1;
						}
						$prevIter = $i - 1;
						if ($this->relative) {
							if ($key === 0) {
								if ($i === $firstIter) {
									$t = $startTime;
								} else {
									$t = $it[$prevIter][$lastKey]["time"];
								}
							} else {
								$t = $it[$i][$prevKey]["time"];
							}
						}
						$val[$i] = $it[$i][$key]["time"]-$t;
						if ($this->printAllIterations) {
							$output .= "<td>" . number_format($val[$i], $this->accuracy) . "</td>";
						}
					}

					$overallStats["iterations"][$itNum][$check]["avgExecutionTime"]   = array_sum($val) / $amntIters;
					$overallStats["iterations"][$itNum][$check]["totalExecutionTime"] = array_sum($val);
					$overallStats["iterations"][$itNum][$check]["maxExecutionTime"]   = max($val);
					$overallStats["iterations"][$itNum][$check]["minExecutionTime"]   = min($val);

					$overallStats["iterations"][$itNum]['_total']["avgExecutionTime"] += array_sum($val) / $amntIters;
					$overallStats["iterations"][$itNum]['_total']["totalExecutionTime"] += array_sum($val);
					$overallStats["iterations"][$itNum]['_total']["maxExecutionTime"] += max($val);
					$overallStats["iterations"][$itNum]['_total']["minExecutionTime"] += min($val);

					$output .= "<td class='manticorp-timing-time'>" . number_format($overallStats["iterations"][$itNum][$check]["avgExecutionTime"], $this->accuracy) .
					"</td>";
					$output .= "<td class='manticorp-timing-time'>" . number_format($overallStats["iterations"][$itNum][$check]["maxExecutionTime"], $this->accuracy) . "</td>";
					$output .= "<td class='manticorp-timing-time'>" . number_format($overallStats["iterations"][$itNum][$check]["minExecutionTime"], $this->accuracy) . "</td>";
					$output .= "</tr>";
				}
				$output .= "</table>";
			}
		}
		($this->isIters === true) ? $add = 1 : $add = 0;
		if (count($this->checks) <= $add) {
			return;
		}
		$t = 0;
		$output .= "<div class='manticorp-timing-checks-table-title manticorp-timing-title'>Checks</div><table class='mainticorp-timing-checks-table'><tr><th>Check Name</th><th>Time $text (s)</th>";
		foreach ($this->checks as $key => $check) {
			if ($key !== "_functionIteration") {
				$output .= "<tr><th>" . $check["name"] . "</th><td class='manticorp-timing-time'>" .
				number_format(($check["time"]-$t), $this->accuracy) . "</td></tr>";
				if ($this->relative) {
					$t = $check["time"];
				}
			}
		}

		$output .= "</table>";

		if ($this->printSummary) {
			$container .= "<div class='manticorp-timing-overall-stats'><span class='manticorp-timing-title manticorp-timing-title-summary'>Summary</span>";
			$container .= "<div class='manticorp-timing-overall-stats-overall'>";
			$container .= "<div><span>Overall Execution Time: \t</span><span class='manticorp-timing-time'>" . number_format($overallStats["totalExecutionTime"], $this->accuracy) . "s</span></div>";
			$container .= "<div><span>Number of Checks: </span><span class='manticorp-timing-time'>" . count($this->checks) . "</span></div>";
			$container .= "</div>";
			if ($this->isIters === true) {
				foreach ($overallStats["iterations"] as $itNum => $itStats) {
					$container .= "<div class='manticorp-timing-overall-stats-iterators'><span class='manticorp-timing-title'>Iterator $itNum</span>";
					$container .= "<div><span>Total: <span class='manticorp-timing-time'>" . number_format($overallStats["iterations"][$itNum]["_total"]["totalExecutionTime"], $this->accuracy) . "s</span></span></div>";
					$container .= "<div><span>Avg: <span class='manticorp-timing-time'>" . number_format($overallStats["iterations"][$itNum]["_total"]["avgExecutionTime"], $this->accuracy) . "s</span></span></div>";
					$container .= "<div><span>Min: <span class='manticorp-timing-time'>" . number_format($overallStats["iterations"][$itNum]["_total"]["minExecutionTime"], $this->accuracy) . "s</span></span></div>";
					$container .= "<div><span>Max: <span class='manticorp-timing-time'>" . number_format($overallStats["iterations"][$itNum]["_total"]["maxExecutionTime"], $this->accuracy) . "s</span></span></div>";
					$container .= "</div>";
				}
			}
			$container .= "</div>";
		}// if($this->printSummary)

		if ($this->printTables) {
			$container .= $output;
		}
		$container .= "</div>";
		return $container;
	}

	public function repeatString($str = " ", $times = 2){
		$times = intval(($times*$times)/$times); // gets rid of negative numbers
		$s = '';
		while($times>0){
			$times--;
			$s .= $str;
		}
		return $s;
	}

	/**
	 * getChecksComment
	 * @return string
	 */
	public function getChecksComment() {
		$output                 = "";
		$t                      = 0;
		$this->relative ? $text = "Taken" : $text = "Elapsed";

		$overallStats = array(
			"totalExecutionTime" => $this->getTotalExecutionTime()
		);

		if ($this->isIters === true) {
			$overallStats["iterations"] = array();
        	foreach($this->checks["_functionIteration"] as $itNum => $it){
				$t = $startTime = $it["_start"]["time"];
				unset($it["_start"]);
				$itNum = $itNum + 1;
				$amntChecks = count(current($it));
				$amntIters  = count($it);
				end($it);
				$lastIter = key($it);
				reset($it);
				$firstIter  = key($it);
				$checkNames = array();
				foreach (current($it) as $k => $check) {
					$checkNames[] = $check["name"];
				}
				end($checkNames);
				$lastKey = key($checkNames);
				reset($checkNames);

				$maxlen  = max(array_map('strlen', $checkNames));
				$padding = $maxlen-(strlen("Check Name"));

				$paddingLeft  = $this->repeatString(' ',floor($padding/2));
				$paddingRight = $this->repeatString(' ',ceil($padding/2));

				$output .= $this->repeatString('-',65+$padding) . "\n|    {$paddingLeft}Check Name{$paddingRight}    |";
				if($this->printAllIterations){
					for ($i = $firstIter; $i <= $firstIter + $amntIters - 1; $i++) {
						$output .= "    Iteration $i    |    ";
					}
				}
				$output .= " avg          | max          | min          |\n";

				$overallStats["iterations"][$itNum]['_total']["avgExecutionTime"]   = 0;
				$overallStats["iterations"][$itNum]['_total']["totalExecutionTime"] = 0;
				$overallStats["iterations"][$itNum]['_total']["maxExecutionTime"]   = 0;
				$overallStats["iterations"][$itNum]['_total']["minExecutionTime"]   = 0;

				foreach ($checkNames as $key => $check) {
					$t = 0;
					$output .= "|    $check    ";
					$val = array();
					for ($i = $firstIter; $i <= $firstIter + $amntIters - 1; $i++) {
						$prevIter = $firstIter;
						if ($key == 0) {
							$prevKey = $amntChecks - 1;
							if ($i != $firstIter) {
								$prevIter--;
							}
						} else {
							$prevKey = $key - 1;
						}
						$prevIter = $i - 1;
						if ($this->relative) {
							if ($key === 0) {
								if ($i === $firstIter) {
									$t = $startTime;
								} else {
									$t = $it[$prevIter][$lastKey]["time"];
								}
							} else {
								$t = $it[$i][$prevKey]["time"];
							}
						}
						$val[$i] = $it[$i][$key]["time"]-$t;
						if ($this->printAllIterations) {
							$output .= "|    " . number_format($val[$i], 10) . "s    ";
						}
					}

					$overallStats["iterations"][$itNum][$check]["avgExecutionTime"]   = array_sum($val) / $amntIters;
					$overallStats["iterations"][$itNum][$check]["totalExecutionTime"] = array_sum($val);
					$overallStats["iterations"][$itNum][$check]["maxExecutionTime"]   = max($val);
					$overallStats["iterations"][$itNum][$check]["minExecutionTime"]   = min($val);

					$overallStats["iterations"][$itNum]['_total']["avgExecutionTime"] += array_sum($val) / $amntIters;
					$overallStats["iterations"][$itNum]['_total']["totalExecutionTime"] += array_sum($val);
					$overallStats["iterations"][$itNum]['_total']["maxExecutionTime"] += max($val);
					$overallStats["iterations"][$itNum]['_total']["minExecutionTime"] += min($val);

					$output .= "| " . number_format($overallStats["iterations"][$itNum][$check]["avgExecutionTime"], $this->accuracy) . "s    ";
					$output .= "| " . number_format($overallStats["iterations"][$itNum][$check]["maxExecutionTime"], $this->accuracy) . "s    ";
					$output .= "| " . number_format($overallStats["iterations"][$itNum][$check]["minExecutionTime"], $this->accuracy) . "s    ";
					$output .= "|\n";
				}
				$output .= $this->repeatString('-',65+$padding) . "\n";
			}
		}
		($this->isIters === true) ? $add = 1 : $add = 0;
		if (count($this->checks) <= $add) {
			return;
		}
		$t         = 0;
		$maxLength = 0;
		foreach ($this->checks as $key => $check) {
			if (($key !== "_functionIteration") && strlen($check["name"]) > $maxLength) {
				$maxLength = strlen($check["name"]);
			}
		}

		$numTabs    = ($maxLength - 17);
		$horizontal = $this->repeatString('-',$numTabs+44);
		$output .= "$horizontal\n|      Check Name";
		for ($i = 0; $i <= $numTabs; $i++) {
			$output .= " ";
		}
		$output .= "     |   Time $text (s)  |\n";
		$output .= "$horizontal\n";
		foreach ($this->checks as $key => $check) {
			if ($key !== "_functionIteration") {
				$numTabs = ($maxLength - strlen($check["name"]));
				$output .= "| " . $check["name"];
				for ($i = 1; $i <= $numTabs; $i++) {
					$output .= " ";
				}
				$output .= "    | " . number_format(($check["time"]-$t), 10) . "s     |\n";
				if ($this->relative) {
					$t = $check["time"];
				}
			}
		}
		$output .= "$horizontal";
		return $output;
	}

	/**
	 * getElapsedTime
	 * @return int|boolean
	 */
	public function getElapsedTime() {
		return $this->getExecutionTime(microtime(true));
	}

	/**
	 * getTotalExecutionTime
	 * @return int
	 */
	public function getTotalExecutionTime() {
		if ($this->stopTime === false) {
			return false;
		}
		return $this->getExecutionTime($this->stopTime);
	}

	/**
	 * getExecutionTime
	 * @return int
	 */
	public function getExecutionTime($time) {
		return $time - $this->startTime;
	}

	/**
	 * getFullStats
	 * @return array
	 */
	public function getFullStats() {
		if (!$this->stopTime) {
			return false;
		}

		$stats                         = array();
		$stats['startTime']            = $this->getDateTime($this->startTime);
		$stats['stopTime']             = $this->getDateTime($this->stopTime);
		$stats['total_execution_time'] = $this->getExecutionTime(
			$this->stopTime);

		return $stats;
	}

	/**
	 * getDateTime
	 * @param int $time
	 * @return DateTime
	 */
	public function getDateTime($time) {
		return date("Y-m-d H:i:s", $time);
	}

}