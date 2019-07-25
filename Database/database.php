<?php

define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DB_NAME','expensesmgt');

$cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());



?>