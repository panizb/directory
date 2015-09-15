<?php
$refreshToken = $_POST['code'];
//ridi
$myfile = fopen("code.txt", "w") or die("Unable to open file!");
fwrite($myfile, $refreshToken);
fclose($myfile);
echo $refreshToken;
