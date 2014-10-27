# PHP timer/Benchmarking class

A simple, high performance, easy to use PHP timer and benchmarking class.

* Set checks in your code and print a summary.
* Timer iterations to get averages, maxes and minimums
* Set checks within iterations

## Installation

* Include ```timer.php```
* Create a ```new Timer()```

## Examples


### Include the stylesheet:
```
<link rel="stylesheet" type="text/css" href="timer.min.css" />

```

### Set up the timer
```
<?php
include 'timer.php'.
$timer = new Timer(
	"Starting timer", // Starts timer
	"\n" 			   // Sets which linebreak to use
);
?>

```

### Options
```
$timer->
```

### Extended Examples:

```
<?php

include ('timer.php');

$timer = new Timer();
$timer->setAccuracy(6)				// Sets accuracy of output
    ->setPrintAllIterations(false)  // Whether to print EVERY iteration
    ->setPrintTables(true)			// Whether to print the tables
    ->setRelative(true)				// Whether checks should be relative to one another or not
    ->setPrintSummary(true)			// Whether to print the summary
    ->setBottomBar(true)			// Whether to print in place, or as a fixed bottom bar (requires the CSS)
    ->start("Starting testing");	// Starts the timer
	
 
$timer->startIteration("Starting iterating"); // Starts iteration timing (good for benchmarks)
$l = iteratingFunction();					  // some iterating function...
$timer->stopIteration("Finished iterating");  // Stops iteration timing

$timer->printElapsedTime(); // Prints current elapsed time in microseconds e.g. 0.009788990020752

$timer->stop("Finshed"); // Stop the timer

$timer->printChecks();  // Prints the timing results (this is the recommended output method)

$timer->setBottomBar(false); // Stops it from printing as a bottom bar

$timer->printChecks(); // prints the checks

?>

<!--
<?php
$timer->printChecksComment(); // Prints summary tables in comment format (easily viewed in 'view source')
?>

-->

<?php

/** Example Output
------------------------------------------------------------------------
|       Check Name        | avg          | max          | min          |
|    Finished Sleeping    | 0.000982s    | 0.001164s    | 0.000768s    |
------------------------------------------------------------------------
---------------------------------------------
|      Check Name       |   Time Taken (s)  |
---------------------------------------------
| Starting testing      | 0.0000081062s     |
| Starting iterating    | 0.0000338554s     |
| Finished iterating    | 0.0098869801s     |
| Finshed               | 0.0000400543s     |
---------------------------------------------

*/

echo "<br/><br/>";
$timer->printTotalExecutionTime(); // echos total execution time in microseconds e.g. 0.009821891784668
echo "<br/><br/>";
$timer->printFullStats(); // echos total execution time
echo "<br/><br/>";
$timer->printrChecks(); // Prints raw checklist using php's 'print_r' enclosed in <pre> tags
echo "<br/><br/>";
 
function iteratingFunction($loops = 10){
	for($i = 0; $i < $loops; $i++){
		functionToIterate();
	}
}
 
function functionToIterate(){
	global $timer;
	$timer->iterate("Starting Sleeping");
	usleep(100);
	$timer->addCheck("Finished Sleeping");
	return true;
}
?>
```

# License

MIT License
===========

Copyright (c) 2014 Harry Mustoe-Playfair (Manticorp) <manticorp1234@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a
copy of this software and associated documentation files (the "Software"),
to deal in the Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense,
and/or sell copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
DEALINGS IN THE SOFTWARE.