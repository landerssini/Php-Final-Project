<?php

session_start();
session_unset();
session_destroy();
header("location:./form-login.php");
exit();
