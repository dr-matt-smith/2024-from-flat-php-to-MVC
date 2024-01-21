<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Tudublin\Application;

$app = new Application();
//$app->setVerbose();
$app->handleRequest(Request::createFromGlobals());
