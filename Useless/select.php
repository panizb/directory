<?php
session_start();
echo $_SESSION['id'];
header('Location: edit.php?userID='.$_SESSION['id'].'&selected='.$_GET['selected'].'&index='.$_GET['index']);









