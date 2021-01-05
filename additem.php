<?php
$q = $_REQUEST["q"];
// lookup all hints from array if $q is different from ""
if ($q !== "") 
{	$myfile = fopen("ToDoData.php", "a");
	fwrite($myfile, ",\n\"".$q."\"");
	// some code to be executed....
	fclose($myfile);
}
?>
