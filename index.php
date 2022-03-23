<?php

require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';

$controllerName = ucfirst((strtolower($_REQUEST['controller']) ?? 'Wellcome') . 'Controller');
$actionName = $_REQUEST['action'] ?? 'index';

//echo $controllerName;
//echo '<pre>';
//echo $actionName;

require "./Controllers/${controllerName}.php";

$controllerObject = new $controllerName;

echo '<pre>';
$controllerObject->$actionName();
