<?php
 session_start();
 unset($_SESSION['my_login']);
 header("location: index.php");