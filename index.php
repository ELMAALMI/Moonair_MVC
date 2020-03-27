<?php
include "Classes/AutoLoad.php";

 \Classes\AutoLoad::start();

$request  = $_GET['r'];


$var = new Route($request);
$var->Controllerrender();

