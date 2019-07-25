<?php
require __DIR__ . "/class.logsys.php";
\Fr\LS::config(array(
  "db" => array(
    "host" => "localhost",
    "port" => 3306,
    "username" => "root",
    "password" => "",
    "name" => "expensesmgt",
    "table" => "user",
  ),
  "features" => array(
    "auto_init" => true
  ),
  "pages" => array(
    "no_login" => array(
      "/expenses_manager/",
      "/expenses_manager/reset.php",
      "/expenses_manager/register.php"
    ),
    "login_page" => "/expenses_manager/login.php",
    "home_page" => "/expenses_manager/home.php"
  )
));
