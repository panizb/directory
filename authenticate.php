<?php
include 'Authentication.php';
header('Content-Type: application/json');

    
 $aResult = array();

if (!isset($_POST['functionname'])) {
    $aResult['error'] = 'No function name!';
}

if (!isset($_POST['arguments'])) {
    $aResult['error'] = 'No function arguments!';
}

if (!isset($aResult['error'])) {
    if ($_POST['functionname']=='validate') {
        if (!is_array($_POST['arguments']) || (count($_POST['arguments']) < 1)) {
               $aResult['error'] = 'Error in arguments!';
        } else {
               $aResult['result'] = validate(($_POST['arguments'][0]));
        }
    }
}

    echo json_encode($aResult);


public function validate($Email)
{

    $auth = new directory\Authentication();
    $result = $auth.isAmember($Email);
    if ($result) {
        return"yes";
    } else {
        return "no";
    }
}
