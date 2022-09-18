<?php

// .env.testingを読ませるためのファイル

require_once __DIR__ . '/../../../../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(dirname(dirname(dirname(dirname(__DIR__)))), '.env.testing');
$dotenv->load();

