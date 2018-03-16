<?php
$webcamFolder = $_SERVER['DOCUMENT_ROOT'].'/192.168.0.64';
echo $webcamFolder;
if ($handle = opendir($webcamFolder)) {
	$t = array();
	$i = 0;
    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != ".." && $entry != "files.php" ) {
		$t[date('F d Y, H:i:s',filemtime($entry))] = $entry;
            //echo "$entry\n";
		$i++;
		
        }
    }

    closedir($handle);
krsort($t);
$r = array();
foreach($t as $k)
{
	array_push($r,$k);
}
echo("<pre>");
print_r($t);
echo("</pre>");
echo("<pre>");
print_r($r[0]);
echo("</pre>");
}
?>