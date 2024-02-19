<?php
unset($_SESSION['LOGIN']);
unset($_SESSION['PASSWORD']);
Header('Location:/index.php');
?>