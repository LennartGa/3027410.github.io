<?php
// read the orriginal file
$lines = file('ToDoData.php');
// get the line to delete
$q = $_REQUEST["q"];
if ($q !== "") 
{	$myfile = fopen("ToDoData.php", "w");
	foreach ($lines as $line_num => $line) 
	{	if ($q <> $line_num)
		{	fwrite($myfile, $line);
			
		}
	}
	fclose($myfile);
}

?>
