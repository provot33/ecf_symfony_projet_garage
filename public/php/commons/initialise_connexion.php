<?php
session_name();
session_start();
$_SESSION['LOGIN']=$_POST['Login'];
$_SESSION['PASSWORD']=$_POST['Password'];
Header('Location:/php/gestion/index.php');
?>