<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/verification_session.php';

unset($_SESSION['LOGIN_COUNT']);
unset($_SESSION['LOGIN']);
unset($_SESSION['PASSWORD']);

Header('Location:/index.php');
?>