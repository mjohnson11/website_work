
<?php
$txt = $_POST['txt'];
echo $txt;
$myfile = fopen("highscores.csv", "w") or die("Unable to open file!");
fwrite($myfile, $txt);
fclose($myfile);
?>
