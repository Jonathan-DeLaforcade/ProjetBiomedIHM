<?php

define('URL', str_replace("index.php", "",  "https://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


require_once("Controllers/Router.php");
$router = new Router();
$router->routerReq();