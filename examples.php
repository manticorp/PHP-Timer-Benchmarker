<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS & JS -->
        <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="timer.min.css">
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
				</div>
			</div>
		</div>
    </body>
</html>
