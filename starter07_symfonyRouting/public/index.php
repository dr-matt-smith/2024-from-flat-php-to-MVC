<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Tudublin\Application;

$app = new Application();
//$app->setVerbose(true);
$app->handleRequest(Request::createFromGlobals());
