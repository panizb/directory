<?php

namespace directory;

require 'Authentication.php';

$Email = $_POST['userID'];
$token = $_POST['id_token'];
$auth = new Authentication();
//three possible exceptions
try {
    $result = $auth->isAMember($Email, $token);
} catch (Exception $e) {
    echo $e->getMessage();
}
if ($result) {
    session_start();
    $_SESSION['id'] = $Email;
}
    echo $result;
